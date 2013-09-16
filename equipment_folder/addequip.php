<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>	
	<link rel='stylesheet' type='text/css' href='/css/customer_search.css'	/>	
	<link rel='stylesheet' type='text/css' href='/css/style.php?page=equipment'	/>	
</head>
<body>
<?php
/*get job info and assign variables */
	session_start();

	@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

	if(mysqli_connect_errno()) {
		echo "Error: Could not connect to database.";
		exit;
	}
	

	$page = 'equipment';
	

?>
	
<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>
			<ul class='nav'>
				<li><a href='/index.html'>Home</a></li>
				<li><a href='/customer_folder/customer_search.php'>Customers</a></li>
				<li><a href='/job_folder/job_search.php'>Jobs</a></li>
				<li><a id='navactive' href='equip_search.php'>Inventory</a></li>
				<li><a href='/service_folder/service_search.php'>Service</a></li>
			</ul>

		<div class='maindisplay'>
			<div class='jobhead'>
				<h1>Inventory</h1>
			</div>
			<div class='subnav'>
				<ul>
					<a href='/job_folder/display_job.php'><li>Cancel</li></a>
				</ul>
		</div>
			<div class='content'>
				<div class='content_full'>
					<form action="/job_folder/display_job.php" method="post">
						<table class='noborder'>
							<tr>
								<td>Equipment Type</td>
								<td><select name="equiptype">
										<option value="Indoor Unit">Indoor Unit</option>
										<option value="Strip Heat">Strip Heat</option>
										<option value="Outdoor Unit">Outdoor Unit</option>
										<option value="T-stat">Tstat</option>
										<option value="Zoning">Zoning</option>
										<option value="Humidifier">Humidifier</option>
										<option value="EAC">EAC</option>
										<option value="Other">Other</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Model #</td>
								<td><input type="text" name="model" maxlength="30" size="13"></td>
							</tr>
							<tr>
								<td>Serial #</td>
								<td><input type="text" name="serial" maxlength="30" size="13"></td>
							</tr>
							<tr>
								<td>Ordered From</td>
								<td><select name="supplier">
										<option id="Airefco" value="Airefco">Airefco</option>
										<option id="Jensco" value="Jensco">Jensco</option>
										<option id="Thrifty" value="Thrifty">Thrifty</option>
										<option id="Norco" value="Norco">Norco</option>
										<option id="Other" value="Other">Other</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>PO #</td>
								<td><input type="text" name="po" maxlength="30" size="13"></td>
							</tr>
							<tr>
								<td>Status</td>
								<td><select name="equipstatus">
										<option value="Open">Open</option>
										<option value="Ordered">Ordered</option>
										<option value="Received">Received</option>
										<option value="Installed">Installed</option>
										<option value="Removed">Removed</option>
									</select>
								</td>
							</tr>
						</table>

						<div class='button'><button type="submit">Add</button></div>
						
					</form>
				</div>
			</div>
		</div>
</div>
</body>
</html>