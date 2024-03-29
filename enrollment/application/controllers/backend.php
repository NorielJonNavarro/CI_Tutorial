<?php
class Backend extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('authenticate');
    }

    function index()
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            echo '<script>window.location.href = "staffs/"</script>';
        }
        else
        {  
            $data['style'] = 'modules/stylesheet';
            $data['content'] = 'login';
            $data['script'] = 'modules/script';
            $this->load->view('modules/template', $data);
        }
    }//end of index

    function practice()
    {  
        $this->load->view('try');        
    }//end of index


    function login()
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            echo '<script>window.location.href = "../staffs/"</script>';
        }
        else 
        {
            if($_POST)
            {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $verify = $this->authenticate->validate_credentials($email, $password);  
                $array = array(   
                    'email' => $verify['email'],                
                    'password' => $verify['password'],
                    'user_type' => $verify['user_type'],
                    'user_info' => $verify['user_info'],
                );
    
                if($verify['email'] && $verify['password'] && $verify['user_type'])
                {
                    $this->session->set_userdata('logged_in', $array['user_info']);
                }
                
                echo json_encode($array);
            }else {
                redirect(base_url());
            }
        }
    }//end of login

    function logout()
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            $this->session->unset_userdata('logged_in');
            $this->session->sess_destroy();     
            redirect(base_url());
        }
        redirect(base_url(). 'backend/login');
    }//end of logout

}//end of class
?>
