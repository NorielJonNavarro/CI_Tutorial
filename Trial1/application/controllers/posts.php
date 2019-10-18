<?php
    class Posts extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('post');
        }

        function index($start=0)
        {
            $data['posts'] = $this->post->get_posts(3, $start);
            $this->load->library('pagination');
            $config['base_url'] = base_url(). 'posts/index';
            $config['total_rows'] = $this->post->get_posts_count();
            $config['per_page'] = 3;
            $this->pagination->initialize($config);
            $data['pages'] = $this->pagination->create_links();
            $this->load->view('posts/view_post', $data);
        }//end of functions

        function post($postID)
        {
            $data['post'] = $this->post->get_post($postID);
            $this->load->view('/posts/post', $data);
            
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
                $this->load->view('posts/new_post');
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
                $this->load->view('posts/edit_post', $data);
            }

        }//end of edit_post() function

        function deletePost($postID)
        {
            $this->post->delete_post($postID);
            redirect(base_url(). '/posts');
        }//end of delete_post() function
    }//end of class
//end of php?>