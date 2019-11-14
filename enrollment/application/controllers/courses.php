<?php
class Courses extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('course');
    }

    function index()
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            $data['style'] = 'admin/css';
            $data['content'] = 'home';
            $data['script'] = 'admin/js';
            $data['courses'] = $this->course->get_courses();
            $data['table'] = 'courses/courses_table';

            $this->load->model('staff');
            $data['instructors'] = $this->staff->get_instructor();
            $this->load->view('modules/template', $data);
        }else{
            redirect(base_url() . 'backend/login');
        }
    }

    function add_course()
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            if($_POST)
            {
                
                $unit = $_POST['units'];
                $course_code = $_POST['courseCode'];
                $course_description = $_POST['courseDescription'];
                $instructor_id = $_POST['staffId'];
                $room = $_POST['room'];
                $start_time = $_POST['startTime'];
                $end_time = $_POST['endTime'];
                $schedule = null;
                $time_error = false;  
                
                
                if(isset($_POST['monday']))
                {
                    $monday = $_POST['monday'];
                    $schedule .= 'M';
                }
                else
                {
                    $monday = null;
                }

                if(isset($_POST['tuesday']))
                {
                    $tuesday = $_POST['tuesday'];
                    $schedule .= 'T';
                }
                else
                {
                    $tuesday = null;
                }

                if(isset($_POST['wednesday']))
                {
                    $wednesday = $_POST['wednesday'];
                    $schedule .= 'W';
                }
                else
                {
                    $wednesday = null;
                }

                if(isset($_POST['thursday']))
                {
                    $thursday = $_POST['thursday'];
                    $schedule .= 'Th';
                }
                else
                {
                    $thursday = null;
                }

                if(isset($_POST['friday']))
                {
                    $friday = $_POST['friday'];                
                    $schedule .= 'F';
                }
                else
                {
                    $friday = null;                
                }

                if(isset($_POST['saturday']))
                {
                    $saturday = $_POST['saturday'];
                    $schedule .= 'S';
                }
                else
                {
                    $saturday = null;                
                }            

                if($start_time < $end_time)
                {
                    $time_error = true;  
                }
                
                $verify = $this->course->verify_course($course_description, $course_code, $start_time, $end_time, 
                $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $room, $instructor_id);

                if($verify['schedule']['instructor_id'] == $instructor_id)
                {
                    $instructor_conflict = false;
                }
                else 
                {
                    $instructor_conflict = true;
                }

                if($verify['schedule']['room'] == $room)
                {
                    $room_conflict = false;
                }
                else 
                {
                    $room_conflict = true;
                }

                if(!isset($_POST['monday']) 
                && !isset($_POST['tuesday']) 
                && !isset($_POST['wednesday']) 
                && !isset($_POST['thursday']) 
                && !isset($_POST['friday']) 
                && !isset($_POST['saturday']))
                {
                    $schedule_error = false;
                }else {
                    $schedule_error = true;
                }

                if(!$verify['course_code'] && !$verify['course_description'] && $start_time < $end_time 
                    && $schedule_error && $instructor_conflict && $room_conflict  && $verify['schedule']['course_description'] === null
                    && ($verify['schedule']['start_time'] === null && $verify['schedule']['end_time'] === null)
                    && ($verify['schedule']['first_name'] === null && $verify['schedule']['last_name'] === null)){
                    $data = array(
                        'unit' => $unit,                 
                        'course_code' => $course_code,
                        'course_description' => $course_description,
                        'instructor_id' => $instructor_id,
                        'room' => $room,
                        'schedule' => $schedule,
                        'monday' => $monday,
                        'tuesday' => $tuesday,
                        'wednesday' => $wednesday,
                        'thursday' => $thursday,
                        'friday' => $friday,
                        'saturday' => $saturday,
                        'start_time' => $start_time,
                        'end_time' => $end_time,
                    );
                        $this->course->add($data);
                }

                $array = array(
                            'code' => $verify['course_code'],
                            'course_conflict' => $verify['schedule']['course_description'],
                            'description' => $verify['course_description'],
                            'time' => $time_error,
                            'time_conflict' => ''.$verify['schedule']['start_time'].','.$verify['schedule']['end_time'].'',
                            'schedule' => $schedule_error,
                            'room' => $verify['schedule']['room'],
                            'room_conflict' => $room_conflict,
                            'instructor' => ''.$verify['schedule']['first_name'].','.$verify['schedule']['last_name'].'',
                            'instructor_error' => $_POST['staffId'],
                            'instructor_conflict' => $instructor_conflict,
                            'query' => $verify['query']
                        );
                echo json_encode($array);
            }else{
                exit();
            }
        }else {
            redirect(base_url(). 'backend/login');
        }
    }

    function edit_course($course_id)
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            if($_POST)
            {
                $unit = $_POST['units'];
                $course_code = $_POST['courseCode'];
                $course_description = $_POST['courseDescription'];
                $room = $_POST['room'];            
                $start_time = $_POST['startTime'];
                $end_time = $_POST['endTime'];
                $course_description_error = true;
                $course_code_error = null;
                $course_description_error = null;
                $room_error = null;
                $time_error = null;
                $verify = $this->course->validate_edit($course_id, $course_description, $course_code, $start_time, $end_time, $room);

                if(!$verify['course_code'] && !$verify['course_description'] && $start_time < $end_time && !$verify['schedule']){
                    $data = array(
                        'unit' => $unit,                 
                        'course_code' => $course_code,
                        'course_description' => $course_description,
                        'room' => $room,
                        'start_time' => $start_time,
                        'end_time' => $end_time,
                    );
                    $this->course->update($course_id, $data);
                }

                if(!$verify['course_code'] && !$verify['schedule']['room'])
                {
                    $course_code_error = $verify['schedule']['course_code'];
                    
                }
                else
                {
                    $course_code_error = true;
                }

                if(!$verify['course_description'] && !$verify['schedule']['room'])
                {
                    $course_description_error = $verify['course_description'];
                }
                else
                {
                    $course_description_error = true;
                }

                if($start_time >= $end_time)
                {
                    $time_error = true;
                }
                else
                {
                    $time_error = false;
                }

                $array = array(
                            'description' => $course_description_error,
                            'code' => $course_code_error,
                            'time' => $time_error,
                            'room' => $room_error,
                            'data' => $verify['schedule'],
                        );
                echo json_encode($array);                       
            }else{
                exit();
            }
        }else {
            redirect(base_url(). 'backend/login');
        }
    }

    function delete_course($course_id)
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            $this->course->delete($course_id);
            echo '<script>alert("Successfully Deleted")</script>';
            echo '<script>window.location.replace("'.base_url().'courses");</script>';
        }
        else 
        {
            redirect(base_url());
        }
    }

    function get_course($course_id)
    {
        if($this->session->userdata('logged_in')){
            $data['style'] = 'admin/css';
            $data['content'] = 'home';
            $data['script'] = 'admin/js';
            $data['table'] = 'courses/edit_course';
            $data['course'] = $this->course->get($course_id);
            $course = $data['course'];

            $array = array(
                'course_id' => $course['course_id'],
                'unit' => $course['unit'],
                'course_code' => $course['course_code'],
                'course_description' => $course['course_description'],
                'instructor' => ' '.$course['first_name'].', '.$course['last_name'].'',
                'room' => $course['room'],
                'start' => $course['start_time'],
                'end' => $course['end_time']

            );

            echo json_encode($array);
        }
        else
        {
            redirect(base_url());
        }
    }

    
    function enroll_student_page($course_id)
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            $data['course'] = $this->course->get($course_id);
            $data['students'] = $this->course->get_enrolled_students($course_id);
            $data['style'] = 'admin/css';
            $data['content'] = 'enroll_page';
            $data['script'] = 'admin/js';
            $data['search_result'] = null;
            $this->load->view('modules/template', $data);
        }
        else 
        {
            redirect(base_url());
        }
    }

    
    function search_student()
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            if($_POST)
            {            
                $first_name = $_POST['firstName'];
                $middle_name = $_POST['middleName'];
                $last_name = $_POST['lastName'];
                $error = false;
                $data = null;
                if(!empty($first_name) && !empty($middle_name) && !empty($last_name))
                {
                    $data['first_name'] = $first_name;
                    $data['middle_name'] = $middle_name;
                    $data['last_name'] = $last_name;
                }
                elseif (!empty($first_name) && !empty($middle_name))
                {   
                    $data['first_name'] = $first_name;
                    $data['middle_name'] = $middle_name;
                    $data['last_name'] = null;
                }
                elseif (!empty($first_name) && !empty($last_name))
                {            
                    $data['first_name'] = $first_name;
                    $data['middle_name'] = null;
                    $data['last_name'] = $last_name;
                }
                elseif (!empty($middle_name) && !empty($last_name))
                {            
                    $data['first_name'] = null;
                    $data['middle_name'] = $middle_name;
                    $data['last_name'] = $last_name;
                }
                elseif (!empty($first_name))
                {            
                    $data['first_name'] = $first_name;
                    $data['middle_name'] = null;
                    $data['last_name'] = null;
                }
                elseif (!empty($middle_name))
                {            
                    $data['first_name'] = null;
                    $data['middle_name'] = $middle_name;
                    $data['last_name'] = null;
                }
                elseif (!empty($last_name))
                {            
                    $data['first_name'] = null;
                    $data['middle_name'] = null;
                    $data['last_name'] = $last_name;
                }
                else 
                {
                    $error = true;
                    $array = array(
                        'error' => $error
                    );
                }
                
                if($error === true)
                {
                    echo json_encode($array);
                }
                else 
                {
                    $result['search_result'] = $this->course->search($data);
                    $array = $result['search_result'];
                    echo json_encode($array);
                }
            }
        }
        else 
        {
            redirect(base_url());
        }
    }

    function enroll_student()
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            $course_id = $_POST['course_id'];
            $instructor_id = $_POST['instructor_id'];
            $student_id = $_POST['student_id'];
            $course_conflict = $this->course->get($course_id);
            $validate = $this->course->validate_student($course_id, $student_id, $course_conflict);
            //Duplicate Entry
            if($validate['rows'] === 1)
            {
                $array = array(
                    'student_error' => true,
                    'result' => $validate['result'],
                    'rows' => $validate['rows'],
                    'validate_units' => $validate['units']['units'],
                    'no_of_students' => $validate['enrolled_students']['enrolled_students'],
                    'duplicate' => 'duplicate',
                    'max' => $course_conflict['maximum_capacity']
                );
            }
            //Schedule Conflict
            elseif($validate['rows'] === 0 && $validate['result'] != 0 && $validate['units']['units'] + $validate['enrolled_students']['unit'] < 24 && $validate['enrolled_students']['enrolled_students'] <= $course_conflict['maximum_capacity'])
            {
                $array = array(
                    'student_error' => false,
                    'result' => $validate['result'],
                    'rows' => $validate['rows'],
                    'validate_units' => $validate['units']['units'],
                    'no_of_students' => $validate['enrolled_students']['enrolled_students'],
                    'conflict' => 'conflict',
                    'max' => $course_conflict['maximum_capacity']
                );
            }
            //Maximum Units
            elseif($validate['rows'] === 0 && $validate['result'] === 0 && $validate['units']['units'] + $validate['enrolled_students']['unit'] > 24 && $validate['enrolled_students']['enrolled_students'] <= $course_conflict['maximum_capacity'])
            {
                $array = array(
                    'student_error' => false,
                    'result' => $validate['result'],
                    'rows' => $validate['rows'],
                    'validate_units' => $validate['units']['units'] + $validate['enrolled_students']['unit'],
                    'no_of_students' => $validate['enrolled_students']['enrolled_students'],
                    'max' => $course_conflict['maximum_capacity'],
                    'max_unit' => 'max_unit'
                    
                );
            }
            //Max Students
            elseif($validate['rows'] === 0 && $validate['result'] === 0 && $validate['units']['units'] + $validate['enrolled_students']['unit'] < 24 && $validate['enrolled_students']['enrolled_students'] >= $course_conflict['maximum_capacity'])
            {
                $array = array(
                    'student_error' => false,
                    'result' => $validate['result'],
                    'rows' => $validate['rows'],
                    'validate_units' => $validate['units']['units'],
                    'no_of_students' => $validate['enrolled_students']['enrolled_students'],
                    'max' => $course_conflict['maximum_capacity'],
                    'max_students' => 'max_students'
                );
            }
            //Success
            else
            {
                // echo "yan yan ala pa";
                $data = array(
                    'course_id' => $course_id,
                    'instructor_id' => $instructor_id,
                    'student_id' => $student_id,
                );
                $this->course->enroll($data);
                $array = array(
                    'student_error' => false
                );
            }
            echo json_encode($array);
        }
        else 
        {
            redirect(base_url());
        }
    }
}
?>