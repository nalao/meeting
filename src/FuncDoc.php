<?php 

class FuncDoc{
	private $conn;
	private $target_file = "../files/";
	public $tmp_name;
	public $filename;
	public $type;
	public $uploadfile;

	function __construct($db){
		$this->conn = $db;
	}

	public function upload(){
		
		if (move_uploaded_file($this->tmp_name, $this->target_file.$this->filename)) {
	        echo "The file ". basename( $this->filename). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}

}

 ?>