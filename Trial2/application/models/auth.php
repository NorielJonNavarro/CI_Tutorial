<?php
class Auth extends CI_Model
{
    function auth_user($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->num_rows();
    }

    function get_user_info($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->first_row('array');
    }
}
?>