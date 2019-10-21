<?php
class Auth extends CI_Model
{
    function auth_user($username, $password)
    {
        $query = $this->db->get_where('users', array('username' => $username));
        // Query for password
        $this->db->select('password');
        $this->db->from('users');
        $this->db->where(array('username' => $username));
        $query2 = $this->db->get();
        $validatePassword = $query2->first_row('array');

        if($query->num_rows() == 1 && password_verify($password, $validatePassword['password'])){
            return true;
        }else{
            return false;
        }
        
    }

    function get_user_info($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->first_row('array');
    }
}
?>