<?php 

include 'database.php';

 session_start();

if (!isset($_SESSION['fld_staff_num'])){ 
    header("Location:login.php");
    die();
}

$currentuserid = $_SESSION['fld_staff_num'];

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {

    $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a160195_pt2 where fld_staff_num = :sid");
   
    $stmt->bindParam(':sid', $currentuserid, PDO::PARAM_STR);
            
    $stmt->execute();
 
    $currentuser = $stmt->fetch(PDO::FETCH_ASSOC);

    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }


 ?>
<head>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
 <style type="text/css">
   .navbar{
     
     font: 14px "Montserrat", sans-serif;
      
   }
 </style>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">BEST Corporate Gifts and Souvenirs</a>
    </div>
 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
    </ul>

    <ul class="nav navbar-nav">
      <li><a href="search.php">Search Product</a></li>
    </ul>
  

     <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php">Logout</a></li>
    </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="products.php">Products</a></li>
            <li><a href="customers.php">Customers</a></li>
            <li><a href="staffs.php">Staffs</a></li>
            <li><a href="orders.php">Orders</a></li>
          </ul>

         

   
        </li>
      </ul>
    
        <ul class="nav navbar-nav navbar-right">
        <li><a style="color: Black; font-weight: bold; font-size: 20px;"> <?php  echo $currentuser['fld_staff_name']; ?></a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>