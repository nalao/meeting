<?php 

	include "ConnectDb.php";
	include "FuncUsers.php";

	$database = new ConnectDb();
	$conn = $database->getConnection();

	$funcUsers = new FuncUsers($conn);
	
	if ($_POST["action"] == "add") {

		$funcUsers->user_name = $_POST["user_name"];
		$funcUsers->user_email = $_POST["user_email"];
		$funcUsers->user_phone = $_POST["user_phone"];
		$funcUsers->user_address = $_POST["user_address"];
		$funcUsers->user_pwd = $_POST["user_pwd"];

		if($funcUsers->userAdd()){
			echo "true";
		}else{
			echo "false";
		}
	}elseif ($_POST["action"] == "edit") {
		$funcUsers->user_id = $_POST["user_id"];
		$funcUsers->user_name = $_POST["user_name"];
		$funcUsers->user_email = $_POST["user_email"];
		$funcUsers->user_phone = $_POST["user_phone"];
		$funcUsers->user_address = $_POST["user_address"];

		if($funcUsers->userEdit()){
			echo "true";
		}else{
			echo "false";
		}			
	}elseif($_POST["action"] == "delete"){

		$funcUsers->user_id = $_POST["user_id"];

		if($funcUsers->userDelete()){
			echo "true";
		}else{
			echo "false";
		}	

	}elseif($_POST["action"] == "resetPwd"){
		$funcUsers->user_id = $_POST["user_id"];

		if($funcUsers->userReset()){
			echo "true";
		}else{
			echo "false";
		}		
	}else{
		$funcUsers->user_id = $_POST["user_id"];
		$funcUsers->user_pwd_old = $_POST["user_pwd_old"];
		$funcUsers->user_pwd = $_POST["user_pwd_new"];

		$response = $funcUsers->userChangePwd();
		echo $response;
	}
 ?>