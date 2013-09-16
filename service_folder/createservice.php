<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/style.php?page=service'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>
	<title>Add Service</title>
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
	
	$custid = $_SESSION['custid'];
				$query = "select * from customers where customerid = ".$custid;
				$result = $db->query($query);
				
				if (!$result) {
					echo "An error has occured.";
				}
				

				$row = $result->fetch_assoc();
				$namelast = stripslashes($row['namelast']);
				$namefirst = stripslashes($row['namefirst']);
				$city = stripslashes($row['city']);
				$address = stripslashes($row['address']);
				$zip = stripslashes($row['zip']);
				$phone = stripslashes($row['phone']);
				$cstate = stripslashes($row['cstate']);

?>
<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>
			<ul class='nav'>
				<li><a href='/index.html'>Home</a></li>
				<li><a href='/customer_folder/customer_search.php'>Customers</a></li>
				<li><a href='/job_folder/job_search.php'>Jobs</a></li>
				<li><a href='/equipment_folder/equip_search.php'>Inventory</a></li>
				<li><a id='navactive' href='/service_folder/service_search.php'>Service</a></li>
			</ul>
	<div class='maindisplay'>
		<div class='jobhead'>
			<h1>New Service</h1>
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
							<td>First name</td>
							<td><input type="text" name="snamefirst" maxlength="20" value="<?php echo $namefirst; ?>"size="13"></td>
						</tr>
						<tr>
							<td>Last name</td>
							<td><input type="text" name="snamelast" maxlength="20" value="<?php echo $namelast; ?>"size="13"></td>
						</tr>
						<tr>
							<td>Address</td>
							<td><input type="text" name="saddress" maxlength="20" value="<?php echo $address; ?>"size="13"></td>
						</tr>
						<tr>
							<td>City</td>
							<td><input type="text" name="scity" maxlength="20" value="<?php echo $city; ?>"size="13"></td>
						</tr>
						<tr>
							<td>State</td>
							<td><input type="text" name="sstate" maxlength="2" value="<?php echo $cstate; ?>"size="13"></td>
						</tr>
						<tr>
							<td>Zip</td>
							<td><input type="text" name="szip" maxlength="20" value="<?php echo $zip; ?>"size="13"></td>
						</tr>
						<tr>
							<td>Phone</td>
							<td><input type="text" name="sphone" maxlength="20" value="<?php echo $phone; ?>"size="13"></td>
						</tr>
						<tr>
							<td>Description</td>
							<td><textarea class='txtinput' type="text" name="sdescription"></textarea></td>
						</tr>
						<tr>
							<td>Assigned to</td>
							<td><select name='assignedto'>
								<option type='radio' name='assignedto' value='Jacob'>Jacob</option>
								<option type='radio' name='assignedto' value='Patty'>Josh</option>
								<option type='radio' name='assignedto' value='Phil'>Phil</option>
						</select></td>
						</tr>
						<tr>
							<td>Created by</td>
							<td><select name='createdby'>
								<option type='radio' name='createdby' value='Tom'>Tom</option>
								<option type='radio' name='createdby' value='Patty'>Patty</option>
								<option type='radio' name='createdby' value='Joe'>Joe</option>
								<option type='radio' name='createdby' value='Matt'>Matt</option>
								<option type='radio' name='createdby' value='Carmen'>Carmen</option>
								<option type='radio' name='createdby' value='Sarah'>Sarah</option>
						</select></td>
						</tr>
						<tr>
							<td>Status</td>
							<td><select name='servicestatus'>
								<option type='radio' name='servicestatus' value='Open'>Open</option>
								<option type='radio' name='servicestatus' value='Scheduled'>Scheduled</option>
								<option type='radio' name='servicestatus' value='Completed'>Completed</option>
								<option type='radio' name='servicestatus' value='Billed'>Billed</option>
								<option type='radio' name='servicestatus' value='Collected'>Collected</option>
								<option type='radio' name='servicestatus' value='Cancelled'>Cancelled</option>
						</select></td>
						</tr>
						<tr>
							<td>Schedule</td>
							<td><input type='date' name='assigneddate'	/></td>
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
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						