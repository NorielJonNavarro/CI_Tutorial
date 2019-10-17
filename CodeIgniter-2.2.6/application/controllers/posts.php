<?php
    class Posts extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('post');
        }

        function Index()
        {
            $data['posts'] = $this->post->get_posts();
            $this->load->view('view_post', $data);
        }//end of functions

        function post($postID)
        {
            $data['post'] = $this->post->get_post($postID);
            $this->load->view('post', $data);
            
        }//end of post() function

        function new_post()
        {
            if($_POST){
                $data = array( 
                    'title' => $_POST['title'],
                    'post' => $_POST['post'],
                    'active' => 1
                );

                $this->post->insert_post($data);
                redirect(base_url(). 'post/');
            }else{
                $this->load->view('new_post');
            }
        }//end of new_post() function
    }//end of class
//end of php?>