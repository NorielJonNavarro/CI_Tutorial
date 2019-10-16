<?php
    class Post extends CI_Model
    {
        function get_posts($max=20, $start=0)
        {
            $query = $this->db->get_where('posts', array('active' => 1), $max, $start );
            return $query->result_array();
        }//end of function
    }//end of class
//end of php?>