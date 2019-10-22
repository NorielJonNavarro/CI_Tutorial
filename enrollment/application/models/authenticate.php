<?php
class Authenticate extends CI_Model
{

    /*
        authenticate_user() function does the following:
        1. Queries the database and check if the email exists in the database. 
        2. If it does not exists it will exit and prompts a message "E-mail does not exists",
        If it exists it will then verify the password with the use of an if statement.
        3. If the password_verify() function returns the data of the admin/user, the authenticate_user() function
        will return true, else it eill exit and prompt a message "Incorrect password"
    */
    function authenticate_user($email, $password)
    {
        
        $query = $this->db->get_where('staffs', array('email' => $email));
        $result = $query->first_row('array');

        if($query->num_rows() == 0){
            echo "<script>alert('Incorrect E-mail')</script>";
            echo "<script>window.location.href ='"; base_url(); echo"index'</script>";
            exit();
        }

        if(password_verify($password, $result['password'])){
            return $result;
        }else {
            echo "<script>alert('Incorrect Password')</script>";
            echo "<script>window.location.href ='"; base_url(); echo"index'</script>";
        }

    }

    function check_session()
    {
        $session['user_data'] = $this->session->userdata('user_data');
        if(!empty($session['user_data'])){
            $session['content'] = 'modules/admin/home';
            $this->load->view('modules/admin/template', $session);
        }else{
            redirect(base_url() . 'backend/login');
        }
    }
}
?>