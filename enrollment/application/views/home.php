<div class="wrapper container-fluid">
	<div class="content-wrapper">
		<section class="content mt-2">
			<?php $this->load->view($table);?>
		</section>
	</div>
</div>

<?php $this->load->view('staff/add_staff');?>
<?php $this->load->view('student/add_student');?>
<?php $this->load->view('courses/add_course');?>
