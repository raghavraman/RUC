<?php
//include 'php/setup.php';
include("php".DIRECTORY_SEPARATOR."setup.php");

$phone = $_POST['phnumber'];
$phone = str_replace("-","",$phone);

session_start();
$user_id = $_SESSION['user_id'];

			
			$conn = mysqli_connect($host, $user, $pass, $database);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			else{
			$stmt = $conn->prepare("UPDATE `users` SET `ph_no`= ? WHERE `user_id` = ?");
			$stmt->bind_param("ii", $phone, $user_id);
			$stmt->execute();
			$conn->close();
			
			header("Location: $redirect_url_home");
	}
	

?>