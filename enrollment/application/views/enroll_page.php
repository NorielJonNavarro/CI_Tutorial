<div class="wrapper">
	<div class="content-wrapper">
		<section class="content mt-2">
			<div class="text-right mb-3">
				<button class="btn btn-danger">
					<a href="<?= base_url()?>courses" class="enroll-student">Back</a>
				</button>
			</div>
			<div class="header d-flex justify-content-between">
				<div>
					<input class="form-control hidden-form" type="text" name="course" id="course_number" value="<?=$course['course_id']?>">
					<h3><b>Course Description:</b> <?= $course['course_description']?></h3>
					<input class="form-control hidden-form" type="text" name="instructor" id="instructor_number" value="<?=$course['instructor_id']?>">
					<h3 id="aaaaa" value="<?=$course['instructor_id']?>"><b>Instructor:</b> <?=$course['first_name']?>, <?=$course['last_name']?></h3>
					<h3><b>Room and Schedule:</b> <?= $course['room']?>/<?= $course['schedule']?></h3>
				</div>

				<div>
					<h4><b>Numbers of Enrolled:</b> <?=$students['no_of_students']?></h4>
					<h4><b>Max Capacity:</b> <?= $course['maximum_capacity']?></h4>
					<h4><b>Units:</b> <?= $course['unit']?></h4>
					<h4><b>Date Posted:</b> <?= $course['date_created']?></h4>
				</div>
			</div>

			<div class="container-fluid enroll-body d-flex mt-4">
				<div class="flex-fill">
					<?php $this->load->view('enrollment/enrollment_table.php');?>
				</div>
			</div>	
		</section>
	</div>
</div>

<?php $this->load->view('enrollment/enroll_student.php');?>
