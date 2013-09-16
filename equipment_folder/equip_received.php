<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/customer_search.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>
	<title>Customer Search</title>
</head>

<body>
<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>
	
		<div id='navcontainer'>
			<ul class='nav'>
				<li><a id='home' href='/index.html'>Home</a></li>
				<li><a href='/customer_folder/customer_search.php'>Customers</a></li>
				<li><a href='/job_folder/job_search.php'>Jobs</a></li>
				<li><a href='equip_search.php'>Inventory</a></li>
				<li><a id='Tasks' href='contact.htm'>Tasks</a></li>
			</ul>
		</div>

	<div class='maindisplay'>
		<div class='jobhead'>
			<h1>Received Inventory</h1>
		</div>
		<div class='subnav'>
			<ul>
				<a href='equip_search.php'><li><b>Open</b></li></a>
				<a href='equip_ordered.php'><li><b>Ordered</b></li></a>
				<a href='equip_received.php'><li class='active'><b>Recieved</b></li></a>
				<a href='equip_installed.php'><li><b>Installed</b></li></a>
				<a href=''><li><b>All</b></li></a>
			</ul>
		</div>

		<div class='content'>
			<div class='searcharea'>
				<form action="equipment_search_results.php" method="post">
					
						<ul class='searchoptions'>
							<b>Choose Search Type:</b><br	/>
							<li><input type='radio' name='searchtype' value='namelast'>Name</input></li>
							<li><input type='radio' name='searchtype' value='address'>Address</input></li>
							<li><input type='radio' name='searchtype' value='city'>City</input></li>
							<li><input type='radio' name='searchtype' value='zip'>Zip</input></li>
							<li><input type='radio' name='searchtype' value='customertype'>Customer Type</input></li>
							<li><input type='radio' name='searchtype' value='customerid'>Customer ID</input></li>
						</ul>

					<b>Enter Search Term:</b><br	/>
					<input name="searchterm" type="text" size="40"/>
					<input type="submit" name="submit" value="Search"/>
				</form>
			</div>
			<div class='content_full'>
				<?php
					
					@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

					if (mysqli_connect_errno()) {
					 echo 'Error: Could not connect to database.  Please try again later.';
					 exit;
					}
					
					$query = "select * from equipment where equipstatus = 'Received'";
					$result = $db->query($query);

					$num_results = $result->num_rows;
					
					echo "<form action='update_equip.php' method='post'>";
						echo "Mark selected as: <select name='equipstatus'><option value='Open'>Open</option><option value='Ordered'>Ordered</option><option value='Received'>Received</option><option selected='selected' value='Installed'>Installed</option><option value='Removed'>Removed</option></select>";
						echo "<table class='results'>";
								echo "<tr>";
								echo "<th>Status:</th> <th>Job Name</th> <th>Type</th> <th>Model #</th> <th>Serial #</th> <th>Ordered From</th> <th>PO #</th> </tr>";
						
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
											
											echo "<td><a href='/job_folder/display_job.php?jobid=".$jobrow['jobid']."'>".stripslashes($custrow['namelast']).", ".stripslashes($custrow['namefirst'])." - ".stripslashes($jobrow['jobname'])."</a></td>";
											
											echo "<td>".stripslashes($row['equiptype'])."</td>";

											echo "<td>".stripslashes($row['model'])."</td>";

											echo "<td>".stripslashes($row['serial'])."</td>";
											
											echo "<td>".stripslashes($row['supplier'])."</td>";
											
											echo "<td>".stripslashes($row['po'])."</td>";
											
											echo "<td><a href='equip_update.php?equipid=".$row['equipid']."'>Edit</a></td>";

										echo "</tr>";

								}
						
						echo "</table>";
						echo "<tr><td colspan='2'><input type='submit' value='update'></td></tr>";
					echo "</form>";

				  ?>
			</div>
		</div>  
	</div>
</div>
</body>
</html>