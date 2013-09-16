<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/style.php?page=jobs'	/>
	<title>Create New Job for Customer</title>
</head>
<body>
<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>

	<div id='navcontainer'>
		<ul class='nav'>
			<li><a href='/index.html'>Home</a></li>
			<li><a href='/customer_folder/customer_search.php'>Customers</a></li>
			<li><a id='navactive' href='/job_folder/job_search.php'>Jobs</a></li>
			<li><a href='/equipment_folder/equip_search.php'>Inventory</a></li>
			<li><a href='/service_folder/service_search.php'>Service</a></li>
		</ul>
	</div>
	<div class='maindisplay'>
	
	
			<?php
				session_start();

				@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

				if(mysqli_connect_errno()) {
					echo "Error: Could not connect to database.";
					exit;
				}
				
				$custid = $_SESSION['custid'];
				$custquery = "select * from customers where customerid = ".$custid;
				
				$custresult = $db->query($custquery);
				$custrow = $custresult->fetch_assoc();
				$namelast = stripslashes($custrow['namelast']);
				$namefirst = stripslashes($custrow['namefirst']);
				$customertype = stripslashes($custrow['customertype']);
				
				if ($customertype == 'Residential') {
					$address = stripslashes($custrow['address']);
					$city = stripslashes($custrow['city']);
					$cstate = stripslashes($custrow['cstate']);
					$zip = stripslashes($custrow['zip']);
				}
				
				$page = 'jobs';
			?>



		<div class='jobhead'>
			<h1>Create New Job for <?php echo $namefirst." ".$namelast; ?></h1>
		</div>
		<div class='subnav'>
			<ul>
				<li><a href=''>Cancel</a></li>
			</ul>
		</div>
		<div class='content'>
			<div class='content_full'>
				<form action="/customer_folder/display_customer.php" method="post">
					<table class='noborder'>
						<tr>
							<td>Job Name</td>
							<td><input type="text" name="jobname" maxlength="30" size="20"></td>
						</tr>
						<tr>
							<td>Address</td>
							<td><input type="text" name="jobaddress" maxlength="30" size="20" value='<?php echo $address;?>' ></td>
						</tr>
						<tr>
							<td>City</td>
							<td><input type="text" name="jobcity" maxlength="30" size="20" value='<?php echo $city;?>'></td>
						</tr>
						<tr>
							<td>State</td>
							<td><input type="text" name="jstate" maxlength="2" size="20" value='<?php echo $cstate;?>'></td>
						</tr>
						<tr>
							<td>Zip</td>
							<td><input type="text" name="jzip" maxlength="30" size="20" value='<?php echo $zip;?>'></td>
						</tr>
						<tr>
							<td>Description</td>
							<td><input class='txtinput' type="text" name="jobdescription" maxlength="200" size="60"></td>
						</tr>
						<tr>
							<td>Choose Job Type</td>
							<td><select name="jobtype">
									<option value="residential">Residential Retrofit</option>
									<option value="new construction">New Construction</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Job Status</td>
							<td><select name="jobstatus">
									<option value="Opportunity">Opportunity</option>
									<option value="Quoted">Quoted</option>
									<option value="Earned">Earned</option>
									<option value="Scheduled">Scheduled</option>
									<option value="In Progress">In Progress</option>
									<option value="Trim">Trim</option>
									<option value="Complete">Complete</option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="register"></td>
						</tr>
					</table>
				</form>


			</div>
		</div>
	</div>
</div>
	
</body>
</html>