<?php 

include_once 'database.php';

$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//create
if(isset($_POST['create'])){

	try{

		$stmt = $conn->prepare("INSERT INTO tbl_products_a160195_pt2(fld_product_num,
			fld_product_name, fld_product_price, fld_product_category, fld_product_colour,
			fld_product_material, fld_product_madein) VALUES(:pid, :name, :price, :category, :material, :colour, :madein)");

		$stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindParam(':price', $price, PDO::PARAM_INT);
		$stmt->bindParam(':category', $category, PDO::PARAM_STR);
		$stmt->bindParam(':material', $material, PDO::PARAM_STR);
		$stmt->bindParam(':colour', $colour, PDO::PARAM_STR);
		$stmt->bindParam(':madein', $madein, PDO::PARAM_INT);

		$pid = $_POST['pid'];
		$name = $_POST['name'];
		$price = $_POST['price'];
		$category = $_POST['category'];
		$material = $_POST['material'];
		$colour = $_POST['colour'];
		$madein = $_POST['madein'];

		$stmt->execute();
	}

	catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
}

//update
if(isset($_POST['update'])){

	try{

		$stmt = $conn->prepare("UPDATE tbl_products_a160195_pt2 SET fld_product_num = :pid, fld_product_name = :name, fld_product_price = :price, fld_product_category = :category, fld_product_material = :material, fld_product_colour = :colour, fld_product_madein = :madein WHERE fld_product_num = :oldpid");

		$stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->bindParam(':price', $price, PDO::PARAM_INT);
		$stmt->bindParam(':category', $brnad, PDO::PARAM_STR);
		$stmt->bindParam(':material', $material, PDO::PARAM_STR);
		$stmt->bindParam(':colour', $colour, PDO::PARAM_STR);
		$stmt->bindParam(':madein', $madein, PDO::PARAM_STR);
		$stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);

		$pid = $_POST['pid'];
		$name = $_POST['name'];
		$price = $_POST['price'];
		$category = $_POST['category'];
		$material = $_POST['material'];
		$colour = $_POST['colour'];
		$madein = $_POST['madein'];
		$oldpid = $_POST['oldpid'];

		$stmt->execute();

		header("Location: products.php");
	}

	catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
}

//delete
if(isset($_GET['delete'])){

	try{

		$stmt = $conn->prepare("DELETE FROM tbl_products_a160195_pt2 WHERE fld_product_num = :pid");

		$stmt->bindParam(':pid', $pid, PDO::PARAM_STR);

		$pid = $_GET['delete'];

		$stmt->execute();

		header("Location: products.php");
	}

	catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
}

//edit
if(isset($_GET['edit'])){

	try{

		$stmt = $conn->prepare("SELECT * FROM tbl_products_a160195_pt2 WHERE fld_product_num = :pid");

		$stmt->bindParam(':pid', $pid, PDO::PARAM_STR);

		$pid = $_GET['edit'];

		$stmt->execute();

		$editrow = $stmt->fetch(PDO::FETCH_ASSOC);
	}

	catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
}

	$conn = null;

 ?>
