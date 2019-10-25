<?php


 function logout()
 {
     $is_session = $this->verify_session->check_session();
     if($is_session){
         $this->session->unset_userdata('logged_in');
         $this->session->sess_destroy();
     }else {
         redirect(base_url(). 'backend/login');
     }
 }//end of logout


 
 function update_staff($staff_id)
 {
     if($_POST){
         $data = array(
             'email' => $_POST['email'],
             'position' => $_POST['position'],
         );
         $this->staff->update($staff_id, $data);
     }
     // redirect(base_url());
 }

 function get_staff(){
     echo 'hi';
 }
?>