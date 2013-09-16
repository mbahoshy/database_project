<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<title>Create New task for job</title>
</head>
<body>
<div id='page'>
	<div id='header' class='gradient'>
	</div>
	
		<div id='navcontainer'>
			<ul class='nav'>
				<li><a id='home' href='/index.html'>Home</a></li>
				<li><a href='/customer_folder/customer_search.php'>Customers</a></li>
				<li><a href='/job_folder/job_search.php'>Jobs</a></li>
				<li><a href='/equipment_folder/equip_search.php'>Inventory</a></li>
				<li><a href='/service_folder/service_search.php'>Service</a></li>
			</ul>
		</div>
		
<?php
	session_start();

	@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

	if(mysqli_connect_errno()) {
		echo "Error: Could not connect to database.";
		exit;
	}
	
	$jobid = $_SESSION['jobid'];
	$jobquery = "select * from jobs where jobid = ".$jobid;
	
	$jobresult = $db->query($jobquery);
	$jobrow = $jobresult->fetch_assoc();
	$jobname = stripslashes($jobrow['jobname']);
?>

	<h1>Create New Task for <?php echo $jobname; ?></h1>
	<form action="insert_task.php" method="post">
		<table border ="0">
			<tr>
				<td>Task Name</td>
				<td><input type="text" name="taskname" maxlength="30" size="13"></td>
			</tr>
			<tr>
				<td>Created By</td>
				<td><select name="createdby">
						<option value="tom">Tom</option>
						<option value="patty">Patty</option>
						<option value="joe">Joe</option>
						<option value="matt">Matt</option>
						<option value="sarah">Sarah</option>
						<option value="carmen">Carmen</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Assigned To</td>
				<td><select name="assignedto">
						<option value="tom">Tom</option>
						<option value="patty">Patty</option>
						<option value="joe">Joe</option>
						<option value="matt">Matt</option>
						<option value="sarah">Sarah</option>
						<option value="carmen">Carmen</option>
						<option value="jacob">Jacob</option>
						<option value="josh">Josh</option>
						<option value="phil">Phil</option>
						<option value="walt">Walt</option>
						<option value="david">David</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Description</td>
				<td><textarea name='task_text' rows='30' cols='50'>Please enter a description</textarea></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="register"></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>