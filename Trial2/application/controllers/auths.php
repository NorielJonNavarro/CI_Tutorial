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
        if($authenticate['validate']){
            $data = array(
                'userID' => $authenticate['user_info']['userID'],
                'username' => $username,
                'email' => $authenticate['user_info']['email'],
                'type' => $authenticate['user_info']['type'],
                'firstName' => $authenticate['user_info']['firstName'],
                'middleName' => $authenticate['user_info']['middleName'],
                'lastName' => $authenticate['user_info']['lastName'],

            );
            $this->session->set_userdata('user_data', $data);
            redirect('auths');
            exit('success');
        }else {
            echo "<script> alert('Incorrect Username or Password');</script>";
            // echo "<script> window.location.href = '"; base_url(); echo "auths' </script>";
        }
    }

    function register()
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $verifyPassword = $_POST['verifyPassword'];

        $verifyUsername = $this->auth->verify_username($username); 
        $verifyEmail = $this->auth->verify_email($email);
        $verifiedPassword = $this->auth->validate_password($password, $verifyPassword);

        if($verifyUsername == 1){
            exit('Username Already Exists');
        }else{
            if($verifyEmail == 1){
                exit('E-mail Address Already Exists');
            }else {
                if($verifiedPassword == "false") {
                    exit('Password Did Not Match');
                }else {
                    $data = array(
                        'username' => $username,
                        'email' => $email,
                        'password' => $verifiedPassword
                    );

                    $this->auth->register_user($data);
                    $this->session->set_userdata('user_data', $data);
                    redirect('auths');
                }
            }
        }
    }

    function logout_user() {
        $this->session->sess_destroy();
        redirect('auths');
    }
}
?>