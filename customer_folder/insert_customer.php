<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<title>Customer entry results</title>
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
	<h1>Customer entry results</h1>
	
	<?php
	// create short variable names
	$namefirst = $_POST['namefirst'];
	$namelast = $_POST['namelast'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$customertype = $_POST['customertype'];
	$cstate = $_POST['cstate'];

	if (!namefirst || !namelast || !city) {
		echo "You have not entered all the required details.<br	/>";
		exit;
		}
		
	if (!get_magic_quotes_gpc()) {
		$namefirst = addslashes($namefirst);
		$namelast = addslashes($namelast);
		$address = addslashes($address);
		$city = addslashes($city);
		$email = addslashes($email);
		}
	@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');
	
	if(mysqli_connect_errno()) {
		echo "Error: Could not connect to database.";
		exit;
		}
	
	$query = "insert into customers values (NULL, '".$namefirst."', '".$namelast."', '".$address."', '".$city."', '".$cstate"', '".$zip."', '".$phone."', '".$email."', '".$customertype."')";
	
	$result = $db->query($query);
	$custid = $db->insert_id;


	
	if ($result) {
		echo $db->affected_rows." book inserted into database.";
	} else {
		echo "An error has occured.";
	}
	

	
	echo $custid;
	
	session_start();
	
	$_SESSION['custid'] = $custid;
	
	
	
	$db->close();
	?>
	
	<p><a href='/job_folder/addjob.php'>Add Job</a></p>
	
</div>	

</body>
</html>