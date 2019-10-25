<?php
class Staff extends CI_Model
{
    function get_staffs()
    {
        $this->db->select();
        $this->db->from('staffs');
        $this->db->where('type !=', 'admin');
        $query = $this->db->get();
        $data = $query->result_array('array');
        return $data;
    }

    function validate_staff($email, $phone_number){
        $this->db->select('email');
        $this->db->from('staffs');
        $this->db->where('email', $email);
        $query = $this->db->get();
        $data['email'] = $query->num_rows();

        $this->db->select('phone_number');
        $this->db->from('staffs');
        $this->db->where('phone_number', $phone_number);
        $query2 = $this->db->get();
        $data['phone_number'] = $query2->num_rows();
        
        return $data;
    }

    function delete($staff_id){
        $this->db->where('staff_id', $staff_id);
        $this->db->delete('staffs');
    }

    function update($staff_id, $data)
    {
        $this->db->where('staff_id', $staff_id);
        $this->db->update('staffs', $data);
    }

    function add($data)
    {
        $this->db->insert('staffs', $data);
    }
}
?>