<?php
class Register extends CI_Model
{
    function add_user($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
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
}
?>