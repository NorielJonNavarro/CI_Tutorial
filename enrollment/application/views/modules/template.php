<!-- Head -->
<?php $this->load->view('modules/header');?>
<!-- BootStrap 4 CSS -->
<?php $this->load->view($style);?>
<!-- Main body -->
<?php
    if($this->session->userdata('logged_in')) {
        $this->load->view('modules/sidebar');
        $this->load->view('modules/navbar');    
    }
?>
<?php $this->load->view($content);?>
<!-- BootStrap 4 JS -->
<?php $this->load->view($script);?>
<!-- Foot -->
<?php $this->load->view('modules/footer');?>
                