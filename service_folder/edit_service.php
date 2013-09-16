<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/customer_search.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/style.php?page=service'	/>
	<title>Service Update</title>
</head>

<body>
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
			<h1>Update Service</h1>
		</div>
		<div class='subnav'>
			<ul>
				<a href='service_search.php'><li>Cancel</li></a>	
			</ul>
		</div>
		<div class='content'>
			<div class='content_full'>
		
				<?php
				
				session_start();
				
				@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

				if (mysqli_connect_errno()) {
				 echo 'Error: Could not connect to database.  Please try again later.';
				 exit;
				}
				
				$serviceid = $_GET['serviceid'];
				
				$query = "select * from service where serviceid = ".$serviceid;
				$result = $db->query($query);
				
				$row = $result->fetch_assoc();
				$snamefirst = $row['snamefirst'];
				$snamelast = $row['snamelast'];
				$saddress = $row['saddress'];
				$scity = $row['scity'];
				$sstate = stripslashes($row['sstate']);
				$szip = $row['szip'];
				$sphone = $row['sphone'];
				$sdescription = $row['sdescription'];
				$assignedto = $row['assignedto'];
				$createdby = $row['createdby'];
				$servicestatus = $row['servicestatus'];
				$assigneddate = $row['assigneddate'];
				
				?>
				
				
				<form action="/service_folder/edit_service_result.php?serviceid=<?php echo $serviceid;?>" method="post">
					<table class='noborder'>
						<tr>
							<td>First name</td>
							<td><input type="text" name="snamefirst" maxlength="20" value="<?php echo $snamefirst; ?>"size="13"></td>
						</tr>
						<tr>
							<td>Last name</td>
							<td><input type="text" name="snamelast" maxlength="20" value="<?php echo $snamelast; ?>"size="13"></td>
						</tr>
						<tr>
							<td>Address</td>
							<td><input type="text" name="saddress" maxlength="20" value="<?php echo $saddress; ?>"size="13"></td>
						</tr>
						<tr>
							<td>City</td>
							<td><input type="text" name="scity" maxlength="20" value="<?php echo $scity; ?>"size="13"></td>
						</tr>
						<tr>
							<td>State</td>
							<td><input type="text" name="sstate" maxlength="2" value="<?php echo $sstate; ?>"size="13"></td>
						</tr>
						<tr>
							<td>Zip</td>
							<td><input type="text" name="szip" maxlength="20" value="<?php echo $szip; ?>"size="13"></td>
						</tr>
						<tr>
							<td>Phone</td>
							<td><input type="text" name="sphone" maxlength="20" value="<?php echo $sphone; ?>"size="13"></td>
						</tr>
						<tr>
							<td>Description</td>
							<td><input class='txtinput' type="text" name="sdescription" maxlength="255" size="60" value='<?php echo $sdescription;?>'></td>
						</tr>
						<tr>
							<td>Assigned to</td>
							<td><select name='assignedto'>
								<option <?php if ($assignedto == 'Jacob') {echo "selected='selected'";} ?> type='radio' name='assignedto' value='Jacob'>Jacob</option>
								<option <?php if ($assignedto == 'Josh') {echo "selected='selected'";} ?> type='radio' name='assignedto' value='Josh'>Josh</option>
								<option <?php if ($assignedto == 'Phil') {echo "selected='selected'";} ?> type='radio' name='assignedto' value='Phil'>Phil</option>
						</select></td>
						</tr>
						<tr>
							<td>Created by</td>
							<td><select name='createdby'>
								<option <?php if ($createdby == 'Tom') {echo "selected='selected'";} ?> type='radio' name='createdby' value='Tom'>Tom</option>
								<option <?php if ($createdby == 'Patty') {echo "selected='selected'";} ?> type='radio' name='createdby' value='Patty'>Patty</option>
								<option <?php if ($createdby == 'Joe') {echo "selected='selected'";} ?> type='radio' name='createdby' value='Joe'>Joe</option>
								<option <?php if ($createdby == 'Matt') {echo "selected='selected'";} ?> type='radio' name='createdby' value='Matt'>Matt</option>
								<option <?php if ($createdby == 'Carmen') {echo "selected='selected'";} ?> type='radio' name='createdby' value='Carmen'>Carmen</option>
								<option <?php if ($createdby == 'Sarah') {echo "selected='selected'";} ?> type='radio' name='createdby' value='Sarah'>Sarah</option>
						</select></td>
						</tr>
						<tr>
							<td>Status</td>
							<td><select name='servicestatus'>
								<option <?php if ($servicestatus == 'Open') {echo "selected='selected'";} ?> type='radio' name='servicestatus' value='Open'>Open</option>
								<option <?php if ($servicestatus == 'Scheduled') {echo "selected='selected'";} ?> type='radio' name='servicestatus' value='Scheduled'>Scheduled</option>
								<option <?php if ($servicestatus == 'Completed') {echo "selected='selected'";} ?> type='radio' name='servicestatus' value='Completed'>Completed</option>
								<option <?php if ($servicestatus == 'Billed') {echo "selected='selected'";} ?> type='radio' name='servicestatus' value='Billed'>Billed</option>
								<option <?php if ($servicestatus == 'Collected') {echo "selected='selected'";} ?> type='radio' name='servicestatus' value='Collected'>Collected</option>
								<option <?php if ($servicestatus == 'Cancelled') {echo "selected='selected'";} ?> type='radio' name='servicestatus' value='Cancelled'>Cancelled</option>
						</select></td>
						</tr>
						<tr>
							<td>Schedule</td>
							<td><input type='date' name='assigneddate'	value='<?php echo $assigneddate;?>'/></td>
						</tr>
						</table>
						<td colspan="2"><input type="submit" value="Update"></td>
					</form>		
		
			</div>
		</div>
	</div>
</div>
</body>
</html>
				
				
				
				
				
				
				