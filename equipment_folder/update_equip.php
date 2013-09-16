<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<title>Equipment entry results</title>
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
		<h1>Equipment entry results</h1>
		
		<?php
		
		session_start();
		
		@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

		if(mysqli_connect_errno()) {
			echo "Error: Could not connect to database.";
			exit;
		}		
		
		$equips = $_POST['equips'];
		$equipstatus = $_POST['equipstatus'];
		
		$num_checks = count($equips);
		
		echo $num_checks;
		
		echo $equips[0];
		
		for ($i=0; $i <$num_checks; $i++) {
			$equipid = $equips[$i];
			
			$equipquery = "update equipment set equipstatus = '".$equipstatus."' where equipid = ".$equipid;
			$equipresult = $db->query($equipquery);
			if ($equipresult) {
				echo $db->affected_rows." equipment updated in database.";
			} else {
				echo "An error has occured.";
			}
		}


		?>
	</div>
</div>
</body>
</html>