<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/style.php?page=jobs'	/>

</head>
<body>

		<?php
		/*start session and connect to database */
			session_start();

			@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
				exit;
			}

			if (isset($_GET['jobid'])) {
			
				$jobid = $_GET['jobid'];
				$_SESSION['jobid'] = $jobid;
			} else {
				$jobid = $_SESSION['jobid'];
			}
			
		/* get job info and assign variables */
			
			$query = "select * from jobs where jobid = ".$jobid;
			$result = $db->query($query);
			

			
			if (!$result) {
				echo "An error has occured.";
			}
			
			
			$row = $result->fetch_assoc();
			$jobid = stripslashes($row['jobid']);
			$custid = stripslashes($row['customerid']);
			$jobname = stripslashes($row['jobname']);
			$jobcity = stripslashes($row['jobcity']);
			$jobdescription = stripslashes($row['jobdescription']);
			$jobaddress = stripslashes($row['jobaddress']);
			$created = stripslashes($row['stamp_created']);
			$jobtype = stripslashes($row['jobtype']);
			

		/*get cust info and assign variables */

			$custquery = "select * from customers where customerid = ".$custid;
			$custresult = $db->query($custquery);
			

			$custrow = $custresult->fetch_assoc();
			$custid = $custrow['customerid'];
			$namelast = stripslashes($custrow['namelast']);
			$namefirst = stripslashes($custrow['namefirst']);
			$city = stripslashes($custrow['city']);
			$address = stripslashes($custrow['address']);
			$zip = stripslashes($custrow['zip']);
			$phone = stripslashes($custrow['phone']);
			$email = stripslashes($custrow['email']);
			
			
			$_SESSION['custid'] = $custid;

		/*check to see if equipment was added */
		

		?>

<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>
	

		<ul class='nav'>
			<li><a href='/index.html'>Home</a></li>
			<li><a href='/customer_folder/customer_search.php'>Customers</a></li>
			<li><a id='navactive' href='job_search.php'>Jobs</a></li>
			<li><a href='/equipment_folder/equip_search.php'>Inventory</a></li>
			<li><a href='/service_folder/service_search.php'>Service</a></li>
		</ul>

	
	<div class='maindisplay'>
		<div class='jobhead'>
			<h1><?php echo $jobname; ?> &#91; <?php echo $namelast.", ".$namefirst;?> &#93;<span><?php echo "#J".str_pad($jobid, 6, '0', STR_PAD_LEFT); ?></span></h1>
		</div>
		<div class='subnav'>
			<ul>
				<li><a href=''>Home</a></li>
				<li><a href=''>Tasks</a></li>
				<li><a href=''>Quote</a></li>
				<li><a href=''>Trim</a></li>
				<li><a href=''>Equipment</a></li>
				<li><a href='display_job_pictures.php'>Pictures</a></li>
			</ul>
		</div>
		<div class="content">
			<div class='maps'>
				<iframe width="400" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?q=1919+broadview+n+wenatchee+wa&amp;ie=UTF8&amp;hq=&amp;hnear=1919+Broadview+N,+Wenatchee,+Chelan,+Washington+98801&amp;gl=us&amp;t=m&amp;z=14&amp;ll=47.452997,-120.35266&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?q=1919+broadview+n+wenatchee+wa&amp;ie=UTF8&amp;hq=&amp;hnear=1919+Broadview+N,+Wenatchee,+Chelan,+Washington+98801&amp;gl=us&amp;t=m&amp;z=14&amp;ll=47.452997,-120.35266&amp;source=embed" style="color:#0000FF;text-align:left">View Larger Map</a></small>
				<?php
					if (isset($_POST['equiptype'])) {
				
						// create short variable names
						$equiptype = $_POST['equiptype'];
						$model = $_POST['model'];
						$serial = $_POST['serial'];
						$supplier = $_POST['supplier'];
						$equipstatus = $_POST['equipstatus'];
						$po = $_POST['po'];
					
						if (!equiptype || !model || !serial) {
						echo "You have not entered all the required details.<br	/>";
						exit;
						}
				
						if (!get_magic_quotes_gpc()) {
							$model = addslashes($model);
							$serial = addslashes($serial);
							}
					
						$query = "insert into equipment values (NULL, ".$custid.", '".$jobid."', '".$equiptype."', '".$model."', '".$serial."', '".$supplier."', '".$equipstatus."', '".$po."', NULL)";
				
						$result = $db->query($query);
						
						if ($result) {
							echo "<h3 class='green'>".$db->affected_rows." equipment inserted into database.</h3>";
						} else {
							echo "<h3 class='red'>An error has occured.</h3>";
						}
					}
				?>
			</div>
			<div class='details'>
				<table class='noborder'>
					<tr>
						<td><b>Contact:</b></td>
						<td><?php echo $namefirst." ".$namelast; ?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $phone; ?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $email; ?></td>
					</tr>
				</table>
				<br	/>
				<table class='noborder'>
					<tr>
						<td><b>Job Address:</b></td>
						<td><?php echo $jobaddress; ?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $jobcity/*.", ".$jobstate." ".$jobzip*/; ?></td>
					</tr>
				</table>
				<br	/>
				<table class='noborder'>
					<tr>
						<td><b>Job Type:</b></td>
						<td><?php echo $jobtype;	?></td>
					</tr>
				</table>
				<br	/>
				<table class='noborder'>
					<tr>
						<td><b>Job Status:</b></td>
						<td>Open <?php /* echo $jobstatus; */ ?></td>
					</tr>
				</table>
				<br	/>
				<table class='noborder'>
					<tr>
						<td><b>Description:</b></td>
						<td><?php echo $jobdescription; ?></td>
					</tr>
				</table>
				<a href='/equipment_folder/addequip.php'><div class='button'>Add Equipment</div></a>
				<a href='/upload_folder/upload_file.php'><div class='button'>Upload File</div></a>
			</div>
			
			<div class='clear'>
			</div>
			
			<div class='divider'>
			</div>
			<div class='content_full'>
				<?php
					$equipquery = "select * from equipment where customerid = '".$custid."'";
					$equipresult = $db->query($equipquery);

					$num_equip = $equipresult->num_rows;
					
					echo "<table class='sub_results'>";
								echo "<tr>";
								echo "<th>Status:</th> <th>Inventory #</th> <th>Type</th> <th>Model #</th> <th>Serial #</th> <th>Supplier</th> <th>PO #</th> </tr>";
						
								for ($i=0; $i <$num_equip; $i++) {
									$row = $equipresult->fetch_assoc();
																	
									
									if (($i+1)&1){
										echo "<tr class='grey'>";
									} else {
										echo "<tr class='white'>";
									}
											echo "<td><input name='equips[]' type='checkbox' value='".$row['equipid']."'>".stripslashes($row['equipstatus'])."</td>";
											
											echo "<td>"."#I".str_pad($row['equipid'], 6, '0', STR_PAD_LEFT)."</td>";
											
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
			</div>
			<div class='content_full'>
				<h2>Notes:<a href='/note_folder/addnote.php'>add note</a> <a href='/task_folder/addtask.php'>add task</a></h2>
		
				<?php	
					
					$notequery = "select * from notes where jobid = ".$jobid;
					$noteresult = $db->query($notequery);

					
					$num_rows = $noteresult->num_rows;
					

					for ($i=0; $i < $num_rows; $i++) {	
						$noterow = $noteresult->fetch_assoc();
								
									echo "<div class='notebox fleft'>";
									echo "<div class='notecontainer'>";
										echo "<div class='notehead'>";
									
											echo "<p><b>".stripslashes($noterow['notename'])."</b><i>".stripslashes($noterow['stampcreated'])."</i></p>";
										
										echo "</div>";
										echo "<div class='notebody'>";
											echo "<p>".stripslashes($noterow['note_text'])."</p>";
										echo "</div>";
										
										echo "<div class='notefoot'>";
											echo "<p>Created by: ".stripslashes($noterow['notecreator'])."<a href='/note_folder/delete_note.php?noteid=".$noterow['noteid']."'>Delete Note</a></p>";
										
										echo "</div>";

									echo "</div></div>";
									
									
									
									
									/*if (!($i+1)&1){
										echo "<div class='clear'></div>";
									} */
						}

				?>
			</div>
		</div>
	</div>
</div>
</body>
</html>