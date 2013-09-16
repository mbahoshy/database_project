<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/customer_search.css'	/>	
	<link rel='stylesheet' type='text/css' href='/css/style.php'	/>	
</head>
<body>
<?php
/*start session and connect to database */
	session_start();

	@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

	if(mysqli_connect_errno()) {
		echo "Error: Could not connect to database.";
		exit;
	}
	
	$jobid = $_SESSION['jobid'];

?>

<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>
	
			<ul class='nav'>
				<li><a id='home' href='/index.html'>Home</a></li>
				<li><a href='/customer_folder/customer_search.php'>Customers</a></li>
				<li><a href='job_search.php'>Jobs</a></li>
				<li><a href='/equipment_folder/equip_search.php'>Inventory</a></li>
				<li><a href='/service_folder/service_search.php'>Service</a></li>
			</ul>


	<div class='maindisplay'>
		<div class='jobhead'>
			<h1>Pictures for job </h1>
		</div>
		<div class='subnav'>
		<ul>
			<li><a href=''>Home</a></li>
			<li><a href=''>Tasks</a></li>
			<li><a href=''>Quote</a></li>
			<li><a href=''>Trim</a></li>
			<li><a href=''>Equipment</a></li>
			<li><a href='display_job_pictures.php'>Pictures</a></li>
		</ul>
		</div>
		<div class="content">
			<div class='imgholder'>
			
				<?php
					$query = "select * from files where jobid = ".$jobid;
					$result = $db->query($query);
							
					
					if (!$result) {
						echo "An error has occured.";
					}
				
					$num_rows = $result->num_rows;
					
					for ($i=0; $i < $num_rows; $i++) {	
						$row = $result->fetch_assoc();
						echo "<p><a href='../uploads/".$row['fileid'].".".$row['ext']."'>".$row['ptitle']."</a> - ".$row['pdescrip']."</p>";
						echo "<p><img src='../uploads/".$row['fileid'].".".$row['ext']."'	/></p>";

					}
					
					
					
					
					/* $current_dir = '../uploads/';
					$dir = opendir($current_dir);
					
					echo "<p>Upload directory is $current_dir </p>";
					echo '<p>Directory listing:</p>';
					
					while (false !== ($file = readdir($dir))) {
						//strip out the two entries of . and ..
						if ($file != "." && $file != "..")
						{
							echo "<li><a href='uploads/$file'>$file</a></li>";
						}
					}
					echo '</ul>';
					closedir($dir);*/
				?>
			
			
			
			</div>
		</div>
	</div>
</div>
</body>
</html>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		