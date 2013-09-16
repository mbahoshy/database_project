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
			include("../php/functions.php");
			
			/*start session*/
			
			session_start();
			
			// orderby();
	
			$orderby = order_by($_GET, 'namelast');
				
			// orderby($_GET);
			
			$page = 'customers';
			$_SESSION['page'] = $page;

		?>

<div id='jobpage'>
	<div id='header' class='gradient'>
	</div>
	
	<?php include("../php/header.php"); ?>

	<div class='maindisplay'>
		<div class='jobhead'>
			<h1>Search Customers</h1>
		</div>
		<div class='subnav'>
			<ul>
				<li><a href=''>Residential</a></li>
				<li><a href='/customer_folder/new_customer.html'>Builders</a></li>
				<li><a href='equip_received.php'>Commercial</a></li>
				<li><a href='equip_installed.php'>PM</a></li>
				<li><a href=''>Premium PM</a></li>
			</ul>
		</div>
		<div class='content'>
			<div class='searcharea'>
				<form action="customer_search_results.php" method="post">
						<a href='/customer_folder/new_customer.php'><div class='button fright'>
							New Customer
						</div></a>
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
				<?php
					if (isset($_POST['customertype'])) {
						addcustomer($_POST);	
					}	
				?>
			</div>
			<div class='content_full'>		
				<?php	customer_search($orderby);	?>
			</div>
		</div>
	</div>
</div>
</body>
</html>
