<?php
class Course extends CI_Model
{

    function verify_course($course_description, $course_code, $start_time, $end_time, 
    $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $room, $instructor_id)
    {
        $this->db->select('course_code');
        $this->db->from('courses');
        $this->db->where(array('course_code' => $course_code));
        $query1 = $this->db->get();
        $data['course_code'] = $query1->num_rows();
        
        $this->db->select('course_description');
        $this->db->from('courses');
        $this->db->where(array('course_description' => $course_description));
        $query2 = $this->db->get();
        $data['course_description'] = $query2->num_rows();

        $this->db->select();
        $this->db->from('courses');
        $this->db->join('staff', 'courses.instructor_id = staff.staff_id', 'right');
        $this->db->group_start();
            $this->db->group_start();
            $this->db->where('start_time  >=', $start_time);
            $this->db->where('start_time <=', $end_time);
            $this->db->group_end();
            
            $this->db->or_group_start();
            $this->db->where('end_time >=', $start_time);
            $this->db->where('end_time <=', $end_time);
            $this->db->group_end();
        $this->db->group_end();
        
        $this->db->group_start();
            $this->db->or_group_start();
            $this->db->where('monday', $monday);
            $this->db->where('monday !=', null);
            $this->db->group_end();

            $this->db->or_group_start();
            $this->db->where('tuesday', $tuesday);
            $this->db->where('tuesday !=', null);
            $this->db->group_end();

            $this->db->or_group_start();
            $this->db->where('wednesday', $wednesday);
            $this->db->where('wednesday !=', null);
            $this->db->group_end();

            $this->db->or_group_start();
            $this->db->where('thursday', $thursday);
            $this->db->where('thursday !=', null);
            $this->db->group_end();

            $this->db->or_group_start();
            $this->db->where('friday', $friday);
            $this->db->where('friday !=', null);
            $this->db->group_end();

            $this->db->or_group_start();
            $this->db->where('saturday', $saturday);
            $this->db->where('saturday !=', null);
            $this->db->group_end();
        $this->db->group_end();

        $this->db->group_start();
        $this->db->where('room', $room);
        $this->db->or_where('instructor_id', $instructor_id);
        $this->db->group_end();

        $query3 = $this->db->get();
        $data['query'] = $this->db->last_query();
        $data['schedule'] = $query3->first_row('array');
        return $data;
    }

    function get($course_id)
    {
        $this->db->select();
        $this->db->from('courses');
        $this->db->join('staff', 'courses.instructor_id=staff.staff_id');
        $this->db->where(array('course_id' => $course_id));
        $query = $this->db->get();
        $result = $query->first_row('array');
        return $result;
    }

    function get_courses()
    {
        $this->db->select('courses.*, staff.*, IFNULL(COUNT(studentlist.course_id), 0) as status');
        $this->db->from('courses');
        $this->db->join('staff', 'courses.instructor_id=staff.staff_id', 'left');
        $this->db->join('studentlist', 'courses.course_id=studentlist.course_id', 'left');
        $this->db->group_by('courses.course_id');
        $query = $this->db->get();
        $result = $query->result_array('array');
        return $result;
    }

    function add($data)
    {
        $this->db->insert('courses', $data);
    } 
    
    function validate_edit($course_id, $course_description, $course_code, $start_time, $end_time, $room)
    {
        $this->db->select('course_code');
        $this->db->from('courses');
        $this->db->where(array('course_id !=' => $course_id, 'course_code' => $course_code));
        $query1 = $this->db->get();
        $row1 = $query1->num_rows();
        $data['course_code'] = $query1->num_rows();

        $this->db->select('course_description');
        $this->db->from('courses');
        $this->db->where(array('course_id !=' => $course_id,'course_description' => $course_description));
        $query2 = $this->db->get();
        $row2 = $query2->num_rows();
        $data['course_description'] = $query2->num_rows();

        $this->db->select();
        $this->db->from('courses');
        $this->db->join('staff', 'courses.instructor_id = staff.staff_id', 'left');
        $this->db->where(array('course_id !=' => $course_id));
        $this->db->group_start();
            $this->db->group_start();
            $this->db->where('start_time  >=', $start_time);
            $this->db->where('start_time <=', $end_time);
            $this->db->group_end();
            
            $this->db->or_group_start();
            $this->db->where('end_time >=', $start_time);
            $this->db->where('end_time <=', $end_time);
            $this->db->group_end();
        $this->db->group_end();

        $this->db->group_start();
            $this->db->where('room', $room);
        $this->db->group_end();

        $query3 = $this->db->get();
        $data['schedule'] = $query3->num_rows();
        
        return $data;
    }
    
    function update($course_id, $data)
    {
        $this->db->where('course_id', $course_id);
        $this->db->update('courses', $data);
    }

    function delete($course_id)
    {
        $this->db->where('course_id', $course_id);
        $this->db->delete('courses');
    }

    //Enrollment

    function get_enrolled_students($course_id)
    {
        $this->db->select('studentlist.student_id, first_name, middle_name, last_name, course, course_id');
        $this->db->from('studentlist');
        $this->db->join('students', 'studentlist.student_id = students.student_id');
        $this->db->where(array('course_id' => $course_id));
        $query = $this->db->get();
        $data['students'] = $query->result_array('array');
        $data['no_of_students'] = $query->num_rows();
        return $data;
    }

    function validate_student($course_id, $student_id, $course_conflict)
    {
        $this->db->select();
        $this->db->from('studentlist');
        $this->db->where(array('course_id' => $course_id, 'student_id' => $student_id));
        $query = $this->db->get();
        $data['rows'] = $query->num_rows();
        $data['first_query'] = $this->db->last_query();

        $this->db->select('COUNT(studentlist.course_id) as enrolled_students, unit');
        $this->db->from('studentlist');
        $this->db->join('courses', 'studentlist.course_id = courses.course_id', 'left');
        $this->db->where(array('studentlist.course_id' => $course_id));
        $query = $this->db->get();
        $data['enrolled_students'] = $query->first_row('array');
        $data['second_query'] = $this->db->last_query();

        $this->db->select('sum(unit) as units');
        $this->db->from('studentlist');
        $this->db->join('students', 'studentlist.student_id = students.student_id', 'left');
        $this->db->join('courses', 'studentlist.course_id = courses.course_id', 'left');
        $this->db->where(array('studentlist.student_id' => $student_id));
        $query = $this->db->get();
        $data['units'] = $query->first_row('array');
        $data['third_query'] = $this->db->last_query();

        $this->db->select('course_description, studentlist.course_id, monday, tuesday, wednesday, thursday, friday, saturday');
        $this->db->from('studentlist');
        $this->db->join('courses', 'studentlist.course_id = courses.course_id', 'right');
        $this->db->group_by('course_description');
        $this->db->where('courses.course_id  !=', $course_id);
        $this->db->where('studentlist.student_id  =', $student_id);
        $this->db->group_start();
            $this->db->group_start();
            $this->db->where('start_time  >=', $course_conflict['start_time']);
            $this->db->where('start_time <=', $course_conflict['end_time']);
            $this->db->group_end();
            
            $this->db->or_group_start();
            $this->db->where('end_time >=', $course_conflict['start_time']);
            $this->db->where('end_time <=', $course_conflict['end_time']);
            $this->db->group_end();
        $this->db->group_end();

        $this->db->group_start();
            $this->db->or_group_start();
            $this->db->where('monday', $course_conflict['monday']);
            $this->db->where('monday !=', null);
            $this->db->group_end();

            $this->db->or_group_start();
            $this->db->where('tuesday', $course_conflict['tuesday']);
            $this->db->where('tuesday !=', null);
            $this->db->group_end();

            $this->db->or_group_start();
            $this->db->where('wednesday', $course_conflict['wednesday']);
            $this->db->where('wednesday !=', null);
            $this->db->group_end();

            $this->db->or_group_start();
            $this->db->where('thursday', $course_conflict['thursday']);
            $this->db->where('thursday !=', null);
            $this->db->group_end();

            $this->db->or_group_start();
            $this->db->where('friday', $course_conflict['friday']);
            $this->db->where('friday !=', null);
            $this->db->group_end();

            $this->db->or_group_start();
            $this->db->where('saturday', $course_conflict['saturday']);
            $this->db->where('saturday !=', null);
            $this->db->group_end();
        $this->db->group_end();

        $query1 = $this->db->get();
        $data['query'] = $this->db->last_query();
        $data['result'] = $query1->num_rows();
        $data['subject'] = $query1->result_array('array');

        return $data;
    }

    function search($data)
    {
        $this->db->select('students.student_id, first_name,middle_name, last_name, course, IFNULL(SUM(unit), 0) as unit');
        $this->db->from('students');
        $this->db->join('studentlist', 'students.student_id = studentlist.student_id', 'left');
        $this->db->join('courses', 'studentlist.course_id = courses.course_id', 'left');
        $this->db->like(array('first_name' => $data['first_name'], 'middle_name' => $data['middle_name'], 'last_name' => $data['last_name']));
        $this->db->group_by('student_id');
        $query_result = $this->db->get();
        $result = $query_result->result_array('array');
        return $result;   
    }

    function enroll($data)
    {
        $this->db->insert('studentlist', $data);
    }
}
?>