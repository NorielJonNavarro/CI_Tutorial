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
        $result = $this->login->validate_credentials($username);

        if($result == 1){
            redirect(base_url(). "logins");
        }else {
            $this->index();
        }
    }
}
?>