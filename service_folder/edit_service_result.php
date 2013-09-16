<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/customer_search.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/style.php?page=service'	/>
	<title>Service Update Results</title>
</head>

<body>
<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>
			<ul class='nav'>
				<li><a href='/index.html'>Home</a></li>
				<li><a href='/customer_folder/customer_search.php'>Customers</a></li>
				<li><a href='/job_folder/job_search.php'>Jobs</a></li>
				<li><a href='/equipment_folder/equip_search.php'>Inventory</a></li>
				<li><a id='navactive' href='/service_folder/service_search'>Service</a></li>
			</ul>

	<div class='maindisplay'>
		<div class='jobhead'>
			<h1>Service Update</h1>
		</div>
		<div class='subnav'>
			<ul>
				<li><a href='service_search.php'>Back</a></li>
			</ul>
		</div>
		<div class='content'>
			<div class='content_full'>
		
			<?php
			
			// start session and connect to database
			
			session_start();
			
			@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

			if (mysqli_connect_errno()) {
			 echo 'Error: Could not connect to database.  Please try again later.';
			 exit;
			}
			
			$serviceid = $_GET['serviceid'];
			// assign variables from form POST
			
			$snamefirst = $_POST['snamefirst'];
			$snamelast = $_POST['snamelast'];
			$saddress = $_POST['saddress'];
			$scity = $_POST['scity'];
			$sstate = $_POST['sstate'];
			$szip = $_POST['szip'];
			$sphone = $_POST['sphone'];
			$sdescription = $_POST['sdescription'];
			$assignedto = $_POST['assignedto'];
			$createdby = $_POST['createdby'];
			$servicestatus = $_POST['servicestatus'];
			$assigneddate = $_POST['assigneddate'];
			
			$query = "update service set snamefirst = '".$snamefirst."', snamelast = '".$snamelast."', saddress = '".$saddress."', scity = '".$scity."', sstate = '".$sstate."', szip = '".$szip."', sphone = '".$sphone."', sdescription = '".$sdescription."', assignedto = '".$assignedto."', createdby = '".$createdby."', servicestatus = '".$servicestatus."', assigneddate = '".$assigneddate."' where serviceid = ".$serviceid;
			
			$result = $db->query($query);
			
			if ($result) {
				echo $db->affected_rows." equipment updated into database.";
			} else {
				echo "An error has occured.";
			}

			echo "<a href='/service_folder/display_service.php?serviceid=".$serviceid."'>Back to Service</a>";
			
			$db->close();
			
			
			
			?>
			</div>
		
		</div>
	</div>
</div>
</body>
</html>