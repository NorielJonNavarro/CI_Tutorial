<?php
class Login extends CI_Model
{
    function validate_credentials($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->num_rows();
    }
}
?>