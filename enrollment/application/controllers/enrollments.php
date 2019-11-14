<?php
class Enrollments extends CI_Controller
{
    function enroll_students($course_id)
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            if($_POST)
            {

            }else {
                $data['course'] = $this->course->get($course_id);
                $data['style'] = 'admin/css';
                $data['content'] = 'enroll_page';
                $data['script'] = 'admin/js';
                $this->load->view('modules/template', $data);
            }
        }
        else 
        {
            redirect(base_url());
        }
    }

}
?>