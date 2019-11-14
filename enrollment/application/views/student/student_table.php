<div class="preview">
	<div class="card-header border-0 student-header">
		<h1>Students</h1>
	</div>

	<div class="preview-body card-body">
				<?php
					if(empty($students)){
						echo '<div class="text-center">';
						echo '<h1>There are no currently enrolled students</h1>';
						echo '</div>';
						echo '<div class="text-center">';
						echo '<button type="button" class="btn add-student-button mb-2" data-toggle="modal" data-target="#add-student">';
						echo '<i class="fas fa-user-plus"></i>';
						echo '</button>';
						echo '</div>';
					}else{						
						echo '<table id="studentTable" class=" display preview-tables" style="width: 100%">';
						echo '<thead class="thead-light">';
						echo '<tr>';
						echo '<th>ID</th>';
						echo '<th>First Name</th>';
						echo '<th>Middle Name</th>';
						echo '<th>Last Name</th>';
						echo '<th>Course</th>';
						echo '<th>E-mail Address</th>';
						echo '<th>Guardian</th>';
						echo '<th>Guardian Contact</th>';
						echo '<th class="edit-row">Actions</th>';
						echo '</tr>';
						echo '</thead>';
						echo '<tbody>';
						
						foreach ($students as $row){
							echo '<tr>';
							echo '<td>'.$row['student_id'].'</td>';
							echo '<td>'.$row['first_name'].'</td>';
							echo '<td>'.$row['middle_name'].'</td>';
							echo '<td>'.$row['last_name'].'</td>';
							echo '<td>'.$row['course'].'</td>';		
							echo '<td>'.$row['email'].'</td>';
							echo '<td>'.$row['guardian_name'].'</td>';
							echo '<td>'.$row['guardian_no'].'</td>';
							echo '<td>';
							echo '<a href="#" class="edit_student" id="'.$row['student_id'].'"><i class="fas fa-pencil-alt fa-lg edit-button ml-2"></i></a>';
							echo '<a href="#" class="delete_student" id="'.$row['student_id'].'"><i class="fas fa-trash-alt fa-lg delete-button ml-2"></i></a>';
							echo '</td>';
							echo '</tr>';
						}

						echo '</tbody>';
						echo '</table>';
					}
				?>
	</div>
</div>

<?php $this->load->view('student/edit_student2');?>
<?php $this->load->view('student/delete_student');?>