<div id="add-course" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add-course-title"
	aria-hidden="true">
	<div class="modal-dialog course-form" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="add-course-title">Add Course</h5>
				<button class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <?= form_open('backend/add_course', array('id' => 'add_course_form'))?>
			<div class="modal-body">
				<div class="d-flex">
					<div class="form-group flex-shrink-1">
						<input id="units" class="form-control" type="number" name="units" min="1" max="3" placeholder="Unit" required>
                    </div>

                    <span class="ml-1 mr-1"></span>

                    <div class="form-group flex-fill">
						<input id="course-description" class="form-control" type="text" name="courseDescription" placeholder="Course Description" required>
					</div>
                </div>
                
                <div class="d-flex">
					<div class="form-group flex-fill">
						<input id="instructor" class="form-control" type="number" name="instructor" min="1" max="3" placeholder="Instructor" required>
                    </div>

                    <span class="ml-1 mr-1"></span>

                    
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" type="submit">Add</button>
            </div>
            <?= form_close()?>
		</div>
	</div>
</div>

<!-- unit course code description instructor student id room schedule time maximum -->
