<?php
class Students extends CI_Controller 
{
     function __construct()
    {
        parent::__construct();
        $this->load->model('student');
    }
    
    function index()
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            $data['style'] = 'admin/css';
            $data['content'] = 'home';
            $data['script'] = 'admin/js';
            $data['table'] = 'student/student_table';
            $data['students'] =  $this->student->get_students();
            $data['home'] = "students/";
            $this->load->view('modules/template', $data);
        }else{
            redirect(base_url() . 'backend/login');
        }
    }

    function get_student($student_id)
    {
        if($this->session->userdata('logged_in')){
            $data['style'] = 'admin/css';
            $data['content'] = 'home';
            $data['script'] = 'admin/js';
            $data['table'] = 'student/edit_student';
            $data['student'] = $this->student->get($student_id);
            echo json_encode($data['student']);
        }
        else
        {
            redirect(base_url());
        }
    }

    function add_student()
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            if($_POST)
            {
                // $email_response = 'available';
                // $mobile_response = 'available';
                $first_name = $_POST['firstName'];
                $middle_name = $_POST['middleName'];
                $last_name = $_POST['lastName'];
                $course = $_POST['course'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password = password_hash($password, PASSWORD_DEFAULT);
                $mobile_number = $_POST['mobileNumber'];
                $province = $_POST['province'];
                $city = $_POST['city'];
                $municipality = $_POST['municipality'];
                $barangay = $_POST['barangay'];
                $street = $_POST['street'];
                $street_no = $_POST['streetNo'];
                $guardian_first_name = $_POST['guardianFirstName'];
                $guardian_middle_name = $_POST['guardianMiddleName'];
                $guardian_last_name = $_POST['guardianLastName'];
                $guardian_relationship = $_POST['relationship'];
                $guardian_mobile_number = $_POST['guardianMobileNumber'];
                $guardian_street_number = $_POST['guardianStreetNo'];
                $guardian_street = $_POST['guardianStreet'];
                $guardian_barangay = $_POST['guardianBarangay'];        
                $guardian_municipality = $_POST['guardianMunicipality'];        
                $guardian_city = $_POST['guardianCity'];                
                $guardian_province = $_POST['guardianProvince'];

                $verify = $this->student->validate_student($email, $mobile_number);
                $email_response = false;
                $mobile_response = false; 
                if(!$verify['email'] && !$verify['mobile_number']){
                    $email_response = true;
                    $mobile_response = true;
                    $data = array(
                        //Student's Information
                        'first_name' => $first_name,
                        'middle_name' => $middle_name,
                        'last_name' => $last_name,
                        'course' => $course,
                        'email' => $email,
                        'password' => $password,
                        'mobile_number' => $mobile_number,
                        'province' => $province,
                        'city' => $city,
                        'municipality' => $municipality,
                        'barangay' => $barangay,
                        'street' => $street,
                        'street_no' => $street_no,

                        //Guardian's Information
                        'guardian_name' => "$guardian_first_name $guardian_middle_name, $guardian_last_name",
                        'guardian_relationship' => $guardian_relationship,
                        'guardian_no' => $guardian_mobile_number,
                        // 'guardian_address' => "$guardian_street_number $guardian_street,$guardian_barangay, $guardian_municipality, $guardian_city, $guardian_province",
                        'guardian_street_no ' => $guardian_street_number,
                        'guardian_street ' => $guardian_street,
                        'guardian_barangay' => $guardian_barangay,
                        'guardian_municipality ' => $guardian_municipality,
                        'guardian_city ' => $guardian_city,
                        'guardian_province ' => $guardian_province
                    );
    
                    $this->student->add($data);
                }
                elseif(!$verify['email'] && $verify['mobile_number'])
                {
                    $email_response = true;
                }            
                elseif($verify['email'] && !$verify['mobile_number'])
                {
                    $mobile_response = true;
                }            
                
                $array = array(
                    'email' => $email_response,
                    'mobile' => $mobile_response
                );

                echo json_encode($array);
            }else{
                exit();
            }
        }else {
            redirect(base_url(). 'backend/login');
        }
    }

    function edit_student($student_id)
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            if($_POST)
            {
                $first_name = $_POST['firstName'];
                $middle_name = $_POST['middleName'];
                $last_name = $_POST['lastName'];
                $course = $_POST['course'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password = password_hash($password, PASSWORD_DEFAULT);
                $mobile_number = $_POST['mobileNumber'];
                $province = $_POST['province'];
                $city = $_POST['city'];
                $municipality = $_POST['municipality'];
                $barangay = $_POST['barangay'];
                $street = $_POST['street'];
                $street_no = $_POST['streetNo'];
                $guardian_name = $_POST['guardianName'];
                $guardian_relationship = $_POST['relationship'];
                $guardian_mobile_number = $_POST['guardianMobileNumber'];
                // $guardian_address = $_POST['guardianAddress'];
                $guardian_street_number = $_POST['guardianStreetNo'];
                $guardian_street = $_POST['guardianStreet'];
                $guardian_barangay = $_POST['guardianBarangay'];        
                $guardian_municipality = $_POST['guardianMunicipality'];        
                $guardian_city = $_POST['guardianCity'];                
                $guardian_province = $_POST['guardianProvince'];

                $verify = $this->student->validate_edit($student_id, $email, $mobile_number);
                if($verify['email'] && $verify['mobile_number'])
                {
                    $email_response =  false;
                    $mobile_response = false;
                }
                elseif($verify['email'] && !$verify['mobile_number'])
                {
                    //email already taken
                    $email_response = false;
                    $mobile_response = true;
                }
                elseif(!$verify['email'] && $verify['mobile_number'])
                {
                    //No. Already Taken
                    $email_response = true;
                    $mobile_response = false;
                }
                else
                {
                    //Valid Edit
                    $email_response = true;
                    $mobile_response = true;

                   
                    $data = array(
                        'first_name' => $first_name,
                        'middle_name' => $middle_name,
                        'last_name' => $last_name,
                        'course' => $course,
                        'email' => $email,
                        'password' => $password,
                        'mobile_number' => $mobile_number,
                        'province' => $province,
                        'city' => $city,
                        'municipality' => $municipality,
                        'barangay' => $barangay,
                        'street' => $street,
                        'street_no' => $street_no,
                        //Guardian's Information
                        // 'guardian_address' => "$guardian_address",
                        'guardian_name' => "$guardian_name",
                        'guardian_relationship' => $guardian_relationship,
                        'guardian_no' => $guardian_mobile_number,
                        'guardian_street_no ' => $guardian_street_number,
                        'guardian_street ' => $guardian_street,
                        'guardian_barangay' => $guardian_barangay,
                        'guardian_municipality ' => $guardian_municipality,
                        'guardian_city ' => $guardian_city,
                        'guardian_province ' => $guardian_province
                    );

                    $this->student->update($student_id, $data);
                }

                $array = array(
                    'email' => $email_response,
                    'mobile' => $mobile_response
                );

                echo json_encode($array);
                
            }else{
                exit();
            }
        }else {
            redirect(base_url(). 'backend/login');
        }
    }

    function delete_student($student_id)
    {
        $session = $this->session->userdata('logged_in');
        if($session)
        {
            $this->student->delete($student_id);
            echo '<script>alert("Seccessfully Deleted")</script>';
            echo '<script>window.location.replace("'.base_url().'students");</script>';
        }
        else 
        {
            redirect(base_url());
        }
    }
}
?>