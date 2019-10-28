<?php
class Staff extends CI_Model
{
    function get_staffs()
    {
        $this->db->select();
        $this->db->from('staff');
        $this->db->where('user_type !=', 'admin');
        $query = $this->db->get();
        $data = $query->result_array('array');
        return $data;
    }

    function validate_staff($email, $mobile_number){
        $this->db->select('email');
        $this->db->from('staff');
        $this->db->where('email', $email);
        $query = $this->db->get();
        $data['email'] = $query->num_rows();

        $this->db->select('mobile_number');
        $this->db->from('staff');
        $this->db->where('mobile_number', $mobile_number);
        $query2 = $this->db->get();
        $data['mobile_number'] = $query2->num_rows();
        
        return $data;
    }

    function delete($staff_id){
        $this->db->where('staff_id', $staff_id);
        $this->db->delete('staff');
    }

    function update($staff_id, $data)
    {
        $this->db->where('staff_id', $staff_id);
        $this->db->update('staff', $data);
    }

    function add($data)
    {
        $this->db->insert('staff', $data);
    }
}
?>