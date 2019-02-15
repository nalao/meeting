<?php 
class FuncUsers{
	private $conn;

	public $user_id;
	public $user_name;
	public $user_email;
	public $user_phone;
	public $user_address;
	public $user_pwd;
	public $user_pwd_old;

	public function __construct($db){
		$this->conn = $db;
	}

	public function getAllUser(){
		$sql = "SELECT * FROM users ORDER BY type DESC";
		$query = $this->conn->query($sql);
		return $query;
	}

	public function getUserById(){
		$sql = "SELECT * FROM users WHERE user_id = '$this->user_id' ";
		$query = $this->conn->query($sql);
		return $query;
	}

	public function userAdd(){

		$this->user_name = htmlspecialchars(strip_tags($this->user_name));
		$this->user_email = htmlspecialchars(strip_tags($this->user_email));
		$this->user_phone = htmlspecialchars(strip_tags($this->user_phone));
		$this->user_address = htmlspecialchars(strip_tags($this->user_address));
		$this->user_pwd = htmlspecialchars(strip_tags($this->user_pwd));

		$sql = "INSERT INTO users(user_name, user_email, user_phone, user_address, user_pwd) VALUES('$this->user_name', '$this->user_email', '$this->user_phone', '$this->user_address', '$this->user_pwd')";
		if ($this->conn->query($sql)) {
			return true;
		}else{
			return  false;
		}
	}

	public function userEdit(){

		$this->user_id = htmlspecialchars(strip_tags($this->user_id));
		$this->user_name = htmlspecialchars(strip_tags($this->user_name));
		$this->user_email = htmlspecialchars(strip_tags($this->user_email));
		$this->user_phone = htmlspecialchars(strip_tags($this->user_phone));
		$this->user_address = htmlspecialchars(strip_tags($this->user_address));

		$sql = "UPDATE users SET user_name = '$this->user_name', user_email = '$this->user_email', user_phone = '$this->user_phone', user_address = '$this->user_address' WHERE user_id = '$this->user_id' ";
		if ($this->conn->query($sql)) {
			return true;
		}else{
			return  false;
		}
	}

	public function userDelete(){
		$this->user_id = htmlspecialchars(strip_tags($this->user_id));

		$sql = "DELETE FROM users WHERE user_id = '$this->user_id' ";
		if($this->conn->query($sql)){
			return true;
		}else{
			return false;
		}
	}

	public function userReset(){
		$this->user_id = htmlspecialchars(strip_tags($this->user_id));
		$sql = "UPDATE users SET user_pwd = '123456' WHERE user_id = '$this->user_id' ";
		if ($this->conn->query($sql)) {
			return true;
		}else{
			return false;
		}
	}

	public function userChangePwd(){
		$this->user_id = htmlspecialchars(strip_tags($this->user_id));
		$this->user_pwd_old = htmlspecialchars(strip_tags($this->user_pwd_old));
		$this->user_pwd = htmlspecialchars(strip_tags($this->user_pwd));

		$getUserSql = "SELECT * FROM users WHERE user_id = '$this->user_id' AND user_pwd = '$this->user_pwd_old' ";
		$query = $this->conn->query($getUserSql);

		if($query->num_rows > 0){
			$sql = "UPDATE users SET user_pwd = '$this->user_pwd' WHERE user_id = '$this->user_id' ";
			if ($this->conn->query($sql)) {
				return "ok";
			}else{
				return "no";
			}
		}else{
			return "norecord";
		}
	}

}
?>