<?php 
	session_start();
	include "ConnectDb.php";
	include "FuncTopic.php";

	$database = new ConnectDb();
	$conn = $database->getConnection();

	$funcTopic = new FuncTopic($conn);

	switch ($_POST['action']) {
		case 'add':

			$funcTopic->user_id = $_SESSION["user_id"];
			$funcTopic->topic_name = $_POST["topic_name"];
			$funcTopic->topic_date = $_POST["topic_date"];
			if ($funcTopic->topicAdd()) {
				echo "true";
			}else{
				echo "false";
			}
			break;
		case 'edit':
			echo "edit";
			break;
		default:
			echo "default";
			break;
	}

 ?>