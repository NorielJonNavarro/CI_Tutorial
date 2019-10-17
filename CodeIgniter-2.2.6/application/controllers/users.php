<?php 
    class Users extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('user');
        }

        function index()
        {
            $this->load->view('/fragments/nav');
            $this->load->view('/users/user');
        }

        function register(){
            if($_POST){
                $email = $_POST['email'];
                $verifyEmail = $this->user->verify_email($email);
                $password = $_POST['password'];
                $verifyPassword = $_POST['verifyPassword'];
                if($verifyEmail >= 1){
                    echo "<script>alert('E-mail Taken');</script>";
                    echo "<script>location.replace('users')</script>";
                    exit();
                }else{
                    if($password === $verifyPassword){
                        // echo "<script>alert('Success');</script>";
                        $Verifiedpassword = $this->user->verify_password($password);
                        $data = array(
                            'firstName' => $_POST['firstName'],
                            'lastName' => $_POST['lastName'],
                            'middleName' => $_POST['middleName'],
                            'email' => $_POST['email'],
                            'password' => $_POST['password'],
                        );

                        $this->user->register($data);
                        redirect(base_url(). '/users/user');
                    }else{
                        echo "<script>alert('Password did not match');</script>";
                        echo "<script>location.replace('users')</script>";
                    }

                }
            }else{
                redirect(base_url(). '/users/user');
            }            
        }
    }

//end of php?>
