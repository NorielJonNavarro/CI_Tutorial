<?php
class Course extends CI_Model
{
    function get_courses()
    {
        $query = $this->db->get('courses');
        $result = $query->result_array('array');
        return $result;
    }
}
?>