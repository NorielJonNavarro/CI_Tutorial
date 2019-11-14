<?php
class Student extends CI_Model
{
    function get_students()
    {
        $this->db->select();
        $this->db->from('students');
        $query = $this->db->get();
        $result = $query->result_array('array');
        return $result;
    }

    function get($student_id)
    {
        $query = $this->db->get_where('students', array('student_id' => $student_id));
        $result = $query->first_row('array');
        return $result;
    }

    function add($data)
    {
        $this->db->insert('students', $data);
    }

    function delete($student_id)
    {
        $this->db->where('student_id', $student_id);
        $this->db->delete('students');
    }

    function validate_student($email, $mobile_number)
    {
        $this->db->select('email');
        $this->db->from('students');
        $this->db->where('email', $email);
        $query = $this->db->get();
        $data['email'] = $query->num_rows();

        $this->db->select('mobile_number');
        $this->db->from('students');
        $this->db->where('mobile_number', $mobile_number);
        $query2 = $this->db->get();
        $data['mobile_number'] = $query2->num_rows();
            
        return $data;

    }

    function validate_edit($student_id, $email, $mobile_number){
        $this->db->select('email');
        $this->db->from('students');
        $this->db->where(array('student_id !=' => $student_id, 'email' => $email));
        $query = $this->db->get();
        $data['email'] = $query->num_rows();

        $this->db->select('mobile_number');
        $this->db->from('students');
        $this->db->where(array('student_id !=' => $student_id, 'mobile_number' => $mobile_number));
        $query2 = $this->db->get();
        $data['mobile_number'] = $query2->num_rows();
        return $data;
    }

    function update($student_id, $data)
    {
        $this->db->where('student_id', $student_id);
        $this->db->update('students', $data);
    }
}
?>