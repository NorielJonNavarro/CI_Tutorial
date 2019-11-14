<?php
	if(empty($students)){
	echo "hi ser";
	}else{
		echo '<table id="staffTable" class=" display preview-tables" style="width: 100%">';
		echo '<thead class="thead-light">';
		echo '<tr>';
		echo '<th>ID</th>';
		echo '<th>First Name</th>';
		echo '<th>Middle Name</th>';
		echo '<th>Last Name</th>';
		echo '<th>Course</th>';
        // echo '<th>Units</th>';
        echo '<th>Action</th>';
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
		// echo '<td class="text-center">'.$row['unit'].'</td>';
		echo '<td>';
		echo '<a href="#" class="edit_staff" id="'.$row['student_id'].'"><i class="fas fa-user-alt fa-lg edit-button ml-2"></i>Add</a>';
		// echo '<a href="#" class="delete_staff" id="'.$row['staff_id'].'"><i class="fas fa-trash-alt fa-lg delete-button ml-2"></i></a>';
		echo '</td>';
		echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
		}
?>