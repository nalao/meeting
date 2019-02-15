<?php 
class Auth{
	private $conn;
	public $user_email;
	public $user_pwd;
	function __construct($db){
		$this->conn = $db;
	}

	public function login(){
		$this->user_email = htmlspecialchars(strip_tags($this->user_email));
		$this->user_pwd = htmlspecialchars(strip_tags($this->user_pwd));

		session_start();

		$sql = "SELECT * FROM users WHERE user_email = '$this->user_email' AND user_pwd = '$this->user_pwd' ";

		if($query = $this->conn->query($sql)){
			if ($query->num_rows > 0) {
				$result = $query->fetch_assoc();
				$_SESSION["user_id"] = $result["user_id"];
				$_SESSION["user_name"] = $result["user_name"];
				$_SESSION["user_email"] = $result["user_email"];
				$_SESSION["type"] = $result["type"];

				return true;
			}else{

				return false;

			}
		}

	}

	public function logout(){
		session_start();
		session_destroy();
	}

}

 ?>