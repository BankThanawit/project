<?php
    $user_name = $_POST['user_name'];
    $pass = $_POST['pass'];

    $conn = new mysqli('localhost','root','','mnp');
    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}else {
		$stmt = $conn->prepare("select * from user_ where user_name = ?");
        $stmt->bind_param("s",$user_name);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['pass'] === $pass){
                echo '<script>alert("login Successfully");
                window.location.href = "http://localhost/mini/index.html"
                </script>';
                
                
            }else{
                echo '<script>alert("Invalid username or password")
                window.location.href = "http://localhost/mini/login_customer.html"
                </script>'; 
            }
        }else{
            echo '<script>alert("Invalid username or password")
            window.location.href = "http://localhost/mini/login_customer.html"
            </script>';
        }
    }
?>