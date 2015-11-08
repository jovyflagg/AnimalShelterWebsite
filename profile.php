<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lost pets</title>
	<meta charset="utf-8" />
</head>
<body>

		<h2>Pet Profile</h2>
	
		<?php

		// Get form value
		$petid = $_GET["petid"];

		// Connect to MySQL
		$db = mysqli_connect("localhost", "root", "", "kozycorner");
		if (mysqli_connect_errno()) {
			 print "Connect failed: " . mysqli_connect_error();
			 exit;
		}
		
		$query = "SELECT * FROM PETS WHERE pet_id='$petid'";
		
		// Run query
		$result = mysqli_query($db, $query);
		if (!$result) {
			print "Error - the query could not be executed" . mysqli_error($db);
			exit;
		}
		
		// Get information about $result object
		$num_rows = mysqli_num_rows($result);
		$num_fields = mysqli_num_fields($result);
		$row = mysqli_fetch_assoc($result);
		
		// Print the values from the table
		for($row_num = 0; $row_num < $num_rows; $row_num++) {
			
			// ..display only certain elements in this row
			print "<b>Name:</b> $row[pet_name]<br />";
			print "<b>Type:</b> $row[pet_type]<br />";
			print "<b>Breed:</b> $row[breed_id]<br />";
			print "<b>Gender:</b> $row[gender]<br />";
			print "<b>Color:</b> $row[color]<br />";
			print "<b>Weight:</b> $row[weight] lbs<br />";
			print "<b>Birthdate:</b> $row[birthdate]<br />";
			print "<b>Description:</b> $row[pet_description]<br />";
			print "<b>Date Found:</b> $row[date_found]<br />";
			print "<b>Location Found:</b> $row[city], $row[state] $row[zipcode]<br />";
			
			// Move to the next row
			$row = mysqli_fetch_assoc($result);
		}
		
		?>
		
</body>
</html>