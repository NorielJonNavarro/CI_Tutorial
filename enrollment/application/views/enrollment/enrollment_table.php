<?php
    if($students['no_of_students'] === 0)
    {
        echo '<div class="d-flex flex-column">';            
            echo '<div class="text-center">';
                echo '<h1>No students enrolled</h1>';
            echo '</div>';
            
            echo '<div class="text-center">';
                echo '<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#enroll-student">';
                echo '<i class="fas fa-user-plus"></i>';
                echo '</button>';
            echo '</div>';
        echo '</div>';        
    }
    else 
    {
        echo '<h1 class="mb-3">List of enrolled students</h1>';
        echo '<table id="enrollmentTable" class=" display preview-tables flex-fill" style="width: 100%">';
					echo '<thead class="thead-light">';
						echo '<tr>';
							echo '<th>ID</th>';
							echo '<th>First Name</th>';						
                            echo '<th>Middle Name</th>';
                            echo '<th>Last Name</th>';
                            echo '<th>Course</th>';
						echo '</tr>';
					echo '</thead>';
				echo '<tbody>';
				
				foreach ($students['students'] as $row){
					echo '<tr>';
						echo '<td>'.$row['student_id'].'</td>';
                        echo '<td>'.$row['first_name'].'</td>';					
                        echo '<td>'.$row['middle_name'].'</td>';
                        echo '<td>'.$row['last_name'].'</td>';
                        echo '<td>'.$row['course'].'</td>';
					echo '</tr>';
				}
				echo '</tbody>';
			echo '</table>';
    }
?>