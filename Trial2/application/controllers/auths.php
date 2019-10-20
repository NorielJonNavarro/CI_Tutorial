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
        $data['content'] = "auth/login";
        $this->load->view('modules/template', $data);
    }

    function authenticate()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $authenticate = $this->auth->auth_user($username);

        if($authenticate == 1){
            $data['user'] = $this->auth->get_user_info($username);
            $validatePassword = $data['user']['password'];

            if(password_verify($password, $validatePassword)){
                $data['content'] = "user/home";
                $this->load->view('modules/template', $data);
            }else {
                echo "Wrong password";
            }
        }else {
            echo "User not found";
        }

    }
}
?>