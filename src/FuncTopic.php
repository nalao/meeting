<?php 
class FuncTopic{
	private $conn;
	public $user_id;
	public $topic_name;
	public $topic_date;

	public function __construct($db){
		$this->conn = $db;
	}

	public function getTopic(){
		$sql = "SELECT * FROM topic ORDER BY topic_id DESC";
		$query = $this->conn->query($sql);
		return $query;
	}

	public function topicAdd(){
		$this->user_id = htmlspecialchars(strip_tags($this->user_id));
		$this->topic_name = htmlspecialchars(strip_tags($this->topic_name));
		$this->topic_date = htmlspecialchars(strip_tags($this->topic_date));
		$sql = "INSERT INTO topic(topic_name, topic_date, user_id) VALUES ('$this->topic_name', '$this->topic_date', '$this->user_id')";
		if ($this->conn->query($sql)) {
			return true;
		}else{
			return  false;
		}
	}

}
?>