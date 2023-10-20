<?php
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
		$stmt = $conn->prepare("insert into user_(user_name, user_fname, user_lname, address, pass, phonenumber) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $user_name, $user_fname, $user_lname, $address, $pass, $phonenumber);
		$execval = $stmt->execute();
		echo $execval;
		echo '<script>alert("Sign up Successfully");
                window.location.href = "http://localhost/mini/login_customer.html"
                </script>';
		$stmt->close();
		$conn->close();
	}
?>