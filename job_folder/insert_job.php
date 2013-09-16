<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<title>Job entry results</title>
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
				<li><a id='Tasks' href='contact.htm'>Tasks</a></li>
			</ul>
		</div>
	<h1>Job entry results</h1>
	
	<?php
	
	session_start();
	
	$custid = $_SESSION['custid'];
	
	// create short variable names
	$jobname = $_POST['jobname'];
	$jobaddress = $_POST['jobaddress'];
	$jobcity = $_POST['jobcity'];
	$jstate = $_POST['jstate'];
	$jzip = $_POST['jzip'];
	$jobdescription = $_POST['jobdescription'];
	$jobtype = $_POST['jobtype'];
	$jobstatus = $_POST['jobstatus'];

	if (!jobname || !jobaddress || !jobdescription) {
		echo "You have not entered all the required details.<br	/>";
		exit;
		}
		
	if (!get_magic_quotes_gpc()) {
		$jobname = addslashes($jobname);
		$jobaddress = addslashes($jobaddress);
		$jobdescription = addslashes($jobdescription);
		}
	@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

	if(mysqli_connect_errno()) {
		echo "Error: Could not connect to database.";
		exit;
		}
	
	$query = "insert into jobs values (NULL, ".$custid.", '".$jobname."', '".$jobaddress."', '".$jobcity."', '".$jstate."', '".$jzip."', '".$jobdescription."', '".$jobtype."', '".$jobstatus."', NULL, NULL)";
	
	$result = $db->query($query);
	
	if ($result) {
		echo $db->affected_rows." book inserted into database.";
	} else {
		echo "An error has occured.";
	}

	echo "<a href='/customer_folder/display_customer.php?".$custid."'>Back to customer</a>";
	
	$db->close();

	?>
	
</div>	
</body>
</html>