<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>	
	<link rel='stylesheet' type='text/css' href='/css/customer_search.css'	/>	
	 <link rel='stylesheet' type='text/css' href='/css/style.php?page=jobs'	/>	
</head>
<body>
<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>
		<ul class='nav'>
			<li><a href='/index.html'>Home</a></li>
			<li><a href='/customer_folder/customer_search.php'>Customers</a></li>
			<li><a id = 'navactive' href='/job_folder/job_search.php'>Jobs</a></li>
			<li><a href='/equipment_folder/equip_search.php'>Inventory</a></li>
			<li><a href='/service_folder/service_search.php'>Service</a></li>
		</ul>
	<div class='maindisplay'>
		<div class='jobhead'>
			<h1>Uploading the file... </h1>
		</div>
		<div class='subnav'>
			<li><a href=''>Cancel</a>
		</div>
		<div class='content'>
			<div class='content_full'>
	<?php
	
	//start session and connect to database
	
	session_start();

	@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

	if(mysqli_connect_errno()) {
		echo "Error: Could not connect to database.";
		exit;
	}
	
	//find jobid and custid from SESSION cookie
	
	$jobid = $_SESSION['jobid'];
	$custid = $_SESSION['custid'];
	$ptitle = $_POST['ptitle'];
	$pdescrip = $_POST['pdescrip'];
	
	//check upload file for errors
	
		if ($_FILES['userfile']['error'] > 0) {
			echo 'Problem: ';
			switch ($_FILES['userfile']['error'])
			{
				case 1: echo 'File exceeded upload_max_filesize';
					break;
				case 2: echo 'File exceeded max_file_size';
					break;
				case 3: echo 'File only partially uploaded';
					break;
				case 4: echo 'No file uploaded';
					break;
				case 6: echo 'Cannot upload file: No temp directory specified';
					break;
				case 7: echo 'Upload failed: Cannot write to disk';
					break;
			}
			exit;
		}
		
							// Does the file have the right MIME type?
							
							/* if ($_FILES['userfile']['type'] != 'text/plain') {
								echo 'Problem: file is not plain text';
								exit;
							} */
		
		echo "test";
		
		
		$filename = $_FILES['userfile']['name'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		
		
		$query = "insert into files values (NULL, '".$ext."', '".$custid."', '".$jobid."', '".$ptitle."', '".$pdescrip."', NULL)";
		$result = $db->query($query);
	
		
		if ($result) {
			echo $db->affected_rows." file inserted into database.";
		} else {
			echo "An error has occured.";
		}
		
		
		$fileid = $db->insert_id;


		

		
		
		
		// put the file where we'd like it
		
		$upfile = '../uploads/'.$fileid.".".$ext;
		
		if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
			if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile)) {
				echo 'Problem: Could not move file to destination directory';
				exit;
			}
		}
		else
		{
			echo 'Problem: Possible file upload attack. Filename: ';
			echo $_FILES ['userfile']['name'];
			exit;
		}
		
		echo 'File uploaded successfully<br><br>';
		
		//remove possible HTML and PHP tags form the files contents
	
		/*	$contents = file_get_contents($upfile);
				$contents = strip_tags($contents);
			file_put_contents($_FILES['userfile']['name'], $contents);
			
				//show what was uploaded
			
			echo '<p>Preview of uploaded file contents:<br/><hr/>';
			echo n12br($contents);
			echo '<br/><hr/>';
		*/
		
	echo "<a href='/job_folder/display_job.php?jobid=".$jobid."'>Back to job</a>";
	
	?>
				</div>
		</div>
	</div>
</div>
	
</body>
</html>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	