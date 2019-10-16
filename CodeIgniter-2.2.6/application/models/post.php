<?php
    class Post extends CI_Model
    {
        function get_posts($max=20, $start=0)
        {
            $query = $this->db->get_where('posts', array('active' => 1), $max, $start );
            return $query->result_array();
        }//end of get_posts() function

        function get_post($postID)
        {
            $this->db->select();
            $this->db->from('posts');
            $this->db->where(array('active' => 1, 'postID' => $postID));
            $query = $this->db->get();
            return $query->first_row('array');
        }//end of get_post() function
        
        function insert_post($data)
        {
            $this->db->insert('posts', $data);
            return $this->db->insert_id();
        }//end of the insert_post() function

        function update_post($postID, $data)
        {
            $this->db->where('postID', $postID);
            $this->db->update('posts', $data);
        }//end of update_post() function
        
        function delete_post($postID)
        {
            $this->db->where('postID', $postID);
            $this->db->delete('posts');
        }//end of delete_post() function
    }//end of class
//end of php?>