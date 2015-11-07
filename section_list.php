<?php

		// Connect to MySQL
		$db = mysqli_connect("localhost", "root", "", "kozycorner");
		if (mysqli_connect_errno()) {
			 print "Connect failed: " . mysqli_connect_error();
			 exit;
		}
		
		// Build query
		$query = "SELECT * FROM PETS WHERE section='$section'";
		
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
		
		print "<strong>$num_rows</strong> results found.<br /><br />";
		
		// Table heading
		print "<table border=\"1\" width=\"80%\">";
		print "<tr>";
			print "<th>Name</th>";
			print "<th>Type</th>";
			print "<th>Breed</th>";
			print "<th>Gender</th>";
			print "<th>Color</th>";
			print "<th>Weight</th>";
			print "<th>Age</th>";
			print "<th>Description</th>";
			print "<th>Date Found</th>";
			print "<th>Location Found</th>";
		print "</tr>";
		
		// For each row in the table..
		for($row_num = 0; $row_num < $num_rows; $row_num++) {
			
			// ..display only certain elements in this row
			print "<tr>";
				print "<td>$row[pet_name]</td>";
				print "<td>$row[pet_type]</td>";
				print "<td>$row[breed_id]</td>";
				print "<td>$row[gender]</td>";
				print "<td>$row[color]</td>";
				print "<td>$row[weight] lbs</td>";
				print "<td>$row[age] years old</td>";
				print "<td>$row[pet_description]</td>";
				print "<td>$row[date_found]</td>";
				print "<td>$row[location_found]</td>";
			print "</tr>";
			
			// Move to the next row
			$row = mysqli_fetch_assoc($result);
		}
		
		// End table
		print "</table>";
							
		?>