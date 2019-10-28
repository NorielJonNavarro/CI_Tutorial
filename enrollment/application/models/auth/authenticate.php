<?php
class Authenticate extends CI_Model
{
    /*
        Query: SELECT 'password, type' from staffs WHERE email = "<user_input>";
        1. If there is no result to the query it means that the email does not exists in the database.
        2. It checks if the user type is equal to admin.
        3. It checks if the password that the user entered matches its password from the database.
        4. returns $result. 
        
    */
    function authenticate_user($email, $password)
    {
        $this->db->select('first_name, password, user_type');
        $this->db->from('staff');
        $this->db->where(array('email' => $email));
        $query =  $this->db->get();
        $verify = $query->first_row('array');

        if($query->num_rows()){
            $result['email'] = true;
            
            if($verify['user_type'] === 'admin'){
                $result['admin'] = true;
            }else{
                $result['admin'] = false;
            }

            if(password_verify($password, $verify['password'])){
                $result['password'] = true;
            }else{
                $result['password'] = false;
            }

            $result['name'] = $verify['first_name'];
        }else{
            $result['email'] = false;
        }

        return $result;
    }//end of authenticate_user

}//end of class
?>