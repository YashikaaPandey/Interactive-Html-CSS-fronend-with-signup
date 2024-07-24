<?php
	$Username = $_POST['Username'];
	$Email = $_POST['Email'];
	$Gender = $_POST['Gender'];
	$Password = $_POST['Password'];
	// Database connection
	$conn = new mysqli('localhost','root','','signup');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into Login(Username, Email, Gender, Password) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssss", $Username, $Email, $Gender, $Password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>