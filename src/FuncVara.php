<?php 
class FuncVara{
	private $conn;
	public $topic_id;
	public $vara_time_id;

	public function __construct($db){
		$this->conn = $db;
	}

	public function getVaraTime(){
		$sql = "SELECT * FROM vara_time WHERE topic_id = '$this->topic_id' ";
		$query = $this->conn->query($sql);
		return $query;
	}

	public function getVara(){
		$sql = "SELECT * FROM vara WHERE vara_time_id = '$this->vara_time_id' ";
		$query = $this->conn->query($sql);
		return $query;
	}

	public function varaAdd(){
		
	}

}
?>