<?php
class Auths extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
    }
    
    function index()
    {
        $session_user = $this->session->userdata('user_data');
        if(!empty($session_user)){
            $data['session_user'] = $session_user;
            $data['content'] = "user/home";
        }else{
            $data['content'] = "auth/login";
        }

        $this->load->view('modules/template', $data);
    }

    function authenticate()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $authenticate = $this->auth->auth_user($username, $password);
        if($authenticate){
            $data = array(
                'username' => $username
            );
            $this->session->set_userdata('user_data', $data);
            redirect('auths');
            exit('success');
        }else {
            echo "<script> alert('Incorrect Username or Password');</script>";
            echo "<script> window.location.href = '"; base_url(); echo "auths' </script>";
        }
    }

    function logout_user() {
        $this->session->sess_destroy();
        redirect('auths');
    }
}
?>