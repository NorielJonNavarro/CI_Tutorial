<?php
class Staffs extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('staff');
    }

    function index()
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            $data['style'] = 'admin/css';
            $data['content'] = 'home';
            $data['script'] = 'admin/js';
            $data['table'] = 'staff/staff_table';
            $data['staff'] = $this->staff->get_staff();
            $this->load->view('modules/template', $data);
        }else{
            redirect(base_url() . 'backend/login');
        }
    }
    
    function add_staff()
    {
        $session = $this->session->userdata('logged_in');
        if($session){
            if($_POST){
                $email_response = 'available';
                $mobile_response = 'available';
                $first_name = $_POST['firstName'];
                $middle_name = $_POST['middleName'];
                $last_name = $_POST['lastName'];
                $mobile_number = $_POST['mobile'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password = password_hash($password, PASSWORD_DEFAULT);
                $position = $_POST['position'];
                $province = $_POST['province'];
                $city = $_POST['city'];
                $municipality = $_POST['municipality'];
                $barangay = $_POST['barangay'];
                $street = $_POST['street'];
                $street_number = $_POST['streetNo'];
                $verify = $this->staff->validate_staff($email, $mobile_number);
                
                if($verify['email']){
                    $email_response = 'exists';
                }

                if($verify['mobile_number']){
                    $mobile_response = 'exists';
                }

                if($email_response === 'available' && $mobile_response === 'available'){
                    $data = array(
                        'first_name' => $first_name,
                        'middle_name' => $middle_name,
                        'last_name' => $last_name,
                        'mobile_number' => $mobile_number,
                        'email' => $email,
                        'password' => $password,
                        'position' => $position,
                        'province' => $province,
                        'city' => $city,
                        'municipality' => $municipality,
                        'barangay' => $barangay,
                        'street' => $street,
                        'street_no' => $street_number,
                    );

                    $this->staff->add($data);
                }

                $array = array(
                    'email' => $email_response,
                    'mobile' => $mobile_response
                );

                echo json_encode($array);
            }else{
                exit();
            }
        }else {
            redirect(base_url());
        }
    }

    function get_staff($staff_id)
    {
        if($this->session->userdata('logged_in')){
            $data['style'] = 'admin/css';
            $data['content'] = 'home';
            $data['script'] = 'admin/js';
            $data['table'] = 'staff/edit_staff';
            $data['staff'] = $this->staff->get($staff_id);

            $staff = $data['staff'];
            echo json_encode($staff);
        }
        else
        {
            redirect(base_url());
        }
    }

    function edit_staff($staff_id)
    {
        if($this->session->userdata('logged_in')){
            if($_POST){
                $first_name = $_POST['firstName'];
                $middle_name = $_POST['middleName'];
                $last_name = $_POST['lastName'];
                $mobile_number = $_POST['mobile'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password = password_hash($password, PASSWORD_DEFAULT);
                $position = $_POST['position'];
                $province = $_POST['province'];
                $city = $_POST['city'];
                $municipality = $_POST['municipality'];
                $barangay = $_POST['barangay'];
                $street = $_POST['street'];
                $street_number = $_POST['streetNo'];
                $verify = $this->staff->validate_edit($staff_id, $email, $mobile_number);

                if($verify['email'] && $verify['mobile_number'])
                {
                    $email_response =  false;
                    $mobile_response = false;
                }
                elseif($verify['email'] && !$verify['mobile_number'])
                {
                    //email already taken
                    $email_response = false;
                    $mobile_response = true;
                }
                elseif(!$verify['email'] && $verify['mobile_number'])
                {
                    //No. Already Taken
                    $email_response = true;
                    $mobile_response = false;
                }
                else
                {
                    //Valid Edit
                    $email_response = true;
                    $mobile_response = true;

                    $data = array(
                        'first_name' => $first_name,
                        'middle_name' => $middle_name,
                        'last_name' => $last_name,
                        'mobile_number' => $mobile_number,
                        'email' => $email,
                        'password' => $password,
                        'position' => $position,
                        'province' => $province,
                        'city' => $city,
                        'municipality' => $municipality,
                        'barangay' => $barangay,
                        'street' => $street,
                        'street_no' => $street_number,
                    );

                    $this->staff->update($staff_id, $data);
                }

                $array = array(
                    'email' => $email_response,
                    'mobile' => $mobile_response
                );

                echo json_encode($array);
            }else{
                exit();
            }
        }
        else
        {
            redirect(base_url());
        }
        
    }  

    function delete_staff($staff_id)
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            $this->staff->delete($staff_id);
            echo '<script>alert("Seccessfully Deleted")</script>';
            echo '<script>window.location.href = "../"</script>';
        }
        else 
        {
            redirect(base_url());
        };
    }  
}
?>