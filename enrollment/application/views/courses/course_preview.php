<div class="preview">
	<div class="card-header border-0 course-header">
		<h3 class="card-title">Courses</h3>
	</div>

	<div class="preview-body card-body">
		<?php
			if(empty($courses)){
				echo '<div class="text-center">';
				echo '<h1>There are no available courses</h1>';
				echo '</div>';
				echo '<div class="text-center">';
				echo '<button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#add-course">';
				echo '<i class="far fa-calendar-plus"></i>';
				echo '</button>';
				echo '</div>';
			}else{
				echo '<table id="staffTable" class=" display preview-tables" style="width: 100%">';
				echo '<thead class="thead-light">';
				echo '<tr>';
				echo '<th>ID</th>';
				echo '<th>First Name</th>';
				echo '<th>Position</th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';

				foreach ($staffs as $row){
					echo '<tr>';
					echo '<td>'.$row['staff_id'].'</td>';
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
