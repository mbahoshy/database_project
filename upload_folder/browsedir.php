<html>
<head>
	<title>Browse Directories</title>
</head>
<body>
	<h1>Browsing</h1>
	<?php
	
	
		
		
		$current_dir = '../uploads/';
		$dir = opendir($current_dir);
		
		echo "<p>Upload directory is $current_dir </p>";
		echo '<p>Directory listing:</p>';
		
		while (false !== ($file = readdir($dir))) {
			//strip out the two entries of . and ..
			if ($file != "." && $file != "..")
			{
				echo "<li><a href='uploads/$file'>$file</a></li>";
			}
		}
		echo '</ul>';
		closedir($dir);
	?>
</body>
</html>