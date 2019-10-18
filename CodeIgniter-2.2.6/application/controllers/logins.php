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
        $validateUsername = $this->login->validate_credentials($username);

        if($validateUsername == 1){
            $validatePassword = $this->login->validate_password($password);
        }else {
            $this->index();
        }
    }
}
?>