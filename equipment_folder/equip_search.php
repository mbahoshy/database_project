<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/customer_search.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/style.php'	/>
	<title>Customer Search</title>
</head>

<body>

	<?php
		/*start session and connect to the database */
		session_start();				
						
		@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

		if (mysqli_connect_errno()) {
		 echo 'Error: Could not connect to database.  Please try again later.';
		 exit;
		}
		
		
		$page = 'equipment';
		$_SESSION['page'] = $page;
					
		if (isset($_GET['subnav'])) {
				$subnav = $_GET['subnav'];
				$_SESSION['subnav'] = $subnav;
			} else if (isset($_SESSION['subnav'])) {
				$subnav = $_SESSION['subnav'];
			} else {
				$subnav = 'Open';
			}
	
	
	
	?>
<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>

	<?php include("../php/header.php"); ?>

	<div class='maindisplay'>
		<div class='jobhead'>
			<h1><?php echo $subnav; ?> Inventory</h1>
		</div>
		<div class='subnav'>
			<ul>
				<a href='equip_search.php?subnav=Open'><li <?php if ($subnav=='Open') {echo "class='active'";} ?> >Open</li></a>
				<a href='equip_search.php?subnav=Ordered'><li <?php if ($subnav=='Ordered') {echo "class='active'";} ?> >Ordered</li></a>
				<a href='equip_search.php?subnav=Received'><li <?php if ($subnav=='Received') {echo "class='active'";} ?> >Recieved</li></a>
				<a href='equip_search.php?subnav=Installed'><li <?php if ($subnav=='Installed') {echo "class='active'";} ?> >Installed</li></a>
				<a href=''><li>All</li></a>
			</ul>
		</div>

		<div class='content'>
			<div class='searcharea'>
				<?php
				if (isset($_POST['equips'])) {
					$equips = $_POST['equips'];
					$equipstatus = $_POST['equipstatus'];
				
					$num_checks = count($equips);

					
					for ($i=0; $i <$num_checks; $i++) {
						$equipid = $equips[$i];
						
						$equipquery = "update equipment set equipstatus = '".$equipstatus."' where equipid = ".$equipid;
						$equipresult = $db->query($equipquery);
						if ($equipresult) {
							echo "<h3 class = 'green'>".$db->affected_rows." equipment updated in database.</h3>";
						} else {
							echo "<h3 class = 'red'> An error has occured.</h3>";
						}
					}
				}
				
				?>
				<form action="equipment_search_results.php" method="post">
					<p>
						<b>Choose Search Type:</b>
						<select>	
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
				<?php
					
					
					$query = "select * from equipment where equipstatus = '".$subnav."'";
					$result = $db->query($query);

					$num_results = $result->num_rows;
				?>
				
				<form action='equip_search.php' method='post'>
				
				Mark selected as:
				<select name='equipstatus'>
					<option <?php if ($subnav=='Open') {echo "selected='selected'";} ?> value='Open'>Open</option>
					<option <?php if ($subnav=='Ordered') {echo "selected='selected'";} ?> value='Ordered'>Ordered</option>
					<option <?php if ($subnav=='Received') {echo "selected='selected'";} ?> value='Received'>Received</option>
					<option <?php if ($subnav=='Installed') {echo "selected='selected'";} ?> value='Installed'>Installed</option>
					<option <?php if ($subnav=='Removed') {echo "selected='selected'";} ?> value='Removed'>Removed</option>
				</select>
				<input class='margin-left' type='submit' value='Update'>
				<?php
						echo "<table class='results'>";
								echo "<tr>";
								echo "<th>Status:</th> <th>Job Name</th> <th>Type</th> <th>Model #</th> <th>Serial #</th> <th>Supplier</th> <th>PO #</th> </tr>";
						
								for ($i=0; $i <$num_results; $i++) {
									$row = $result->fetch_assoc();
									$jobid = $row['jobid'];
									$custid = $row['customerid'];
									$jobquery = "select * from jobs where jobid =".$jobid;
									$jobresult = $db->query($jobquery);
									$jobrow = $jobresult->fetch_assoc();
									$custquery = "select * from customers where customerid =".$custid;
									$custresult = $db->query($custquery);
									$custrow = $custresult->fetch_assoc();
									
									if (($i+1)&1){
										echo "<tr class='grey'>";
									} else {
										echo "<tr class='white'>";
									}
											echo "<td><input name='equips[]' type='checkbox' value='".$row['equipid']."'>".stripslashes($row['equipstatus'])."</td>";
											
											echo "<td><a href='/job_folder/display_job.php?jobid=".$jobrow['jobid']."'>".stripslashes($custrow['namelast']).", ".stripslashes($custrow['namefirst'])." - <i>".stripslashes($jobrow['jobname'])."</i></a></td>";
											
											echo "<td>".stripslashes($row['equiptype'])."</td>";

											echo "<td>".stripslashes($row['model'])."</td>";

											echo "<td>".stripslashes($row['serial'])."</td>";
											
											echo "<td>".stripslashes($row['supplier'])."</td>";
											
											echo "<td>".stripslashes($row['po'])."</td>";
											
											echo "<td><a href='equip_update.php?equipid=".$row['equipid']."'>Edit</a></td>";

										echo "</tr>";

								}
						
						echo "</table>";
						
					  ?>			
				</form>


			</div>
		</div>  
	</div>
</div>
</body>
</html>