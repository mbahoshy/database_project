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
			<li><a href='customer_search.php'>Customers</a></li>
			<li><a id='navactive' href='/job_folder/job_search.php'>Jobs</a></li>
			<li><a href='/equipment_folder/equip_search.php'>Inventory</a></li>
			<li><a href='/service_folder/service_search.php'>Service</a></li>
		</ul>
	<div class='maindisplay'>
		<div class='jobhead'>
			<h1>Choose a file... </h1>
		</div>
		<div class='subnav'>
			<li><a href=''>Cancel</a></li>
		</div>
		<div class='content'>
			<div class='content_full'>
			<form action="upload.php" method="post" enctype="multipart/form-data"/>
			<div>
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
				<label for="userfile">Upload a file:</label>
				<input type="file" name="userfile" id="userfile"	/>
				Picture Title:<input type="text" name="ptitle" maxlength="30" size="13">
				Picture Description:<input type="text" name="pdescrip" maxlength="100" size="13">
				<input type="submit" value="Send File"	/>
			</div>
			</form>
			<a href="browsedir.php">browse</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>