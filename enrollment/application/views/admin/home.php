<div class="wrapper">
	<div class="content-wrapper">
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark" id="home">HOME</h1>
					</div>
				</div>
			</div>
		</div>

		<section class="content">
			<div class="container-fluid">
				<div class="d-flex justify-content-center">
					<div class="card flex-fill" id="staff">
						<?php $this->load->view('staff/staff_preview');?>
					</div>
				</div>

				<div class="d-flex justify-content-center">
					<div class="card flex-fill" id="students">
						<?php $this->load->view('student/student_preview');?>
					</div>
				</div>

				<span class="ml-2 mr-2"></span>

				<div class="d-flex justify-content-center">
					<div class="card flex-fill" id="courses">
						<?php $this->load->view('courses/course_preview');?>
					</div>
				</div>

				<span class="ml-2 mr-2"></span>

			</div>
		</section>
	</div>

	<?php $this->load->view('staff/add_staff');?>
	<?php $this->load->view('staff/delete_staff');?>
	<?php $this->load->view('student/add_student');?>
</div>
