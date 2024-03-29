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

    function validate_credentials($email, $password)
    {
        $this->db->select();
        $this->db->from('staff');
        $this->db->where(array('email' => $email));
        $query = $this->db->get();
        $row = $query->num_rows();
        $result = $query->first_row('array');
        $data['email'] = false;
        $data['password'] = false;
        $data['user_type'] = false;
        $data['user_info'] = false;

        if($row)
        {
            $verify_password = password_verify($password, $result['password']);
            if($result['email'] && $verify_password && $result['user_type'] === 'admin')
            {
                $data['email'] = true;
                $data['password'] = true;
                $data['user_type'] = true;
                $data['user_info'] = $result;
            }
                elseif($result['email'] && $verify_password && $result['user_type'] != 'admin')
            {
                $data['email'] = true;
                $data['password'] = true;
            }
                elseif($result['email'] && !$verify_password)
            {
                $data['email'] = true;
            }        
        }

        return $data;
    }
}//end of class
?>