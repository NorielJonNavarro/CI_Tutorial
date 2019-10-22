<?php
class Backend extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('authenticate'); //Loads the authenticate model for authentication.
        $this->load->model('user'); //Loads the user model for the user information.
    }// end of __construct

    function index()
    {
        $this->authenticate->check_session();
    }//end of index

    function login()
    {
        if($_POST){
            $email = $_POST['email'];//variable that holds the email from the login form.
            $password = $_POST['password'];//variable that holds the password from the login form.
            $validate = $this->authenticate->authenticate_user($email, $password);
            $data['user_data'] = $this->user->get_user_data($validate['staff_id']);
            $data['content'] = 'modules/admin/home';
            $this->session->set_userdata('user_data',$data['user_data']);
           redirect(base_url());
        }else {
            // $this->authenticate->check_session();
            $this->load->view('/modules/login/template');
        }
    }//end of login

    function logout()
    {
        $this->authenticate->check_session();
        $this->session->unset_userdata('user_data');
        $this->session->sess_destroy();
        redirect(base_url());
    }//end of logout


}//end of class
?>

