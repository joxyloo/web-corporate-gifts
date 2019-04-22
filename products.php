<?php
  include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
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
.myform{
     background-color: #2F4F4F;
  color: #ffffff;
  padding-bottom: 25px;
}

.lightblue{
  background-color:  #F0F8FF; 
}

    </style>

  <title>BEST Corporate Gifts and Souvenirs Ordering System : Products</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>

  <?php include_once 'nav_bar.php'; ?>
 
<div class="container-fluid">
  <div class="row myform">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 myform">
      <div class="page-header">
        <h2>Create New Product</h2>
      </div>

    <form action="products.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">
      <!-- Product ID -->
      <input name="pid" type="text" class="form-control" id="productid" required placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_num']; ?>">
<!--       <input name="pid" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_num']; ?>"> 
 -->
      </div>
        </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
      <!-- Name -->
      <input name="name" type="text" class="form-control" id="productname" required placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>">
<!--       <input name="name" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>"> 
 -->
      </div>
        </div>

                
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Price (RM)</label>
          <div class="col-sm-9">
      <!-- Price (RM) -->
      <input name="price" type="number" class="form-control" id="productprice" required placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>">
      <!-- <input name="price" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>">  -->

      </div>
        </div>
     <div class="form-group">
          <label for="productyear" class="col-sm-3 control-label">Category</label>
          <div class="col-sm-9">
      <!-- Category -->
      <select name="category" class="form-control" required id="productcategory">
         <option value="bottle" <?php if(isset($_GET['edit'])) if($editrow['fld_product_category']=="bottle") echo "selected"; ?>>Bottle</option>
        <option value="keychain" <?php if(isset($_GET['edit'])) if($editrow['fld_product_category']=="keychain") echo "selected"; ?>>Key Chain</option>
        <option value="lanyard" <?php if(isset($_GET['edit'])) if($editrow['fld_product_category']=="lanyard") echo "selected"; ?>>Lanyard</option>
        <option value="notebook" <?php if(isset($_GET['edit'])) if($editrow['fld_product_category']=="notebook") echo "selected"; ?>>Notebook</option>
        <option value="pen" <?php if(isset($_GET['edit'])) if($editrow['fld_product_category']=="pen") echo "selected"; ?>>Pen</option>
        <option value="umbrella" <?php if(isset($_GET['edit'])) if($editrow['fld_product_category']=="umbrella") echo "selected"; ?>>Umbrella</option>
      </select> 
      </div>
        </div>

        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Material</label>
          <div class="col-sm-9">   
      <!-- Material -->
      <input name="material" type="text" class="form-control" id="productmaterial" required placeholder="Product Material" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_material']; ?>">
            <!-- <input name="material" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_material']; ?>">  -->

          </div>
        </div>
        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Colour</label>
          <div class="col-sm-9">
      <!-- Colour -->
       <input name="colour" type="text" class="form-control" id="productcolour" required placeholder="Product Colour" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_colour']; ?>">
      <!-- <input name="colour" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_colour']; ?>">  -->
       </div>
        </div>
        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Made In</label>
          <div class="col-sm-9">

      <!-- Made In -->
      <input name="madein" type="text" class="form-control" id="madein" required placeholder="Made In" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_madein']; ?>">
            <!-- <input name="madein" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_madein']; ?>">  -->
             </div>
        </div>


        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>

      <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
      <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
      <!-- <button type="submit" name="update">Update</button> -->
      <?php } else { ?>
      <!-- <button type="submit" name="create">Create</button> -->
      <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
<?php } ?>
<button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
      <!-- <button type="reset">Clear</button> -->
        </div>
      </div>
    </form>
      </div>
      </div>


      <div class="row lightblue ">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
          <div class="page-header">
            <h2>Products List</h2>
          </div>
        </div>
      </div>


<div class="row lightblue">
<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
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
            <img src="products/<?php echo $readrow['fld_product_image']; ?>" alt="Product Image">
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
     </div>
   </div>


    <div class="row lightblue">
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
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
    </div>


  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>