<?php
class User extends CI_Model {
    function register($data)
    {
        $this->db->insert('users', $data);
    }

    function verify_email($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->num_rows();
    }

    function verify_password($password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $password;
    }
}
?>