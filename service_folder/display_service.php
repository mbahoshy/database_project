<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/style.php'	/>

</head>
<body>

		<?php
		//start session and connect to database
			session_start();

			@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
				exit;
			}

			if (isset($_GET['serviceid'])) {
			
				$serviceid = $_GET['serviceid'];
				$_SESSION['serviceid'] = $serviceid;
			} else {
				$serviceid = $_SESSION['serviceid'];
			}
			
		 //get job info and assign variables
			
			$query = "select * from service where serviceid = ".$serviceid;
			$result = $db->query($query);
			

			
			if (!$result) {
				echo "An error has occured.";
			}
			
			
			$row = $result->fetch_assoc();
			$serviceid = $row['serviceid'];
			$custid = stripslashes($row['customerid']);
			$snamefirst = stripslashes($row['snamefirst']);
			$snamelast = stripslashes($row['snamelast']);
			$createdby = stripslashes($row['createdby']);
			$assignedto = stripslashes($row['assignedto']);
			$sdescription = stripslashes($row['sdescription']);
			$saddress = stripslashes($row['saddress']);
			$scity = stripslashes($row['scity']);
			$sstate = stripslashes($row['sstate']);
			$szip = stripslashes($row['szip']);
			$sphone = stripslashes($row['sphone']);
			
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
			<h1>&#91; <?php echo $snamelast.", ".$snamefirst;?> &#93;<span><?php echo "#S".str_pad($serviceid, 6, '0', STR_PAD_LEFT); ?></span></h1>
		</div>
		<div class='subnav'>
			<ul>
				<li><a href=''>Home</a></li>
				<li><a href=''>Service Ticket</a></li>
				<li><a href=''>Pictures</a></li>
			</ul>
		</div>
		<div class="content">
			<div class='maps'>
				<iframe width="400" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?q=1919+broadview+n+wenatchee+wa&amp;ie=UTF8&amp;hq=&amp;hnear=1919+Broadview+N,+Wenatchee,+Chelan,+Washington+98801&amp;gl=us&amp;t=m&amp;z=14&amp;ll=47.452997,-120.35266&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?q=1919+broadview+n+wenatchee+wa&amp;ie=UTF8&amp;hq=&amp;hnear=1919+Broadview+N,+Wenatchee,+Chelan,+Washington+98801&amp;gl=us&amp;t=m&amp;z=14&amp;ll=47.452997,-120.35266&amp;source=embed" style="color:#0000FF;text-align:left">View Larger Map</a></small>
			
			</div>
			<div class='details'>
				<a href='/service_folder/add_service.php'><div class='button fright'>+ Create Service Ticket</div></a>
				<table class='noborder'>
					<tr>
						<td><b>Contact:</b></td>
						<td><a href='/customer_folder/display_customer.php?custid=<?php echo $custid;?>'><?php echo $snamefirst." ".$snamelast; ?></a></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $sphone; ?></td>
					</tr>
				</table>
				<br	/>
				<table class='noborder'>
					<tr>
						<td><b>Address:</b></td>
						<td><?php echo $saddress; ?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $scity.", ".$sstate." ".$szip; ?></td>
					</tr>
				</table>
				<br	/>
				<table class='noborder'>
					<tr>
						<td><b>Assigned to:</b></td>
						<td><?php echo $assignedto;	?></td>
					</tr>
				</table>
				<br	/>
				<table class='noborder'>
					<tr>
						<td><b>Created by:</b></td>
						<td><?php  echo $createdby;  ?></td>
					</tr>
				</table>
				<br	/>
				<table class='noborder'>
					<tr>
						<td><b>Description:</b></td>
						<td><?php echo $sdescription; ?></td>
					</tr>
				</table>
				<a href='edit_service.php?serviceid=<?php echo $serviceid;?>'>Edit Service</a>
			</div>
			
			<div class='clear'>
			</div>
			
			<div class='divider'>
			</div>
			
			<div class='content_full'>
				<h2>Notes:<a href='/note_folder/addnote.php'>add note</a> <a href='/task_folder/addtask.php'>add task</a></h2>
		
				<?php/*	
					
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
						}
				*/
				?>
			</div>
		</div>
	</div>
</div>
</body>
</html>

			
				