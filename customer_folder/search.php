<html>
<head>
	<title>Customer Search</title>
</head>

<body>
	<h1>Customer Search</h1>
	
	<form action="search_results.php" method="post">
	Choose Search Type:<br />
	<select name="searchtype">
		<option value="name">Name</option>
		<option value="phone">Phone</option>
		<option value="city">City</option>
	</select>
	<br	/>
	Enter Search Term:<br	/>
	<input name="searchterm" type="text" size="40"/>
	<br	/>
	<input type="submit" name="submit" value="Search"/>
	</form>
	
	<p><a href='new_customer.html'>New Customer</a></p>
</body>
</html>