<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/style.php'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>
	<title>Add customer</title>
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
	

	

?>
<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>
			<ul class='nav'>
				<li><a href='/index.html'>Home</a></li>
				<li><a id='navactive' href='/customer_folder/customer_search.php'>Customers</a></li>
				<li><a href='/job_folder/job_search.php'>Jobs</a></li>
				<li><a href='/equipment_folder/equip_search.php'>Inventory</a></li>
				<li><a href='/service_folder/service_search.php'>Service</a></li>
			</ul>
	<div class='maindisplay'>
		<div class='jobhead'>
			<h1>Customer New Entry</h1>
		</div>
		<div class='subnav'>
			<ul>
				<li><a href=''>Cancel</a></li>
			</ul>
		</div>
		<div class='content'>
			<div class='content_full'>
	
				<form action="/customer_folder/customer_search.php" method="post">
					<table class='noborder'>
						<tr>
							<td>First name</td>
							<td><input type="text" name="namefirst" maxlength="20" size="13"></td>
						</tr>
						<tr>
							<td>Last name</td>
							<td><input type="text" name="namelast" maxlength="20" size="13"></td>
						</tr>
						<tr>
							<td>Address</td>
							<td><input type="text" name="address" maxlength="20" size="13"></td>
						</tr>
						<tr>
							<td>City</td>
							<td><input type="text" name="city" maxlength="20" size="13"></td>
						</tr>
						<tr>
							<td>State</td>
							<td><input type="text" name="cstate" maxlength="20" size="13"></td>
						</tr>
						<tr>
							<td>Zip</td>
							<td><input type="text" name="zip" maxlength="5" size="13"></td>
						</tr>
						<tr>
							<td>Phone</td>
							<td><input type="text" name="phone" maxlength="10" size="13"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" name="email" maxlength="20" size="13"></td>
						</tr>
						<tr>
							<td>Choose Customer Type</td>
							<td><select name="customertype">
									<option value="Residential">Residential</option>
									<option value="Commercial">Commercial</option>
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