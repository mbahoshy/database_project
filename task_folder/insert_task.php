<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<title>Task entry results</title>
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
	<h1>Task entry results</h1>
	
	<?php
	
	session_start();
	
	$jobid = $_SESSION['jobid'];
	
	// create short variable names
	$taskname = $_POST['taskname'];
	$createdby = $_POST['createdby'];
	$assignedto = $_POST['assignedto'];
	$task_text = $_POST['task_text'];

	if (!taskname) {
		echo "You have not entered all the required details.<br	/>";
		exit;
		}
		
	if (!get_magic_quotes_gpc()) {
		$taskname = addslashes($taskname);
		$task_text = addslashes($task_text);
		}
	@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

	if(mysqli_connect_errno()) {
		echo "Error: Could not connect to database.";
		exit;
		}
	
	$query = "insert into tasks values (NULL, ".$jobid.", '".$taskname."', '".$createdby."', '".$assignedto."', NULL, '".$task_text."', NULL, NULL)";
	$result = $db->query($query);

	if ($result) {
		echo $db->affected_rows." task inserted into database.";
	} else {
		echo "An error has occured.";
	}

	echo "<a href='/job_folder/display_job.php'>Back to customer</a>";
	
	echo $jobid;
	
	$db->close();

	?>
	
</div>
</body>
</html>