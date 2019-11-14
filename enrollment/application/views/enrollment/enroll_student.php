<div id="enroll-student" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="enroll-student-title"
	aria-hidden="true">
	<div class="modal-dialog enroll-student-form" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="enroll-student-title"><?= $course['course_description']?></h2>
				<button class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('students/search_student', array('id' => 'search_student_form'))?>
			<div class="modal-body add-staff-body">
				<div class="form-group">
					<input id="first_name" class="form-control" type="text" name="firstName" placeholder="First Name">
				</div>

				<div class="form-group">
					<input id="middle_name" class="form-control" type="text" name="middleName"
						placeholder="Middle Name">
				</div>

				<div class="form-group">
					<input id="last_name" class="form-control" type="text" name="lastName" placeholder="Last Name">
					<span class="incorrect" id="search_error"></span>
				</div>
			</div>

			<div class="modal-footer">
				<div>
					<button class="btn btn-danger" type="submit">Search</button>
				</div>
			</div>
			<?= form_close();?>

			<div class="result ml-4 mr-4">
				<table id="search_students" class="display preview-tables" style="width: 100%">
					<thead class="thead-light">
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Last Name</th>
							<th>Course</th>
							<th>Units</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="search_content">
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
