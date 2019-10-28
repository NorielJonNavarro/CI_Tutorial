<?php
class Student extends CI_Model
{
    function get_students()
    {
        $query = $this->db->get('students');
        $result = $query->result_array('array');
        return $result;
    }

    function validate_student($email, $mobile_number)
    {
        $this->db->select('email');
        $this->db->from('students');
        $this->db->where('email', $email);
        $query = $this->db->get();
        $data['email'] = $query->num_rows();

        $this->db->select('mobile_number');
        $this->db->from('studnet');
        $this->db->where('mobile_number', $mobile_number);
        $query2 = $this->db->get();
        $data['mobile_number'] = $query2->num_rows();
            
            return $data;
    }
}
?>