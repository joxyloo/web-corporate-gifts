<?php 

include_once 'database.php';

$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['create'])){

	try{

		$stmt = $conn->prepare("INSERT INTO tbl_customers_a160195_pt2(fld_customer_num, fld_customer_name, fld_customer_points) VALUES (:cid, :name, :points)");

		$stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindParam(':points', $points, PDO::PARAM_INT);
	
		$cid = $_POST['cid'];
		$name = $_POST['name'];
		$points = $_POST['points'];
	

		$stmt->execute();

	}

	catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
}

//update
if (isset($_POST['update'])){

	try{

		$stmt = $conn->prepare("UPDATE tbl_customers_a160195_pt2 SET fld_customer_num = :cid, fld_customer_name = :name, fld_customer_points = :points WHERE fld_customer_num = :oldcid");

		$stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindParam(':points', $points, PDO::PARAM_STR);
		$stmt->bindParam(':oldcid', $oldcid, PDO::PARAM_STR);


		$cid = $_POST['cid'];
		$name = $_POST['name'];
		$points = $_POST['points'];
		$oldcid = $_POST['oldcid'];

		$stmt->execute();

		header("Location: customers.php");

	}
	catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
}

//delete
if (isset($_GET['delete'])){

	try{

		$stmt = $conn->prepare("DELETE FROM tbl_customers_a160195_pt2 WHERE fld_customer_num = :cid");

		$stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
		

		$cid = $_GET['delete'];
		

		$stmt->execute();

		header("Location: customers.php");

	}

	catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
}

//edit
if (isset($_GET['edit'])){

	try{

		$stmt = $conn->prepare("SELECT * FROM tbl_customers_a160195_pt2 WHERE fld_customer_num = :cid");

		$stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
		

		$cid = $_GET['edit'];
		

		$stmt->execute();

		$editrow = $stmt->fetch(PDO::FETCH_ASSOC);

	}

	catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
}

	$conn = null;
 ?>


