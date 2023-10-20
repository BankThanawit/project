<?php
    $employee_name = $_POST['employee_name'];
    $pass = $_POST['pass'];

    $conn = new mysqli('localhost','root','','mnp');
    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}else {
		$stmt = $conn->prepare("select * from employee where employee_name = ?");
        $stmt->bind_param("s",$employee_name);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['pass'] === $pass){
                echo '<script>alert("login Successfully")</script>';
                
            }else{
                echo '<script>alert("Invalid username or password")</script>'; 
            }
        }else{
            echo '<script>alert("Invalid username or password")</script>';
        }
    }
?>