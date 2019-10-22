<?php
class User extends CI_Model
{
    function get_user_data($user_id)
    {
        $this->db->select('staff_id, first_name, middle_name, last_name, email , position');
        $this->db->from('staffs');
        $this->db->where('staff_id', $user_id);
        $query = $this->db->get();
        return $query->first_row('array');
        
    }
}
?>