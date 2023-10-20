<?php
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $address = $_POST['address'];
    $pass = $_POST['pass'];
    $phonenumber = $_POST['phonenumber'];

    $conn = new mysqli('localhost','root','','mnp');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into user_(user_id, user_name, user_fname, user_lname, address, pass, phonenumber) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssss", $user_id, $user_name, $user_fname, $user_lname, $address, $pass, $phonenumber);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		header("refresh: 2; url=http://localhost/mini/index.html");
		$stmt->close();
		$conn->close();
	}
?>