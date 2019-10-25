<div class="preview">
	<div class="card-header border-0 student-header">
		<h3 class="card-title">Students</h3>
	</div>

	<div class="preview-body card-body">
				<?php
					if(empty($students)){
						echo '<div class="text-center">';
						echo '<h1>There are no currently enrolled students</h1>';
						echo '</div>';
						echo '<div class="text-center">';
						echo '<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#add-staff">';
						echo '<i class="fas fa-user-plus"></i>';
						echo '</button>';
						echo '</div>';
					}else{
						echo '<table id="studentTable" class=" display preview-tables" style="width: 100%">';
						echo '<thead class="thead-light">';
						echo '<tr>';
						echo '<th>ID</th>';
						echo '<th>First Name</th>';
						echo '<th>Position</th>';
						echo '</tr>';
						echo '</thead>';
						echo '<tbody>';
						
						foreach ($students as $row){
							echo '<tr>';
							echo '<td>'.$row['student_id'].'</td>';
							echo '<td>'.$row['first_name'].'</td>';
							echo '<td>'.$row['position'].'</td>';
							echo '</tr>';
						}

						echo '</tbody>';
						echo '</table>';
					}
				?>
	</div>
</div>
