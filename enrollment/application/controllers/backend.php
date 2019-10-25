<?php
/*
    Every function checks if the session is active
    Every function returns to the login page if the session
    is not active or there is no session.
*/
class Backend extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('verify_session'); //Loads the session model to check if the session.        
        $this->load->model('authenticate'); //Loads the authenticate model for authentication.
        $this->load->model('staff'); //Loads the staff model for the staff information.
        $this->load->model('student'); //Loads the student model for the student information.
        $this->load->model('course'); //Loads the student model for the student information.
    }// end of __construct

    function index()
    {
        $session = $this->verify_session->check_session();
        if($session){
            redirect(base_url(). 'backend/home');
        }else{  
            $data['style'] = 'modules/stylesheet';
            $data['content'] = 'login';
            $data['script'] = 'modules/script';
            $this->load->view('modules/template', $data);
        }
    }//end of index

    /*

    */
    function home()
    {
        $session = $this->verify_session->check_session();
        if($session){
            $data['staffs'] = $this->staff->get_staffs();
            $data['students'] = $this->student->get_students();
            $data['courses'] = $this->course->get_courses();
            $data['style'] = 'admin/stylesheet';
            $data['content'] = 'admin/home';
            $data['script'] = 'admin/script';
            $this->load->view('modules/template', $data);
        }else{
            redirect(base_url() . 'backend/login');
        }
        
    }

     /**/
    function login()
    {
        $is_session = $this->verify_session->check_session();
        if($is_session){
            redirect(base_url(). 'backend/home');
        }else {
            if($_POST)
            {
                $email = $_POST['email'];//variable that holds the email from the login form.
                $password = $_POST['password'];//variable that holds the password from the login form.
                $validate = $this->authenticate->authenticate_user($email, $password);
                $email_response = "not validated";
                $password_response = "not validated";
                $user_response = "not_validated";
                
                if($validate['email']){
                    $email_response = "validated";
                    if($validate['password']){
                        $password_response = "validated";
                    }

                    if($validate['email'] && $validate['password'] && $validate['admin']){
                        $user_validate = "validated";
                        $data = array(
                            'name' => $validate['name'],
                            'email' => $validate['email']
                        );    
                        $this->session->set_userdata('logged_in', $data);
                    }
                    
                }else {
                    $email_response = "not validated";
                }
                
                $array = array(
                    'email' => $email_response,
                    'password' => $password_response,
                    'user' => $user_response
                    );
                echo json_encode($array);
            }
            else
            { 
                redirect(base_url());
            }
        }
    }//end of login

    function logout()
    {
        $is_session = $this->verify_session->check_session();
        if($is_session){
            $this->session->unset_userdata('logged_in');
            $this->session->sess_destroy();
            
        }

        redirect(base_url(). 'backend/login');
    }//end of logout

    function add_staff()
    {
    $is_session = $this->verify_session->check_session();
        if($is_session){
            if($_POST){
                $email_response = 'available';
                $phone_response = 'available';
                $first_name = $_POST['firstName'];
                $middle_name = $_POST['middleName'];
                $last_name = $_POST['lastName'];
                $phone_number = $_POST['phone'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password = password_hash($password, PASSWORD_DEFAULT);
                $position = $_POST['position'];
                $verify = $this->staff->validate_staff($email, $phone_number);
                
                if($verify['email']){
                    $email_response = 'exists';
                }

                if($verify['phone_number']){
                    $phone_response = 'exists';
                }

                if($email_response === 'available' && $phone_response === 'available'){
                    $data = array(
                        'first_name' => $first_name,
                        'middle_name' => $middle_name,
                        'last_name' => $last_name,
                        'phone_number' => $phone_number,
                        'email' => $email,
                        'password' => $password,
                        'position' => $position,
                    );

                    $this->staff->add($data);
                }

                $array = array(
                    'email' => $email_response,
                    'phone' => $phone_response
                );

                echo json_encode($array);
            }else{
                exit();
            }
        }else {
            redirect(base_url(). 'backend/login');
        }
    }

    function delete_staff($staff_id)
    {
        if($this->session->userdata('logged_in')){
            $this->staff->delete($staff_id);
        }
        redirect(base_url());
    }  
}//end of class
?>
