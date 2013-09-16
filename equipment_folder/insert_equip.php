<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<title>Equipment entry results</title>
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
				<li><a href='equip_search.php'>Inventory</a></li>
				<li><a id='Tasks' href='contact.htm'>Tasks</a></li>
			</ul>
		</div>
	<h1>Equipment entry results</h1>
	
	<?php
	
	session_start();
	
	$custid = $_SESSION['custid'];
	$jobid = $_SESSION['jobid'];
	
	echo $custid;
	echo $jobid;
	
	// create short variable names
	$equiptype = $_POST['equiptype'];
	$model = $_POST['model'];
	$serial = $_POST['serial'];
	$supplier = $_POST['supplier'];
	$equipstatus = $_POST['equipstatus'];
	$po = $_POST['po'];

	echo $equiptype;
	echo $model;
	echo $serial;
	

	if (!equiptype || !model || !serial) {
		echo "You have not entered all the required details.<br	/>";
		exit;
		}
		
	if (!get_magic_quotes_gpc()) {
		$model = addslashes($model);
		$serial = addslashes($serial);
		}
	@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

	if(mysqli_connect_errno()) {
		echo "Error: Could not connect to database.";
		exit;
		}
		
	$query = "insert into equipment values (NULL, ".$custid.", '".$jobid."', '".$equiptype."', '".$model."', '".$serial."', '".$supplier."', '".$equipstatus."', '".$po."', NULL)";
	
	$result = $db->query($query);
	
	if ($result) {
		echo $db->affected_rows." equipment inserted into database.";
	} else {
		echo "An error has occured.";
	}

	echo "<a href='/job_folder/display_job.php?".$jobid."'>Back to job</a>";
	
	$db->close();
	
	?>	
	
</div>
</body>
</html>
	
	
	
	
	
	
	
	