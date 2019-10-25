<?php
class Student extends CI_Model
{
    function get_students()
    {
        $query = $this->db->get('students');
        $result = $query->result_array('array');
        return $result;
    }
}
?>