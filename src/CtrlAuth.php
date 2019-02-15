<?php 

	include "ConnectDb.php";
	include "Auth.php";

	$database = new ConnectDb();
	$conn = $database->getConnection();

	$auth = new Auth($conn);

	switch ($_GET["action"]) {
		case "login":
			$auth->user_email = $_POST["email"];
			$auth->user_pwd = $_POST["password"];
			if ($auth->login()) {
				header("location:../index.php");
			}else{
				header("location:../login.php?status=false");
			}
			break;
		case "logout":
			$auth->logout();
			header("location:../index.php");
			break;
		default:
			header("location:../index.php");
			break;
	}

 ?>