<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/customer_search.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/style.php?page=equipment'	/>
	<title>Equipment Update</title>
</head>

<body>
<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>
			<ul class='nav'>
				<li><a href='/index.html'>Home</a></li>
				<li><a href='/customer_folder/customer_search.php'>Customers</a></li>
				<li><a href='/job_folder/job_search.php'>Jobs</a></li>
				<li><a id='navactive' href='/equipment_folder/equip_search.php'>Inventory</a></li>
				<li><a href='/service_folder/service_search.php'>Service</a></li>
			</ul>
	<div class='maindisplay'>
		<div class='jobhead'>
			<h1>Update Equipment</h1>
		</div>
		<div class='subnav'>
			<ul>
				<a href='equip_search.php'><li>Cancel</li></a>	
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
				
				$equipid = $_GET['equipid'];
				
				$query = "select * from equipment where equipid = ".$equipid;
				$result = $db->query($query);
				
				$row = $result->fetch_assoc();
				$equiptype = $row['equiptype'];
				$model = $row['model'];
				$serial = $row['serial'];
				$supplier = stripslashes($row['supplier']);
				$equipstatus = $row['equipstatus'];
				$po = $row['po'];
				
				?>
		
					<form action="equip_update_result.php" method="post">
						<table class='noborder'>
							<tr>
								<td>Equipment Type</td>
								<td><select name="equiptype">
										<option <?php if ($equiptype == 'Indoor Unit') {echo "selected='selected'";} ?> value="Indoor Unit">Indoor Unit</option>
										<option <?php if ($equiptype == 'Strip Heat') {echo "selected='selected'";} ?> value="Strip Heat">Strip Heat</option>
										<option <?php if ($equiptype == 'Outdoor Unit') {echo "selected='selected'";} ?> value="Outdoor Unit">Outdoor Unit</option>
										<option <?php if ($equiptype == 'T-stat') {echo "selected='selected'";} ?> value="T-stat">Tstat</option>
										<option <?php if ($equiptype == 'Zoning') {echo "selected='selected'";} ?> value="Zoning">Zoning</option>
										<option <?php if ($equiptype == 'Humidifier') {echo "selected='selected'";} ?> value="Humidifier">Humidifier</option>
										<option <?php if ($equiptype == 'EAC') {echo "selected='selected'";} ?> value="EAC">EAC</option>
										<option <?php if ($equiptype == 'Other') {echo "selected='selected'";} ?> value="Other">Other</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Model #</td>
								<td><input type="text" name="model" maxlength="30" size="13" value="<?php echo $model;	?>"></td>
							</tr>
							<tr>
								<td>Serial #</td>
								<td><input type="text" name="serial" maxlength="30" size="13" value="<?php echo $serial;	?>"></td>
							</tr>
							<tr>
								<td>Ordered From</td>
								<td><select name="supplier">
										<option <?php if ($supplier == 'Airefco') {echo "selected='selected'";} ?> value="Airefco">Airefco</option>
										<option <?php if ($supplier == 'Jensco') {echo "selected='selected'";} ?> value="Jensco">Jensco</option>
										<option <?php if ($supplier == 'Thrifty') {echo "selected='selected'";} ?> value="Thrifty">Thrifty</option>
										<option <?php if ($supplier == 'Norco') {echo "selected='selected'";} ?> value="Norco">Norco</option>
										<option <?php if ($supplier == 'Other') {echo "selected='selected'";} ?> value="Other">Other</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>PO #</td>
								<td><input type="text" name="po" maxlength="30" size="13" value="<?php echo $po; ?>"></td>
							</tr>
							<tr>
								<td>Status</td>
								<td><select name="equipstatus">
										<option <?php if ($equipstatus == 'Open') {echo "selected='selected'";} ?> value="Open">Open</option>
										<option <?php if ($equipstatus == 'Ordered') {echo "selected='selected'";} ?> value="Ordered">Ordered</option>
										<option <?php if ($equipstatus == 'Received') {echo "selected='selected'";} ?> value="Received">Received</option>
										<option <?php if ($equipstatus == 'Installed') {echo "selected='selected'";} ?> value="Installed">Installed</option>
										<option <?php if ($equipstatus == 'Removed') {echo "selected='selected'";} ?> value="Removed">Removed</option>
									</select>
								</td>
							</tr>
							<tr>			
								<input type='hidden' name='equipid' value='<?php echo $equipid;	?>'>
								<td colspan="2"><input type="submit" value="Update"></td>
							</tr>
						</table>
					</form>		
		
			</div>
		</div>
	</div>
</div>
</body>
</html>