<?php 

	include "ConnectDb.php";
	include "FuncDoc.php";

	$database = new ConnectDb();
	$conn = $database->getConnection();
	if(isset($_POST["submit"])) {
		$funcDoc = new FuncDoc($conn);
		$funcDoc->tmp_name = $_FILES["file"]["tmp_name"];
		$funcDoc->filename = $_FILES["file"]["name"];

		echo $funcDoc->upload();
		
	}


 ?>
<form action="test.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file">
	<input type="submit" name="submit" value="submit">
</form>