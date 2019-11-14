<div id="add-course" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add-course-title"
	aria-hidden="true">
	<div class="modal-dialog course-form" role="document">
		<div class="modal-content">
			<div class="modal-header course-form-header">
				<h5 class="modal-title" id="add-course-title">Add Course</h5>
				<button class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('courses/add_course', array('id' => 'add_course'))?>
			<div class="modal-body">
				<div class="d-flex mb-2">
					<div class="form-group flex-shrink-1">
						<input id="units" class="form-control" type="number" name="units" min="1" max="3"
							placeholder="Unit" required>
					</div>

					<span class="ml-1 mr-1"></span>

					<div class="form-group flex-fill">
						<input id="course-description" class="form-control" type="text" name="courseDescription"
							placeholder="Course Description" required>
						<span class="incorrect" id="description"></span>
					</div>
				</div>

				<div class="d-flex mb-2">
					<div class="form-group flex-fill">
						<input id="course-code" class="form-control" type="text" name="courseCode"
							placeholder="Course Code" required>
						<span class="incorrect" id="code"></span>
					</div>

					<span class="ml-1 mr-1"></span>

					<div class="form-group flex-fill">
						<input id="room_field" class="form-control" type="text" name="room" placeholder="Room" required>
						<span class="incorrect" id="room_conflict"></span>
					</div>
				</div>

				<div class="form-group d-flex">
					<select id="instructor_field" class="custom-select" name="staffId" required>
						<?php
							echo '<option value="">Instructors</option>';
							foreach($instructors as $row)
							{
								echo '<option value="'.$row['staff_id'].'">'.$row['first_name'].', '.$row['last_name'].'</option>';
							}
						?>
					</select>	
				</div>
				
				<div class="d-flex mb-2">
					<div class="form-group flex-fill">
						<input id="start" class="form-control" type="time" name="startTime"
							placeholder="Start Time" min="07:30" min="19:30" required>
						<span class="incorrect" id="time"></span>
					</div>

					<span class="ml-1 mr-1"></span>

					<div class="form-group flex-fill">
						<input id="end" class="form-control" type="time" name="endTime" placeholder="End Time"
							min="08:30" min="19:30" required>
					</div>
				</div>

				<div class="form-check form-check-inline">
					<input id="monday" class="form-check-input" type="checkbox" name="monday" value="1">
					<label for="monday" class="form-check-label">Monday</label>

					<span class="ml-1 mr-1"></span>

					<input id="tuesday" class="form-check-input" type="checkbox" name="tuesday" value="1">
					<label for="tuesday" class="form-check-label">Tuesday</label>

					<span class="ml-1 mr-1"></span>

					<input id="wednesday" class="form-check-input" type="checkbox" name="wednesday" value="1">
					<label for="wednesday" class="form-check-label">Wednesday</label>

					<span class="ml-1 mr-1"></span>

					<input id="thursday" class="form-check-input" type="checkbox" name="thursday" value="1">
					<label for="thursday" class="form-check-label">Thursday</label>

					<span class="ml-1 mr-1"></span>

					<input id="friday" class="form-check-input" type="checkbox" name="friday" value="1">
					<label for="friday" class="form-check-label">Friday</label>

					<span class="ml-1 mr-1"></span>

					<input id="saturday" class="form-check-input" type="checkbox" name="saturday" value="1">
					<label for="saturday" class="form-check-label">Saturday</label>
				</div>
				<div class="d-flex">
					<span class="incorrect" id="schedule"></span>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" type="submit">Add</button>
			</div>
			<?= form_close()?>
		</div>
	</div>
</div>