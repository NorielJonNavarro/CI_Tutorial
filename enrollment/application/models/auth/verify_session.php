<?php
class Verify_session extends CI_Model
{
    
    //1. Checks if the session 'logged_in' has content. if it does, it returns true. Else, it will return false.
    function check_session()
    {
        $session = $this->session->userdata('logged_in');
        if($session){
            return true;
        }else{
            return false;
        }
    }
}
?>