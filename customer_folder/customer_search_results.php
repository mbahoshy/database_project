<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/style.php'	/>
  <title>Customer Search Results</title>
</head>
<body>
<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>
			<ul class='nav'>
				<li><a href='/index.html'>Home</a></li>
				<li><a href='customer_search.php'>Customers</a></li>
				<li><a href='/jobfolder/job_search.php'>Jobs</a></li>
				<li><a href='/equipment_folder/equip_search.php'>Inventory</a></li>
				<li><a href='contact.htm'>Service</a></li>
			</ul>
	<div class='maindisplay'>
		<div class='jobhead'>
			<h1>Customer Search Resuults</h1>
		</div>
		<div class='subnav'>
			<ul>
				<li><a href='customer_search.php'>Back</a></li>
			</ul>
		</div>
		<div class='content'>
			<div class='content_full'>
				<?php
				  // create short variable names
				  $searchtype=$_POST['searchtype'];
				  $searchterm=trim($_POST['searchterm']);

				  if (!$searchtype || !$searchterm) {
					 echo 'You have not entered search details.  Please go back and try again.';
					 exit;
				  }

				  if (!get_magic_quotes_gpc()){
					$searchtype = addslashes($searchtype);
					$searchterm = addslashes($searchterm);
				  }

				  @ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

				  if (mysqli_connect_errno()) {
					 echo 'Error: Could not connect to database.  Please try again later.';
					 exit;
				  }

				  $query = "select * from customers where ".$searchtype." like '%".$searchterm."%'";
				  $result = $db->query($query);

				  $num_results = $result->num_rows;

				  echo "<p>Number of customers found: ".$num_results."</p>";

				  
				  
				echo "<table class='results'>";
						echo "<tr>";
						echo "<th>Name:</th> <th>City</th> <th>Address</th> <th>Zip</th> <th>Phone</th> <th>Cust. ID</th></tr>";
				
						for ($i=0; $i <$num_results; $i++) {
							$row = $result->fetch_assoc();
							if (($i+1)&1){
								echo "<tr class='grey'>";
							} else {
								echo "<tr class='white'>";
							}
									echo "<td><a href='display_customer.php?custid=".$row['customerid']."'>".htmlspecialchars(stripslashes($row['namelast'])).", ".htmlspecialchars(stripslashes($row['namefirst']))."</a></td>";
									echo "<td>".stripslashes($row['city'])."</td>";

									echo "<td>".stripslashes($row['address'])."</td>";

									echo "<td>".stripslashes($row['zip'])."</td>";

									echo "<td>".stripslashes($row['phone'])."</td>";
									
									echo "<td>#C".str_pad($row['customerid'], 6, '0', STR_PAD_LEFT)."</td>";
									
								echo "</tr>";

						}
				
				echo "</table>";
				  
				  
				/*  for ($i=0; $i <$num_results; $i++) {
					 $row = $result->fetch_assoc();
					 echo "<p><strong>".($i+1).".</strong> Last name: ";
					 echo htmlspecialchars(stripslashes($row['namelast']));
					 echo "<br	/> First name: ";
					 echo htmlspecialchars(stripslashes($row['namefirst']));
					 echo "<br />City: ";
					 echo stripslashes($row['city']);
					 echo "<br />Address: ";
					 echo stripslashes($row['address']);
					 echo "<br />zip code: ";
					 echo stripslashes($row['zip']);
					 echo "<br />Phone: ";
					 echo stripslashes($row['phone']);
					
				  }

				  $result->free(); */
				  $db->close();

				?>
			</div>
		</div>
	</div>
</div>
</body>
</html>
