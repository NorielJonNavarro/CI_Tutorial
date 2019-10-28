<div class="preview">
	<div class="card-header border-0 staff-header">
		<h3 class="card-title">Staffs</h3>
	</div>
	
	<div class="preview-body card-body">
		<?php
			if(empty($staffs)){
				echo '<div class="text-center">';
					echo '<h1>There is no registered staff</h1>';
				echo '</div>';
				
				echo '<div class="text-center">';
						echo '<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#add-staff">';
							echo '<i class="fas fa-user-plus"></i>';
						echo '</button>';
				echo '</div>';
			}else{
				echo '<div class="text-right">';
					echo '<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#add-staff">';
						echo '<i class="fas fa-user-plus"></i>';
					echo '</button>';
				echo '</div>';

				echo '<table id="studentTable" class=" display preview-tables" style="width: 100%">';
					echo '<thead class="thead-light">';
						echo '<tr>';
							echo '<th>ID</th>';
							echo '<th>First Name</th>';
							echo '<th>Middle Name</th>';
							echo '<th>Last Name</th>';
							echo '<th>E-mail Address</th>';
							echo '<th>Phone Number</th>';
							echo '<th>Position</th>';
							echo '<th></th>';
						echo '</tr>';
					echo '</thead>';
				echo '<tbody>';
				
				foreach ($staffs as $row){
					echo '<tr>';
						echo '<td>'.$row['staff_id'].'</td>';
						echo '<td>'.$row['first_name'].'</td>';
						echo '<td>'.$row['middle_name'].'</td>';
						echo '<td>'.$row['last_name'].'</td>';
						echo '<td>'.$row['email'].'</td>';
						echo '<td class="text-center">'.$row['mobile_number'].'</td>';
						echo '<td>'.$row['position'].'</td>';
						echo '<td>';
						echo '<a href="" onclick="#"><i class="fas fa-user-edit fa-lg mr-2 ml-2 edit-button" data-toggle="modal" href="#edit-staff"></i></>';
						echo '<a href="'.base_url().'backend/delete_staff/'.$row['staff_id'].'"><i class="fas fa-user-minus fa-lg delete-button ml-2"></i></a>';
						echo '</td>';
					echo '</tr>';
				}
				echo '</tbody>';
			echo '</table>';
			}
		?>
	</div>
</div>