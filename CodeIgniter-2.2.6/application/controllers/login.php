<?php
class Login extends CI_Controller
{
    function index()
    {
        $data['content'] ='login_form';
        $this->load->view('fragments/template.php', $data);
    }
}
?>