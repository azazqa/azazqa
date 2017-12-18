<?php 
	@session_start();

	include "../pdo/connect.php";

	
if($_SERVER['REQUEST_METHOD'] == "POST"){

	$title = $_POST['title'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$description = $_POST['description'];
	$regdate = date('Y-m-d');
	
	try{
		$connect = new Database();
		$con = $connect->connect();
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare("INSERT INTO test (title, name, description, regdate) 
	    VALUES (:title, :name, :description, :regdate)");
	    $stmt->bindParam(':title', $title);
	    $stmt->bindParam(':name', $name);
	    $stmt->bindParam(':description', $description);
	    $stmt->bindParam(':regdate', $regdate);

	    $stmt->execute();
		$last_id = $conn->lastInsertId();
    

		$target_dir = "../test_upload/".$last_id."/test_img/";
		$target_file = $target_dir . basename($_FILES["test"]["name"]);
		foreach ($_FILES["test"]["error"] as $key => $error) {
		    if ($error = UPLOAD_ERR_OK) {
		        $tmp_name = $_FILES["test"]["tmp_name"][$key];
		        $name = $_FILES["test"]["name"][$key];
		        move_uploaded_file($tmp_name, $target_file);
		    }
		}


		$target_dir = "../test_upload/".$last_id."/result/";
		$target_file = $target_dir . basename($_FILES["result"]["name"]);		
		foreach ($_FILES["result"]["error"] as $key => $error) {
		    if ($error = UPLOAD_ERR_OK) {
		        $tmp_name = $_FILES["result"]["tmp_name"][$key];
		        $name = $_FILES["result"]["name"][$key];
		        move_uploaded_file($tmp_name, $target_file);
		    }
		}

	}catch(PDOException $e){
    	echo "Error: " . $e->getMessage();
    }

    $con = null;
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
</head>
<body>
	<form method="post" enctype="multipart/form-data">
		<input type="text" name="title">
		<input type="text" name="name">
		<input type="text" name="description">

		<input type="file" name="test[]">
		<input type="file" name="test[]">
		<input type="file" name="test[]">
		<input type="file" name="test[]">

		<input type="file" name="result[]">
		<input type="file" name="result[]">
		<input type="file" name="result[]">
		<input type="file" name="result[]">
		<input type="file" name="result[]">
		<input type="submit" value="등록">
	</form>
</body>
</html>