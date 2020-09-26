<?php 
	session_start();
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
		//id nya dapetin dulu
		$id = $_SESSION[];

		$username = $_POST['username']; 
		$email = $_POST['email'];
		//passwordnya kayak gini atau gmn? gw ikutin regis controller
		$password =
		password_hash($_POST['password'],PASSWORD_DEFAULT);
		//bind param
		$query = "UPDATE users SET Username=?, Email=?, Password=? WHERE id='$id'";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sss",$username, $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if($result->num_rows > 0 && $user_data = $result->fetch_assoc()){
            $_SESSION['user']['Username'] = $_POST['username'];
			$_SESSION['user']['Email'] = $_POST['email'];
			//session password?
			$_SESSION['user']['Passsword'] = ;
            redirect('../index.php');
        }
	}else{
?>
		<script>alert('Mau ngapain lu?');</script>
<?php
	}
	
 ?>