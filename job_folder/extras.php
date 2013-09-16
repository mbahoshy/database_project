<?php	
	

	
	echo "<h1>".$jobname." - ".$namefirst." ".$namelast."</h1>";
	echo "<table border='1'>";
					echo "<tr>";
						echo "<td><a href='?jobid=".$row['jobid']."'>".$row['jobid']."</a></td>";

						echo "<td>".stripslashes($row['jobname'])."</td>";

						echo "<td>".stripslashes($row['jobaddress'])."</td>";

						echo "<td>".stripslashes($row['jobcity'])."</td>";

						echo "<td>".stripslashes($row['jobdescription'])."</td>";
						
						echo "<td>".stripslashes($row['jobtype'])."</td>";
						
						echo "<td>".stripslashes($row['stamp_created'])."</td>";
					echo "</tr>";
	echo "</table>";
	
	

	
	$taskquery = "select * from tasks where jobid = ".$jobid;
	$taskresult = $db->query($taskquery);
	$taskrow = $taskresult->fetch_assoc();
	
	$num_tasks = $taskresult->num_rows;
	
	echo "<table border ='1'>";
			echo "<tr>";
			echo "<th>Task Name</th> <th>Created By</th> <th>Assigned To</th> <th>Status</th> <th>Task Text</th> <th>Date Created</th></tr>";

	for ($i=0; $i <$num_tasks; $i++) {	
		$taskrow = $taskresult->fetch_assoc();
				
					echo "<tr>";
						echo "<td>".stripslashes($taskrow['taskname'])."</td>";

						echo "<td>".stripslashes($taskrow['createdby'])."</td>";

						echo "<td>".stripslashes($taskrow['assignedto'])."</td>";

						echo "<td>".stripslashes($taskrow['status'])."</td>";
						
						echo "<td>".stripslashes($taskrow['task_text'])."</td>";
						
						echo "<td>".stripslashes($taskrow['stamp_created'])."</td>";
					echo "</tr>";
		}
	echo "</table>";	
	
	
?>


<?php	
	
	$notequery = "select * from notes where jobid = ".$jobid;
	$noteresult = $db->query($notequery);
	$noterow = $noteresult->fetch_assoc();
	
	$num_rows = $noteresult->num_rows;
	
	echo "<table border ='1'>";
			echo "<tr>";
			echo "<th>Note Name</th> <th>Created By</th> <th>Contents</th></tr>";

	for ($i=0; $i <$num_rows; $i++) {	
		$noterow = $noteresult->fetch_assoc();
				
					echo "<tr>";
						echo "<td>".stripslashes($noterow['notename'])."</td>";

						echo "<td>".stripslashes($noterow['notecreator'])."</td>";

						echo "<td>".stripslashes($noterow['note_text'])."</td>";

					echo "</tr>";
		}
	echo "</table>";
?>
