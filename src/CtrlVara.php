<?php 
	// required header
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	include "ConnectDb.php";
	include "FuncVara.php";

	$database = new ConnectDb();
	$conn = $database->getConnection();

	$funcVara = new FuncVara($conn);

	switch ($_POST['action']) {
		case 'viewVara':
			$varaTime["varaTime"] = array();
			$funcVara->topic_id = $_POST['topic_id'];
			$getVara = $funcVara->getVaraTime();
			while ($rows = $getVara->fetch_assoc()) {
				$varaTimeItem = array(
										'vara_time_id' => $rows['vara_time_id'], 
										'vara_time' => $rows['vara_time'],
										'topic_id' => $rows['topic_id'],
										'user_id' => $rows['user_id'],
										'comment' => $rows['comment']
									);
				
                $funcVara->vara_time_id = $rows['vara_time_id'];
                $resVara = $funcVara->getVara();
                $varaTimeItem['varaItem'] = array();
                while ($rowVara = $resVara->fetch_assoc()) {

                	$varaItem = array(
                						'vara_id' => $rowVara['vara_id'], 
                						'vara_detail' => $rowVara['vara_detail'],
                						'vara_file' => $rowVara['vara_file'],
                						'vara_time_id' => $rowVara['vara_time_id']
                					);
                	array_push($varaTimeItem['varaItem'], $varaItem);
                }
                array_push($varaTime["varaTime"], $varaTimeItem);
			}

			echo json_encode($varaTime);
			break;
		default:
			$varaTime["varaTime"] = array();
			http_response_code(404);
			echo json_encode($varaTime);
			break;
	}

 ?>