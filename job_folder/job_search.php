<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/customer_search.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/style.php'	/>
	<title>Job Search</title>
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
				
				$page = 'jobs';
				$_SESSION['page'] = $page;	
					
		if (isset($_GET['subnav_job'])) {
				$subnav_job = $_GET['subnav_job'];
				$_SESSION['subnav_job'] = $subnav_job;
			} else if (isset($_SESSION['subnav_job'])) {
				$subnav_job = $_SESSION['subnav_job'];
			} else {
				$subnav_job = 'All';
			}

	?>


<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>
	<?php include("../php/header.php"); ?>

		
	<div class='maindisplay'>
		<div class='jobhead'>
			<h1>Job Search</h1>
		</div>
		<div class='subnav'>
			<ul>
				<a href='job_search.php?subnav_job=All'><li <?php if ($subnav_job=='All') {echo "class='active'";} ?>>All Jobs</li></a>
				<a href='job_search.php?subnav_job=Opportunity'><li <?php if ($subnav_job=='Opportunity') {echo "class='active'";} ?>>Opportunity</li></a>
				<a href='job_search.php?subnav_job=Quoted'><li <?php if ($subnav_job=='Quoted') {echo "class='active'";} ?>>Quoted</li></a>
				<a href='job_search.php?subnav_job=Earned'><li <?php if ($subnav_job=='Earned') {echo "class='active'";} ?>>Earned</li></a>
				<a href='job_search.php?subnav_job=Scheduled'><li <?php if ($subnav_job=='Scheduled') {echo "class='active'";} ?>>Scheduled</li></a>
				<a href='job_search.php?subnav_job=Progress'><li <?php if ($subnav_job=='Progress') {echo "class='active'";} ?>>Progress</li></a>
				<a href='job_search.php?subnav_job=Trim'><li <?php if ($subnav_job=='Trim') {echo "class='active'";} ?>>Trim</li></a>
				<a href='job_search.php?subnav_job=Complete'><li <?php if ($subnav_job=='Complete') {echo "class='active'";} ?>>Complete</li></a>
				<a href='job_search.php?subnav_job=Discarded'><li <?php if ($subnav_job=='Discarded') {echo "class='active'";} ?>>Discarded</li></a>
			</ul>
		</div>
		<div class='content'>
			<div class='searcharea'>
				<?php
					if (isset($_POST['jstatus'])) {
						$jstatus = $_POST['jstatus'];
						$jobstatus = $_POST['jobstatus'];
					
						$num_checks = count($jstatus);

						
						for ($i=0; $i <$num_checks; $i++) {
							$jobid = $jstatus[$i];
							
							$jobquery = "update jobs set jobstatus = '".$jobstatus."' where jobid = ".$jobid;
							$jobresult = $db->query($jobquery);
							if ($jobresult) {
								echo "<h3 class = 'green'>".$db->affected_rows." jobs updated in database.</h3>";
							} else {
								echo "<h3 class = 'red'> An error has occured.</h3>";
							}
						}
				}
				
				?>
				<form action="job_results.php" method="post">
						<p>
						<b>Choose Search Type:</b>
						<select name='searchtype'>
							<option type='radio' name='searchtype' value='jobname'>Job Name</option>
							<option type='radio' name='searchtype' value='jobid'>Job ID</option>
							<option type='radio' name='searchtype' value='jobaddress'>Job Address</option>
							<option type='radio' name='searchtype' value='jobdescription'>Job Description</option>
							<option type='radio' name='searchtype' value='jobtype'>Job Type</option>
							<option type='radio' name='searchtype' value='jobcity'>Job City</option>
						</select>
						</p>
						<p>
						<b>Enter Search Term:</b>
						<input name="searchterm" type="text" size="40"/>
						<input type="submit" name="submit" value="Search"/>
						</p>
				</form>

				<p>Or <a href='/customer_folder/customer_search.php'>Search By Customer</a></p>

			</div>
			
			<div class='content_full'>
			
				<?php
				
						
				
				if ($subnav_job=="All") {
					$jobquery = "select * from jobs";
				} else {
					$jobquery = "select * from jobs where jobstatus = '".$subnav_job."'";
				}
				
				$jobresult = $db->query($jobquery);
				
				$num_jobs = $jobresult->num_rows;

				?>
				<form action='job_search.php' method='post'>
				
				Mark selected as:
				<select name='jobstatus'>
					<option <?php if ($subnav_job=='Opportunity') {echo "selected='selected'";} ?> value='Opportunity'>Opportunity</option>
					<option <?php if ($subnav_job=='Quoted') {echo "selected='selected'";} ?> value='Quoted'>Quoted</option>
					<option <?php if ($subnav_job=='Earned') {echo "selected='selected'";} ?> value='Earned'>Earned</option>
					<option <?php if ($subnav_job=='Scheduled') {echo "selected='selected'";} ?> value='Scheduled'>Scheduled</option>
					<option <?php if ($subnav_job=='In Progress') {echo "selected='selected'";} ?> value='In Progress'>In Progress</option>
					<option <?php if ($subnav_job=='Trim') {echo "selected='selected'";} ?> value='Trim'>Trim</option>
					<option <?php if ($subnav_job=='Complete') {echo "selected='selected'";} ?> value='Complete'>Complete</option>
					<option <?php if ($subnav_job=='Discarded') {echo "selected='selected'";} ?> value='Discarded'>Discarded</option>
				</select>
				<input class='margin-left' type='submit' value='Update'>
					<?php
						echo "<table class='results'>";
								echo "<tr>";
								echo "<th>Job Status</th> <th>Job Name:</th> <th>Job Address</th> <th>Job Type</th> <th>Job ID</th> </tr>";
						
								for ($i=0; $i <$num_jobs; $i++) {
									$jobrow = $jobresult->fetch_assoc();
									
									$custquery = "select * from customers where customerid = '".$jobrow['customerid']."'";
									$custresult = $db->query($custquery);
									$custrow = $custresult->fetch_assoc();
									
										if (($i+1)&1){
											echo "<tr class='grey'>";
										} else {
											echo "<tr class='white'>";
										}
											echo "<td><input name='jstatus[]' type='checkbox' value='".$jobrow['jobid']."'>".stripslashes($jobrow['jobstatus'])."</td>";
											echo "<td><a href='/job_folder/display_job.php?jobid=".$jobrow['jobid']."'>".stripslashes($custrow['namelast']).", ".stripslashes($custrow['namefirst'])." - <i>".stripslashes($jobrow['jobname'])."</i></a></td>";
											echo "<td>".stripslashes($jobrow['jobaddress'])."</td>";
											echo "<td>".stripslashes($jobrow['jobtype'])."</td>";
											echo "<td>#J".str_pad($jobrow['jobid'], 6, '0', STR_PAD_LEFT)."</td>";
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
