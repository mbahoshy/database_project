<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<title>Note entry results</title>
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
	<h1>Note entry results</h1>

	<?php
	@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

	if(mysqli_connect_errno()) {
		echo "Error: Could not connect to database.";
		exit;
		}
		
	session_start();
	
	$noteid = $_GET['noteid'];
	echo $noteid;
	
	$query = "delete from notes where noteid=".$noteid;
	$result = $db->query($query);
	
	if ($result) {
		echo $db->affected_rows." note successfully deleted.";
	} else {
		echo "An error has occured.";
	}

	echo "<a href='/job_folder/display_job.php'>Back to Job</a>";
	
	?>
	
	
</div>
</body>
</html>