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
                redirect(base_url(). 'posts/');
            }else{
                $this->load->view('new_post');
            }
        }//end of new_post() function

        function edit_post($postID)
        {
            $data['success'] = 0;
            
            if($_POST){
                $data = array( 
                    'title' => $_POST['title'],
                    'post' => $_POST['post'],
                    'active' => 1
                );

                $this->post->update_post($postID, $data);
                $data['success'] = 1;
                redirect(base_url(). '/posts');
            }else{
                $data['post'] = $this->post->get_post($postID);
                $this->load->view('edit_post', $data);
            }

        }//end of edit_post() function

        function deletePost($postID)
        {
            $this->post->delete_post($postID);
            redirect(base_url(). '/posts');
        }//end of delete_post() function
    }//end of class
//end of php?>