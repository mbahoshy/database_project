<?php


	
	function addcustomer ($addcustomer_values) {
			@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

			if (mysqli_connect_errno()) {
			 echo 'Error: Could not connect to database.  Please try again later.';
			 exit;
			}
			
			// create short variable names
			$namefirst = $addcustomer_values['namefirst'];
			$namelast = $addcustomer_values['namelast'];
			$address = $addcustomer_values['address'];
			$city = $addcustomer_values['city'];
			$zip = $addcustomer_values['zip'];
			$phone = $addcustomer_values['phone'];
			$email = $addcustomer_values['email'];
			$customertype = $addcustomer_values['customertype'];
			$cstate = $addcustomer_values['cstate'];

			if (!$namefirst || !$namelast || !$city) {
				echo "You have not entered all the required details.<br	/>";
				exit;
				}
				
			if (!get_magic_quotes_gpc()) {
				$namefirst = addslashes($namefirst);
				$namelast = addslashes($namelast);
				$address = addslashes($address);
				$city = addslashes($city);
				$email = addslashes($email);
				}
				

			$add_query = "insert into customers values (NULL, '".$namefirst."', '".$namelast."', '".$address."', '".$city."', '".$cstate."', '".$zip."', '".$phone."', '".$email."', '".$customertype."')";

			$add_result = $db->query($add_query);
			$custid = $db->insert_id;
			
			
			if ($add_result) {
				$message = ("<h3 class='green'>".$db->affected_rows." customers added to database.</h3>");
				echo $message;
			} else {
				$message = "<h3 class='red'>An error has occured.</h3>";
				echo $message;
			}
			$db->close();
			
	}
	
	function addjob ($job_data, $Ncustid) {
	
			$custid = $Ncustid;
	
			// create short variable names
			$jobname = $job_data['jobname'];
			$jobaddress = $job_data['jobaddress'];
			$jobcity = $job_data['jobcity'];
			$jstate = $job_data['jstate'];
			$jzip = $job_data['jzip'];
			$jobdescription = $job_data['jobdescription'];
			$jobtype = $job_data['jobtype'];
			$jobstatus = $job_data['jobstatus'];

			if (!jobname || !jobaddress || !jobdescription) {
				echo "You have not entered all the required details.<br	/>";
				exit;
				}
				
			if (!get_magic_quotes_gpc()) {
				$jobname = addslashes($jobname);
				$jobaddress = addslashes($jobaddress);
				$jobdescription = addslashes($jobdescription);
				}
			@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
				exit;
				}
			
			$query = "insert into jobs values (NULL, ".$custid.", '".$jobname."', '".$jobaddress."', '".$jobcity."', '".$jstate."', '".$jzip."', '".$jobdescription."', '".$jobtype."', '".$jobstatus."', NULL, NULL)";
			
			$result = $db->query($query);
			
			if ($result) {
				echo "<h3 class='green'>".$db->affected_rows." jobs inserted into database.</h3>";
			} else {
				echo "<h3 class='red'>An error has occured.</h3>";
			}

			echo "<a href='/customer_folder/display_customer.php?".$custid."'>Back to customer</a>";
			
			$db->close();
			
			
	
	
	}
	
	function addservice ($service_data, $Ncustid) {
				@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

				if(mysqli_connect_errno()) {
					echo "Error: Could not connect to database.";
					exit;
					}
							$custid = $Ncustid;
							
							$snamefirst = $service_data['snamefirst'];
							$snamelast = $service_data['snamelast'];
							$saddress = $service_data['saddress'];
							$scity = $service_data['scity'];
							$sstate = $service_data['sstate'];
							$szip = $service_data['szip'];
							$sphone = $service_data['sphone'];
							$sdescription = $service_data['sdescription'];
							$assignedto = $service_data['assignedto'];
							$createdby = $service_data['createdby'];
							$servicestatus = $service_data['servicestatus'];
							$assigneddate = $service_data['assigneddate'];
						
							$squery = "insert into service values (NULL, ".$custid.", '".$snamefirst."', '".$snamelast."', '".$createdby."', '".$assignedto."', '".$sdescription."', '".$saddress."', '".$scity."', '".$sstate."', '".$szip."', '".$sphone."', '".$servicestatus."', NULL, '".$assigneddate."', NULL)";
					
							$sresult = $db->query($squery);
							
							if ($sresult) {
								echo "<h3 class='green'>".$db->affected_rows." service inserted into database.</h3>";
							} else {
								echo "<h3 class='red'>An error has occured.</h3>";
							}
					$db->close();

	}
	
	function get_customer_info ($Ncustid) {
				
		@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

		if(mysqli_connect_errno()) {
			echo "Error: Could not connect to database.";
			exit;
		}
		$query = "select * from customers where customerid = ".$Ncustid;
		$result = $db->query($query);
		
		if (!$result) {
			echo "An error has occured.";
		}
		

		$row = $result->fetch_assoc();
		$customer_info['namelast'] = stripslashes($row['namelast']);
		$customer_info['namefirst'] = stripslashes($row['namefirst']);
		$customer_info['city'] = stripslashes($row['city']);
		$customer_info['address'] = stripslashes($row['address']);
		$customer_info['zip'] = stripslashes($row['zip']);
		$customer_info['phone'] = stripslashes($row['phone']);
		$customer_info['email'] = stripslashes($row['email']);
		$customer_info['customertype'] = stripslashes($row['customertype']);
		
		/*add state to customers table and assign state to this variable */
		$customer_info['cstate'] = 'WA';
						
		// $custid_float = (str_pad($custid, 6, '0', str_pad_left));
		return $customer_info;
		$db->close();
	}
	
	
	function service_search ($condition, $value, $Norderby) {
		@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

		if(mysqli_connect_errno()) {
			echo "Error: Could not connect to database.";
			exit;
		}	
	
		if(isset($Norderby)) {
			if ($value == 'All') {
				$servicequery = "select * from service order by ".$Norderby;
			} else {
				$servicequery = "select * from service where ".$condition." = '".$value."' order by ".$Norderby;	
			}
		} else {
			$servicequery = "select * from service where ".$condition." = ".$value;
		}
		
		$serviceresult = $db->query($servicequery);
		$num_service = $serviceresult->num_rows;
		
		echo "<table class='results'>";
				echo "<tr>";
				echo "<th><a href='?orderby=servicestatus'>Status</a></th> <th><a href='?orderby=snamelast'>Customer</a></th> <th><a href='?orderby=scity'>City</a></th> <th><a href='?orderby=assigneddate'>Scheduled</a></th> <th><a href='?orderby=szip'>Zip</a></th> <th><a href='?orderby=assignedto'>Assigned To</a></th> <th><a href='?orderby=serviceid'>Service ID</a></th></tr>";
		
				for ($i=0; $i <$num_service; $i++) {
					$row = $serviceresult->fetch_assoc();
					if (($i+1)&1){
						echo "<tr class='grey'>";
					} else {
						echo "<tr class='white'>";
					}
							echo "<td><input name='sstatus[]' type='checkbox' value='".$row['serviceid']."'>".stripslashes($row['servicestatus'])."</td>";
							echo "<td><a href='/service_folder/display_service.php?serviceid=".$row['serviceid']."'>".htmlspecialchars(stripslashes($row['snamelast'])).", ".htmlspecialchars(stripslashes($row['snamefirst']))."</a></td>";
							echo "<td>".stripslashes($row['scity'])."</td>";

							echo "<td>".stripslashes($row['assigneddate'])."</td>";

							echo "<td>".stripslashes($row['szip'])."</td>";

							echo "<td>".stripslashes($row['assignedto'])."</td>";
							
							echo "<td>#S".str_pad($row['serviceid'], 6, '0', STR_PAD_LEFT)."</td>";
							
						echo "</tr>";

				}
		
		echo "</table>";
		$db->close();
	}	
	
	
	function order_by($newstatus, $default) {
		if (isset($newstatus['orderby'])) {
			return $newstatus['orderby'];
		} else {
			return $default;
		}
	}
	
	
	function customer_search ($Norderby) {
	
			@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

			if (mysqli_connect_errno()) {
			 echo 'Error: Could not connect to database.  Please try again later.';
			 exit;
			}
					$query = "select * from customers order by ".$Norderby;
					$result = $db->query($query);

					$num_results = $result->num_rows;

					echo "<p>Number of customers: ".$num_results."</p>";
					
					echo "<table class='results'>";
							echo "<tr>";
							echo "<th><a href = '?orderby=namelast'>Name:</a></th> <th><a href = '?orderby=city'>City</a></th> <th><a href = '?orderby=address'>Address</a></th> <th><a href = '?orderby=zip'>Zip</a></th> <th><a href = '?orderby=phone'>Phone</a></th> <th><a href = '?orderby=customerid'>Cust. ID</a></th></tr>";
					
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
					$db->close();
	
	
	
	
	}
	
	
	function subnav_active ($GETARRAY, $subnavpage, $default) {
			
		if (isset($GETARRAY['subnav_'.$subnavpage])) {
			$subnav_active = $GETARRAY['subnav_'.$subnavpage];
			$_SESSION['subnav_'.$subnavpage] = $subnav_active;
			return $subnav_active;
		} else if (isset($_SESSION['subnav_'.$subnavpage])) {
			return $_SESSION['subnav_'.$subnavpage];
		} else {
			return $default;
		}
			
	}
	
	
	
	
?>