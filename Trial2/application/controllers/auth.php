<?php
class Auth extends CI_Controller
{
    function index()
    {
        $data['content'] = "auth/login";
        $this->load->view('modules/template', $data);
    }
}
?>