<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>	
	<link rel='stylesheet' type='text/css' href='/css/customer_search.css'	/>	
	<link rel='stylesheet' type='text/css' href='/css/style.php?page=customers'	/>	
</head>
<body>
		<?php
			include("../php/functions.php");
			session_start();
				
				$page = $_SESSION['page'];
				
				@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

				if(mysqli_connect_errno()) {
					echo "Error: Could not connect to database.";
					exit;
				}
				
				if (isset($_GET['custid'])) {
				
					$custid = $_GET['custid'];
					$_SESSION['custid'] = $custid;
				} else {
					$custid = $_SESSION['custid'];
				}
				
				$customer_info = get_customer_info ($custid);
		?>
<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>
	
	<div id='navcontainer'>
		<?php include("../php/header.php"); ?>
	</div>

	<div class='maindisplay'>

		<div class='jobhead'>
			<h1>&#91; <?php echo $customer_info['namelast'].", ".$customer_info['namefirst']; ?> &#93; <span><?php echo "#C".str_pad($custid, 6, '0', STR_PAD_LEFT); ?></span></h1>
		</div>
		<div class='subnav'>
			<ul>
				<li><a href=''>Home</a></li>
				<li><a href=''>Service</a></li>
				<li><a href=''>Jobs</a></li>
				<li><a href=''>Equipment</a></li>
				<li><a href=''>Update</a></li>
			</ul>
		</div>
		<div class='content'>
			<div class='content_full'>
		
					<table class='customer_info_table noborder fleft'>
						<tr>
							<td><b>Customer:</b></td>
							<td><?php echo $customer_info['namefirst']." ".$customer_info['namelast']; ?></td>
						</tr>
						<tr>
							<td><b>Address:</b></td>
							<td><?php echo $customer_info['address']; ?></td>
						</tr>
						<tr>
							<td></td>
							<td><?php echo $customer_info['city'].", ".$customer_info['cstate']." ".$customer_info['zip']; ?></td>
						</tr>
					</table>
					<table class='customer_info_table noborder fleft padleft'>
						<tr>
							<td><b>Contact:</b></td>
							<td><?php echo $customer_info['phone']; ?></td>
						</tr>
						<tr>
							<td></td>
							<td><?php echo $customer_info['email']; ?></td>
						</tr>
						<tr>
							<td><b>Type:</b></td>
							<td><?php echo $customer_info['customertype'];?></td>
						</tr>
					</table>
					 <a href='/job_folder/addjob.php'><div class='button fright'>+ Create Job</div></a>
					<a href='/service_folder/createservice.php'><div class='clear button fright'>+ Add Service</div></a>
					<div class='clear'></div>
					<div class='fleft'>
						<?php
							
						if (isset($_POST['jobdescription'])) {
							addjob($_POST, $custid);	
						}	
													
						
						if (isset($_POST['createdby'])) {
					
							addservice ($_POST, $custid);
						
						}
						?>
					</div>
					<div class='divider fleft'>
					</div>
						
					<?php					
					service_search('customerid', $custid);
/*					
					
					
					//query database and assign job variables
						$jobquery = "select * from jobs where customerid = ".$custid;
						$jobresult = $db->query($jobquery);
						$num_jobs = $jobresult->num_rows;
													
							echo "<table class ='sub_results'>";
									echo "<tr>";
									echo "<th>Job Name:</th> <th>Job Address</th> <th>Job ID</th> <th>Job Type</th> <th>Date Created</th> </tr>";
							
									for ($i=0; $i <$num_jobs; $i++) {
										$jobrow = $jobresult->fetch_assoc();
										if (($i+1)&1){
											echo "<tr class='grey'>";
										} else {
											echo "<tr class='white'>";
										}
												echo "<td><a href='/job_folder/display_job.php?jobid=".$jobrow['jobid']."'>".stripslashes($jobrow['jobname'])."</a></td>";
												echo "<td>".stripslashes($jobrow['jobaddress'])."</td>";

												echo "<td>#J".str_pad($jobrow['jobid'], 6, '0', STR_PAD_LEFT)."</td>";

												echo "<td>".stripslashes($jobrow['jobtype'])."</td>";

												echo "<td>".stripslashes($jobrow['stamp_created'])."</td>";
											echo "</tr>";

									}
							
							echo "</table>";




*/
					?>

				<p><a href="/job_folder/addjob.php">Create job</a></p>
			</div>
		</div>
	</div>
</div>
</body>
</html>