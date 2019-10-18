<?php
class Logins extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('login');
    }
    function index()
    {
        $data['content'] ='login_form';
        $this->load->view('fragments/template.php', $data);
    }

    function validation()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $data['user'] = $this->login->validate_credentials($username);
        
        if(count($data['user']) == 0){
            redirect(base_url());
            exit();
        }else{
            $verifyPassword = $data['user'][0]['password'];
            if(password_verify($password, $verifyPassword)){
                $this->load->view('profile', $data);
            }else
                echo "nyek";
        }
    }
}
?>