<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/customer_search.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/style.php'	/>
	<title>Service Search</title>
</head>

<body>
		<?php
			/*start session and connect to the database */
			include("../php/functions.php");
			
			session_start();

			@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

			if (mysqli_connect_errno()) {
			 echo 'Error: Could not connect to database.  Please try again later.';
			 exit;
			}
			
			
			$page = 'service';
			$_SESSION['page'] = $page;
			
			$subnav_service = subnav_active ($_GET, $page, 'Open');
			
			$orderby = order_by($_GET, 'snamelast');
			

		?>

<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>
	
	<?php include("../php/header.php"); ?>

	<div class='maindisplay'>
		<div class='jobhead'>
			<h1>Search Service</h1>
		</div>
		<div class='subnav'>
			<ul>
				<a href='service_search.php?subnav_service=Open'><li <?php if ($subnav_service=='Open') {echo "class='active'";} ?>>Open</li></a>
				<a href='service_search.php?subnav_service=Scheduled'><li <?php if ($subnav_service=='Scheduled') {echo "class='active'";} ?>>Scheduled</li></a>
				<a href='service_search.php?subnav_service=Completed'><li <?php if ($subnav_service=='Completed') {echo "class='active'";} ?>>Completed</li></a>
				<a href='service_search.php?subnav_service=Billed'><li <?php if ($subnav_service=='Billed') {echo "class='active'";} ?>>Billed</li></a>
				<a href='service_search.php?subnav_service=Collected'><li <?php if ($subnav_service=='Collected') {echo "class='active'";} ?>>Collected</li></a>
				<a href='service_search.php?subnav_service=Cancelled'><li <?php if ($subnav_service=='Cancelled') {echo "class='active'";} ?>>Cancelled</li></a>
				<a href='service_search.php?subnav_service=All'><li <?php if ($subnav_service=='All') {echo "class='active'";} ?>>All</li></a>
			</ul>
		</div>
		<div class='content'>
			<div class='searcharea'>
				<?php
					if (isset($_POST['sstatus'])) {
						$sstatus = $_POST['sstatus'];
						$servicestatus = $_POST['servicestatus'];
					
						$num_checks = count($sstatus);

						
						for ($i=0; $i <$num_checks; $i++) {
							$serviceid = $sstatus[$i];
							
							$servquery = "update service set servicestatus = '".$servicestatus."' where serviceid = ".$serviceid;
							$servresult = $db->query($servquery);
							if ($servresult) {
								echo "<h3 class = 'green'>".$db->affected_rows." service updated in database.</h3>";
							} else {
								echo "<h3 class = 'red'> An error has occured.</h3>";
							}
						}
				}
				
				?>
				<form action="customer_search_results.php" method="post">
						
						<p><b>Choose Search Type:</b>
						<select name='searchtype'>
							<option type='radio' name='searchtype' value='namelast'>Name</option>
							<option type='radio' name='searchtype' value='address'>Address</option>
							<option type='radio' name='searchtype' value='city'>City</option>
							<option type='radio' name='searchtype' value='zip'>Zip</option>
							<option type='radio' name='searchtype' value='customertype'>Customer Type</option>
							<option type='radio' name='searchtype' value='customerid'>Customer ID</option>
						</select>
						</p>
						<p>
						<b>Enter Search Term:</b>
						<input name="searchterm" type="text" size="40"/>

						<input type="submit" name="submit" value="Search"/>
						</p>

						
				</form>
			</div>
			<div class='content_full'>
						
				<form action='service_search.php' method='post'>
				
				Mark selected as:
				<select name='servicestatus'>
					<option <?php if ($subnav_service=='Open') {echo "selected='selected'";} ?> value='Open'>Open</option>
					<option <?php if ($subnav_service=='Scheduled') {echo "selected='selected'";} ?> value='Scheduled'>Scheduled</option>
					<option <?php if ($subnav_service=='Completed') {echo "selected='selected'";} ?> value='Completed'>Completed</option>
					<option <?php if ($subnav_service=='Billed') {echo "selected='selected'";} ?> value='Billed'>Billed</option>
					<option <?php if ($subnav_service=='Collected') {echo "selected='selected'";} ?> value='Collected'>Collected</option>
					<option <?php if ($subnav_service=='Cancelled') {echo "selected='selected'";} ?> value='Cancelled'>Cancelled</option>

				</select>				
				<input class='margin-left' type='submit' value='Update'>
					<?php
					
					service_search('servicestatus', $subnav_service, $orderby);
					
					?>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
