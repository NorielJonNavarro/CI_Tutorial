<?php
class Auth extends CI_Model
{
    function auth_user($username, $password)
    {
        $query = $this->db->get_where('users', array('username' => $username));
        // Query for password
        $this->db->select();
        $this->db->from('users');
        $this->db->where(array('username' => $username));
        $this->db->join('user_information', 'users.userID=user_information.userID');
        $query2 = $this->db->get();
        $validatePassword = $query2->first_row('array');
        $user = $query2->first_row('array');
        if($query->num_rows() == 1 && password_verify($password, $validatePassword['password'])){
            return array('validate' => true, 'user_info' => $user);
        }else{
            return false;
        }
        
    }

    function verify_username($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->num_rows();
    }
    
    function verify_email($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->num_rows();
    }

    function validate_password($password, $validatePassword)
    {
        if($password === $validatePassword){
            $password = password_hash($password, PASSWORD_DEFAULT);
            return $password;
        }else{
            return 'false';
        }
    }

    function register_user($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    // function get_user_info($username)
    // {
    //     $this->db->select();
    //     $this->db->from('user_information');
    //     $this->db->where1('userID' $);
    //     return $query->first_row('array');
    // }
}
?>