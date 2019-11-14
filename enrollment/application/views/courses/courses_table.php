<div class="preview">
	<div class="card-header border-0 course-header">
		<h1>Courses</h1>
	</div>

	<div class="preview-body card-body">
		<?php
			if(empty($courses)){
				echo '<div class="text-center">';
				echo '<h1>There are no available courses</h1>';
				echo '</div>';
				echo '<div class="text-center">';
				echo '<button type="button" class="btn add-course mb-2" data-toggle="modal" data-target="#add-course">';
				echo '<i class="far fa-calendar-plus"></i>';
				echo '</button>';
				echo '</div>';
			}else{
				echo '<table id="coursesTable" class=" display preview-tables" style="width: 100%">';
				echo '<thead class="thead-light">';
				echo '<tr>';
				echo '<th>ID</th>';
				echo '<th>Course Code</th>';
				echo '<th>Course Description</th>';
				echo '<th>Instructor</th>';
				echo '<th>Room</th>';
				echo '<th>Schedule</th>';
				echo '<th>Time</th>';
				echo '<th>Status</th>';
				echo '<th>Max</th>';
				echo '<th>Actions</th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
				foreach ($courses as $row){
					echo '<tr>';
					echo '<td>'.$row['course_id'].'</td>';
					echo '<td>'.$row['course_code'].'</td>';
					echo '<td>'.$row['course_description'].'</td>';
					echo '<td>'.$row['first_name'].', '.$row['last_name'].'</td>';
					echo '<td>'.$row['room'].'</td>';
					echo '<td>'.$row['schedule'].'</td>';
					echo '<td>'.$row['start_time'].'- '.$row['end_time'] . '</td>';
					echo '<td>'.$row['status'].'</td>';
					echo '<td>'.$row['maximum_capacity'].'</td>';
					echo '<td>';
						echo '<a href="'.base_url().'courses/enroll_student_page/'.$row['course_id'].'"><i class="fas fa-user-plus mr-2"></i></a>';
						echo '<a href="#" id="'.$row['course_id'].'" class="edit_course"><i class="fas fa-edit fa-lg mr-2 ml-2 edit-button"></i></a>';
						echo '<a href="#" class="delete_course" id="'.$row['course_id'].'"><i class="fas fa-calendar-times fa-lg delete-button ml-2"></i></a>';
						echo '</td>';
					echo '</tr>';
					}

				echo '</tbody>';
				echo '</table>';
				}

		?>
	</div>
</div>
<?php $this->load->view('courses/delete_course');?>
<?php $this->load->view('courses/edit_course');?>