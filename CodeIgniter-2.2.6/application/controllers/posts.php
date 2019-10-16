<?php
    class Posts extends CI_Controller
    {
        function Index()
        {
            $this->load->model('post');
            $data['posts'] = $this->post->get_posts();
            $this->load->view('view_post', $data);
        }//end of functions
    }//end of class
//end of php?>