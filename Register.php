<!--Signup php-->
<!DOCTYPE html>
<html lang = "en">
	<head>
		<title> Form </title>
		<meta charset = "utf-8" />
		<link rel="stylesheet" type="text/css" href="layout.css" />
	</head>
	<body>
	
	<?php
	include ('navbar.php');
	include('kozycorner.dbconfig.inc');
	include ('footer.php');
	
	// Connect to MySQL	
	$conn = mysqli_connect($hostname,$username, $password, $dbname);
	if (mysqli_connect_errno()) {
		 print "Connection failed: " . mysqli_connect_error();
		 exit;
	}
	
		//Set variables for user
		#$section = $_POST['section'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$firstName= $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$zip = $_POST['zip'];
		$phone = $_POST['phone'];
		
		
		//All strings becomes uppercase
		$username = strtoupper($username);
		$password = strtoupper($password);
		$email = strtoupper($email);
		$firstName= strtoupper($firstName);
		$lastName = strtoupper($lastName);
		$zip = strtoupper($zip);
		$phone = strtoupper($phone);
		
		
	
		
		//Checks if email/username exists
		if($exist == FALSE){
			
			//Adds to User table in Database
			$query = "INSERT INTO mydb.user(username) VALUES('$username')";
			$result = mysqli_query($conn, $query);
		
		
		
		//Inserts a new user
		$query = "INSERT INTO mydb.user (user_id,username,password, email, first_name,last_name, zip, user_type)
			VALUES('','$user_name', '$password', '$email', '$firstName', '$lastName', '$zip', '$userType')";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			print "Error - the insert query could not be executed";
				mysql_error();
			exit;	
		}
		
		
		//Links post_id to user
		$userid = $_COOKIE["user_id"];
		$query = "INSERT INTO mydb.users_pets (pet_id, user_id) VALUES ('$petid', '$userid')";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			print "Error - the latest query could not be executed";
				mysql_error();
			exit;	
		}
		?>
		<div class="wrapper">
		<h2> Thanks for signing up!</h2>
		<a href="home.php"> home </a><br/>
		<a href="PostForm.php"> Report </a>
		</div>
	</body>
	
</html>