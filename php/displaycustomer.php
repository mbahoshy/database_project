<?php
			@ $db = new mysqli('localhost', 'root', '07maryJ68', 'alpine');

			if (mysqli_connect_errno()) {
			 echo 'Error: Could not connect to database.  Please try again later.';
			 exit;
			}
					$query = "select * from customers order by ".$orderby;
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
?>