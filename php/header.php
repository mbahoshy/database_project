<?php
?>

			<ul class='nav'>
				<li><a <?php if ($page == 'home') { echo ' id="navactive" '; }?> href='/index.html'>Home</a></li>
				<li><a <?php if ($page == 'customers') { echo ' id="navactive" '; }?> href='/customer_folder/customer_search.php'>Customers</a></li>
				<li><a <?php if ($page == 'jobs') { echo ' id="navactive" '; }?> href='/job_folder/job_search.php'>Jobs</a></li>
				<li><a <?php if ($page == 'equipment') { echo ' id="navactive" '; }?> href='/equipment_folder/equip_search.php'>Inventory</a></li>
				<li><a <?php if ($page == 'service') { echo ' id="navactive" '; }?> href='/service_folder/service_search.php'>Service</a></li>
			</ul>