<?php
class Registers extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('register');
    }
    function index()
    {
        if($_POST){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $verifyPassword = $_POST['verifyPassword'];
            
            if($this->register->verify_username($username) == 1){
                echo "<script>alert('Username already taken');</script>";
            }else{
                if($this->register->verify_email($email) == 1){
                    echo "<script>alert('E-mail Address already taken');</script>";
                }else{
                    if($password != $verifyPassword){
                        echo "<script>alert('Password did not match');</script>";
                    }else {
                        $data = array(
                            'username' => $username,
                            'email' => $email,
                            'password' => password_hash($password, PASSWORD_DEFAULT)
                        );

                        $this->register->add_user($data);
                        redirect(base_url() . "logins");
                    }
                }
            }
            
        }
    }
}
?>