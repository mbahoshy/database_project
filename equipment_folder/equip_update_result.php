<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/customer_search.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>
	<title>Customer Search</title>
</head>

<body>
<div id='jobpage'>
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
	<div class='maindisplay'>
		<div class='jobhead'>
			<h1>Equipment Search</h1>
		</div>
		<div class='content'>
		
		<?php
		
		// start session and connect to database
		
		session_start();
		
		@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

		if (mysqli_connect_errno()) {
		 echo 'Error: Could not connect to database.  Please try again later.';
		 exit;
		}
		
		// assign variables from form POST
		
		$equipid = $_POST['equipid'];
		$equiptype = $_POST['equiptype'];
		$model = $_POST['model'];
		$serial = $_POST['serial'];
		$supplier = $_POST['supplier'];
		$po = $_POST['po'];
		$equipstatus = $_POST['equipstatus'];
		
		$query = "update equipment set equiptype = '".$equiptype."', model = '".$model."', serial = '".$serial."', supplier = '".$supplier."', equipstatus = '".$equipstatus."', po = '".$po."' where equipid = ".$equipid;
		
		$result = $db->query($query);
		
		if ($result) {
			echo $db->affected_rows." equipment updated into database.";
		} else {
			echo "An error has occured.";
		}

		echo "<a href='/equipment_folder/equip_search.php'>Back to Inventory</a>";
		
		$db->close();
		
		
		?>
		
		</div>
	</div>
</div>
</body>
</html>