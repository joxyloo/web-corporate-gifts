<?php include 'database.php' ?>

<!DOCTYPE html>
<html>
<head>

   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>BEST Corporate Gifts and Souvenirs Ordering System : Search</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">


.thumbnail img {
    height:150px;
    width:60%;
}


.row.display-flex {
  display: flex;
  flex-wrap: wrap;
}
.thumbnail {
  height: 90%;
}

/* extra positioning */
.thumbnail {
  display: flex;
  flex-direction: column;
}

.thumbnail .caption {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 90%;
}


  .row{
  font: 14px "Lato", sans-serif;
}


    </style>

</head>
<body>

   <?php include_once 'nav_bar.php'; ?>

 
<div class="container-fluid">

  <div class="row">

    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

      <div class="page-header">
        <h2>Product Search</h2>
      </div>


      <form action="search.php" method="post" class="form-horizontal">

         <div class="form-group">
            <label for="keyword" class="col-sm-3 control-label">Search</label>
            <div class="col-sm-9">

            <input name="keyword" type="text" class="form-control" id="keyword" placeholder="Please enter product name/category/colour/material" required> 

            </div>
          </div>
       
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
            <button class="btn btn-default" type="submit" name="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</button>
            <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
            </div>
          </div>
      </form>

<?php 

if(isset($_POST['search'])||isset($_GET['page'])){

if(isset($_POST['search'])){
  $keyword = $_POST['keyword'];
  
  $_SESSION['searchkeyword'] = $keyword;
}

else{
  
  $keyword = $_SESSION['searchkeyword'];
}

 ?>


  <div class="page-header">
    <h2>Result for '<?php echo $keyword; ?>' 
    
    <form action="search.php" method="post" class="form-horizontal">
      <button class="btn btn-default" type="submit" name="all">All Products</button>
    </form>  
   
    
      
    </h2>
   </div>

<div class="row display-flex">
 <?php
      // Read
  $per_page = 6;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;

      try {
        // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //   // $stmt = $conn->prepare("SELECT * FROM tbl_products_a160195_pt2");
        //    $stmt = $conn->prepare("select * from tbl_products_a160195_pt2 LIMIT $start_from, $per_page");
        // $stmt->execute();
        // $result = $stmt->fetchAll();

        $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM tbl_products_a160195_pt2 WHERE 
                    fld_product_name LIKE '%$keyword%' or 
                    fld_product_category LIKE '%$keyword%' or 
                    fld_product_colour LIKE '%$keyword%' or  
                    fld_product_material LIKE '%$keyword%' or 
                    fld_product_num LIKE '%$keyword%' LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();

      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }?> 

 
      <?php 
      foreach($result as $readrow) {
      ?>   

        <div class="col-xs-12 col-sm-6 col-md-4 ">
          <div class="thumbnail">
            <img src="products/<?php echo $readrow['fld_product_image']; ?>" alt="<?php echo $readrow['fld_product_image']; ?>">
            <div class="caption">
              <h3><?php echo $readrow['fld_product_num']." ".$readrow['fld_product_name']; ?></h3>
              <p>

        Price: RM <?php echo $readrow['fld_product_price']; ?><br>
        Colour: <?php echo $readrow['fld_product_colour']; ?>

              </p>
              <p><a href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
</p>
            </div>
          </div>
        </div>
     



 <?php
      }

      if(sizeof($result) == 0){
        echo "No result found";
      }

      $conn = null;
      ?>

       </div>

   <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a160195_pt2 WHERE 
            fld_product_name LIKE '%$keyword%' or 
            fld_product_category LIKE '%$keyword%' or 
            fld_product_colour LIKE '%$keyword%' or  
            fld_product_material LIKE '%$keyword%' or 
            fld_product_num LIKE '%$keyword%'");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="search.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"search.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"search.php?page=$i\">$i</a></li>";
          ?>

          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="search.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
    </div>

<?php } ?>

<?php if(isset($_POST["all"]) || isset($_GET['pg'])){
?>
    <div class="page-header">
    <h2>All Products</h2>
   </div>

<div class="row display-flex">
 <?php
      // Read
  $per_page = 6;
      if (isset($_GET["pg"]))
        $page = $_GET["pg"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          // $stmt = $conn->prepare("SELECT * FROM tbl_products_a160195_pt2");
           $stmt = $conn->prepare("select * from tbl_products_a160195_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();

      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }?> 

 
      <?php 
      foreach($result as $readrow) {
      ?>   

        <div class="col-xs-12 col-sm-6 col-md-4 ">
          <div class="thumbnail">
            <img src="products/<?php echo $readrow['fld_product_image']; ?>" alt="<?php echo $readrow['fld_product_image']; ?>">
            <div class="caption">
              <h3><?php echo $readrow['fld_product_num']." ".$readrow['fld_product_name']; ?></h3>
              <p>

        Price: RM <?php echo $readrow['fld_product_price']; ?><br>
        Colour: <?php echo $readrow['fld_product_colour']; ?>

              </p>
              <p><a href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
</p>
            </div>
          </div>
        </div>

 <?php
      }


      $conn = null;
      ?>

       </div>

   <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a160195_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="search.php?pg=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"search.php?pg=$i\">$i</a></li>";
            else
              echo "<li><a href=\"search.php?pg=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="search.php?pg=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
    </div>



<?php } ?>


 

 


    </div>

  </div>

  
</div>

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>