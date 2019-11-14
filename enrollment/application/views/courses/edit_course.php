
<div id="edit-course" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add-course-title"
	aria-hidden="true">
	<div class="modal-dialog course-form" role="document">
		<div class="modal-content">
			<div class="modal-header course-form-header">
				<h5 class="modal-title" id="add-course-title">Add Course</h5>
				<button class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <?= form_open('courses/edit_course/27', array('id' => 'edit_course'))?>
			<div class="modal-body">
				<div class="d-flex mb-2">
					<div class="form-group flex-shrink-1">
						<input id="edit-course-id" class="form-control course-id" type="text" name="course_id">
                    </div>
					<div class="form-group flex-shrink-1">
						<input id="units" class="form-control" type="number" name="units" min="1" max="3" placeholder="Unit" required>
                    </div>

                    <span class="ml-1 mr-1"></span>

                    <div class="form-group flex-fill">
						<input id="course_description" class="form-control" type="text" name="courseDescription" placeholder="Course Description" required>
						<span class="incorrect" id="description_error"></span>
					</div>
                </div>
                
                <div class="d-flex mb-2">
					<div class="form-group flex-fill">
						<input id="course_code" class="form-control" type="text" name="courseCode" placeholder="Course Code" required>
						<span class="incorrect" id="error_code"></span>
                    </div>

					<span class="ml-1 mr-1"></span>
					
					<div class="form-group flex-fill">
						<input id="instructor" class="form-control" type="text" name="instructor" placeholder="Instructor" disabled>
						<span class="incorrect" id="error_code"></span>
					</div>

                    <span class="ml-1 mr-1"></span>

					<div class="form-group flex-shrink-1">
						<input id="room" class="form-control" type="text" name="room" placeholder="Room" required>
						<span class="incorrect" id="error_room"></span>
                    </div>                    
				</div>

				<div class="d-flex mb-2">
					<div class="form-group flex-fill">
						<input id="start_time" class="form-control" type="time" name="startTime"placeholder="Start Time" min="07:30" min="19:30" required>
						<span class="incorrect" id="error_time"></span>
                    </div>

                    <span class="ml-1 mr-1"></span>

					<div class="form-group flex-fill">
						<input id="end_time" class="form-control" type="time" name="endTime"placeholder="End Time" min="08:30" min="19:30" required>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" type="submit">edit</button>
            </div>
            <?= form_close()?>
		</div>
	</div>
</div>
