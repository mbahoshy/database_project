<html>
<head>
	<link rel='stylesheet' type='text/css' href='/css/main.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/customer_search.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/jobs.css'	/>
	<link rel='stylesheet' type='text/css' href='/css/style.php?=service'	/>
	
	<script type ='text/javscript'>
		

		/* cut this
				function addsystem() {
				
					var theForm = document.getElementById('service');
					
					var newSys = document.createElement('input');
					
					newSys.type = 'text';
					newSys.name = 'shitballs[]';
					newSys.size = '60';
					
					theForm.appendChild(newSys);
				
				}
	
		*/
		
	</script>
	<title>Add Service</title>
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
			
			$serviceid = $_SESSION['serviceid'];
			$query = "select * from service where serviceid = ".$serviceid;
			$result = $db->query($query);
			
			$row = $result->fetch_assoc();
			$jobid = stripslashes($row['jobid']);
			$custid = stripslashes($row['customerid']);
			$snamefirst = stripslashes($row['snamefirst']);
			$snamelast = stripslashes($row['snamelast']);
			$saddress = stripslashes($row['saddress']);
			$scity = stripslashes($row['scity']);
			$sstate = stripslashes($row['sstate']);
			$szip = stripslashes($row['szip']);
			$sphone = stripslashes($row['sphone']);
			$sdescription = stripslashes($row['sdescription']);
			$assignedto = stripslashes($row['assignedto']);
			$dos = $row['assigneddate'];


		?>

<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>
	
			<ul class='nav'>
				<li><a href='/index.html'>Home</a></li>
				<li><a href='/customer_folder/customer_search.php'>Customers</a></li>
				<li><a href='/job_folder/job_search.php'>Jobs</a></li>
				<li><a href='/equipment_folder/equip_search.php'>Inventory</a></li>
				<li><a id='navactive'  href='service_search.php'>Service</a></li>
			</ul>

	<div class='maindisplay'>
		<div class='jobhead'>
			<h1>Create Service Ticket<span><?php echo "#S".str_pad($serviceid, 6, '0', STR_PAD_LEFT); ?></span></h1>
		</div>
		<div class='subnav'>
			<ul>
				<li><a href=''>Cancel</a></li>

			</ul>
		</div>
		<div class='content'>
			<div class='content_full'>
				<form id='serviceform' action="add_values.php" method='POST'>
					<table class='servicetable fleft noborder'>
						
						<tr>
							<td><b>Customer Name:</b></td>
							<td><input name="cname" type="text" size="40" value='<?php echo $snamefirst." ".$snamelast;?>' /></td>
						</tr>
						<tr>
							<td><b>Address:</b></td>
							<td><input name="address" type="text" size="40" value='<?php echo $saddress; ?>' /></td>
						</tr>
						<tr>
							<td><b>City:</b></td>
							<td><input name="city" type="text" size="40" value='<?php echo $scity; ?>'/></td>
						</tr>
						<tr>
							<td><b>Phone:</b></td>
							<td><input name="phone" type="text" size="40" value='<?php echo $sphone; ?>'/></td>
						</tr>
						<tr>
							<td><b>Technician:</b></td>
							<td><input name="technician" type="text" size="40" value='<?php echo $assignedto; ?>' /></td>
						</tr>
					</table>
					<table class='servicetable fright padleft noborder'>
						<tr>
							<td><b>Date of Request:</b></td>
							<td><input name="dor" type="date" /></td>
						</tr>
						<tr>
							<td><b>Date of Service:</b></td>
							<td><input name="dos" type="date" value="<?php echo $dos; ?>"/></td>
						</tr>
						<tr>
								<td><b>Service Time:</b></td>
								<td><input name="stime" type="text" size="40"/></td>
							</tr>
							<tr>
								<td><b>Arrival Time:</b></td>
								<td><input name="atime" type="text" size="40"/></td>
							</tr>
							<tr>
								<td><b>Completed Time:</b></td>
								<td><input name="ctime" type="text" size="40"/></td>
							</tr>
							<tr>
								<td><b>Travel Time:</b></td>
								<td><input name="ttime" type="text" size="40"/></td>
							</tr>
					
					</table>
					<div class='clear'></div>
					<b>Reason for Service:</b><br	/>
							<textarea name='reason' class='txtinput_lrg'><?php echo $sdescription; ?></textarea>
					<b>Description:</b><br	/>
							<textarea name="description" class="txtinput_lrg"></textarea>	
					<b>Recommendations:</b>
							<textarea name="recommendations" class="txtinput_lrg" ></textarea>
							
					<b>Environmental:</b><br	/>
					<table class='servicetable fleft noborder grey'>	
						<tr>
							<td><input name='r_recovered' class='numinput' type='number' min='0' step="0.5"> lbs refrigerant recovered</td>
						</tr>
						<tr>
							<td><input name='r_installed' class='numinput' type='number' min='0' step="0.5"> lbs refrigerant installed</td>
						</tr>
					</table>
					<div class='clear'>
					<table class='servicetable fleft noborder grey'>
						<tr>
							<td>Service valves in use:</td>
								<td><select>
									<option>Yes</option>
									<option>No</option>
								</select></td>
						</tr>
						<tr>
							<td>Customer advised of leaks:</td>
								<td><select>
									<option>Yes</option>
									<option>No</option>
									<option>NA</option>
								</select></td>
						</tr>
					</table>
							<br	/>
							<input name="environmental" type="text" size="40"/>

					
					<table class='noborder'>	

							<td><b>PMA Type:</b></td>
							<td>
								<select>
									<option>PMA Basic</option>
									<option>PMA Basic 2</option>
									<option>PMA P1</option>
									<option>PMA P2</option>
								</select>
							</td>
							<!-- <td><input name="pma" type="text" size="40"/></td> -->
						</tr>
						<tr>
							<td><b>Overtime:</b></td>
							<td><input name="overtime" type="text" size="40"/></td>
						</tr>
						
					
						<script>
						i = 0;
						
						function writeshit() {
						
						
							var text = document.createTextNode('System '+i);
							
							//create text nodes for cooling unit			
								var cooling = document.createTextNode('Cooling Unit');
								var type = document.createTextNode('Type');
								var make = document.createTextNode('Make');
								var model = document.createTextNode('Model');
								var serial = document.createTextNode('Serial');
							
							//create text nodes for heating units
								var heating = document.createTextNode('Heating Unit');
								var htype = document.createTextNode('Type');
								var hmake = document.createTextNode('Make');
								var hmodel = document.createTextNode('Model');
								var hserial = document.createTextNode('Serial');
								var hstripheat = document.createTextNode('Strip Heat');
							
							//create linebreak function
								lb = function () { return document.createElement( 'BR' ); }


							//access 'theForm' via the dom
								var theForm = document.getElementById('servicetable');
								
							//create system name input
								var newSys = document.createElement('input');
								
							//create inputs for cooling unit information								
								var newtype = document.createElement('input');
								var newmake = document.createElement('input');
								var newmodel = document.createElement('input');
								var newserial = document.createElement('input');
								
							//create inputs for heating unit information
								var hnewtype = document.createElement('input');
								var hnewmake = document.createElement('input');
								var hnewmodel = document.createElement('input');
								var hnewserial = document.createElement('input');
								var hnewstripheat = document.createElement('input');

							//apply attributes to system
								newSys.type = 'text';
								newSys.name = "system["+i+"][0]";
								newSys.size = '60';
								
							//apply attributes to cooling unit		
								newtype.type = 'text';
								newtype.name = 'system['+i+'][1]';
								newtype.size = '60';
								
								newmake.type = 'text';
								newmake.name = 'system['+i+'][2]';
								newmake.size = '60';
								
								newmodel.type = 'text';
								newmodel.name = 'system['+i+'][3]';
								newmodel.size = '60';
								
								newserial.type = 'text';
								newserial.name = 'system['+i+'][4]';
								newserial.size = '60';
								
							//apply attributes to heating unit		
								hnewtype.type = 'text';
								hnewtype.name = 'system['+i+'][5]';
								hnewtype.size = '60';
								
								hnewmake.type = 'text';
								hnewmake.name = 'system['+i+'][6]';
								hnewmake.size = '60';
								
								hnewmodel.type = 'text';
								hnewmodel.name = 'system['+i+'][7]';
								hnewmodel.size = '60';
								
								hnewserial.type = 'text';
								hnewserial.name = 'system['+i+'][8]';
								hnewserial.size = '60';
								
								hnewstripheat.type = 'text';
								hnewstripheat.name = 'system['+i+'][9]';
								hnewstripheat.size = '60';
							

							//append new system
							
								theForm.appendChild(text);
								theForm.appendChild(newSys);
								theForm.appendChild(lb());
								
								
							//append cooling unit
								theForm.appendChild(cooling);
								theForm.appendChild(lb());

								
								theForm.appendChild(type);
								theForm.appendChild(newtype);
								theForm.appendChild(lb());

								
								theForm.appendChild(make);
								theForm.appendChild(newmake);
								theForm.appendChild(lb());
								
								theForm.appendChild(model);
								theForm.appendChild(newmodel);
								theForm.appendChild(lb());
								
								theForm.appendChild(serial);
								theForm.appendChild(newserial);
								theForm.appendChild(lb());
							
							//append heating unit
								theForm.appendChild(heating);
								theForm.appendChild(lb());

								
								theForm.appendChild(htype);
								theForm.appendChild(hnewtype);
								theForm.appendChild(lb());

								
								theForm.appendChild(hmake);
								theForm.appendChild(hnewmake);
								theForm.appendChild(lb());
								
								theForm.appendChild(hmodel);
								theForm.appendChild(hnewmodel);
								theForm.appendChild(lb());
								
								theForm.appendChild(hserial);
								theForm.appendChild(hnewserial);
								theForm.appendChild(lb());
								
								theForm.appendChild(hstripheat);
								theForm.appendChild(hnewstripheat);
								theForm.appendChild(lb());
								
							//increase loop counter
								i++;
						}
						</script>
					</table>
						
					<input type="submit" name="submit" value="Search"/>
				</form>
			<!-- 	<a href='javascript:addsystem();'>Add System</a> -->
			<input type='button' value='add system' onclick='writeshit()'	/>

			</div>
		</div>
	</div>
</div>
</body>
</html>