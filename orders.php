<?php
  include_once 'orders_crud.php';
?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>BEST Corporate Gifts and Souvenirs Ordering System : Orders</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<style type="text/css">
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

th {
  background-color: #2F4F4F;
  color: white;
}
tr {background-color: #ffffff}
</style>

<body>
   <?php include_once 'nav_bar.php'; ?>
 
<div class="container-fluid">
   <div class="row myform">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Order</h2>
      </div>

    <form action="orders.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">
      <!-- Order ID -->
      <input name="oid" type="text" readonly class="form-control" id="orderid" placeholder="Order ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_num']; ?>">
<!--       <input name="oid" type="text" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_num']; ?>"> <br>
 -->
      </div>
        </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Order Date</label>
          <div class="col-sm-9">
      <!-- Order Date -->

      <input name="orderdate" type="text" readonly class="form-control" id="orderdate" placeholder="Order Date" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_date']; ?>">
      <!-- <input name="orderdate" type="text" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_date']; ?>"> <br>
 -->
      </div>
        </div>
      <div class="form-group">
          <label for="staff" class="col-sm-3 control-label">Staff</label>
          <div class="col-sm-9">
      <select name="sid" class="form-control" id="staffid" required>
        <option value="">Please select</option>
      <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a160195_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $staffrow) {
      ?>
<!--         <?php if((isset($_GET['edit'])) && ($editrow['fld_staff_num']==$staffrow['fld_staff_num'])) { ?>
          <option value="<?php echo $staffrow['fld_staff_num']; ?>" selected><?php echo $staffrow['fld_staff_fname']." ".$staffrow['fld_staff_lname'];?></option>
        <?php } else { ?>
          <option value="<?php echo $staffrow['fld_staff_num']; ?>"><?php echo $staffrow['fld_staff_fname']." ".$staffrow['fld_staff_lname'];?></option>
        <?php } ?> -->

          <?php if((isset($_GET['edit'])) && ($editrow['fld_staff_num']==$staffrow['fld_staff_num'])) { ?>
          <option value="<?php echo $staffrow['fld_staff_num']; ?>" selected><?php echo $staffrow['fld_staff_name'];?></option>
        <?php } else { ?>
          <option value="<?php echo $staffrow['fld_staff_num']; ?>"><?php echo $staffrow['fld_staff_name'];?></option>
        <?php } ?>


      <?php
      } // while
      $conn = null;
      ?> 
      </select> <br>
       </div>
        </div>
        <div class="form-group">
          <label for="customer" class="col-sm-3 control-label">Customer</label>
          <div class="col-sm-9">
  
      <select name="cid" class="form-control" id="customerid" required>
        <option value="">Please select</option>
      <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_customers_a160195_pt2");
        $stmt->execute();
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $custrow) {
      ?>
        <?php if((isset($_GET['edit'])) && ($editrow['fld_customer_num']==$custrow['fld_customer_num'])) { ?>
          <option value="<?php echo $custrow['fld_customer_num']; ?>" selected><?php echo $custrow['fld_customer_name']; ?></option>
        <?php } else { ?>
          <option value="<?php echo $custrow['fld_customer_num']; ?>"><?php echo $custrow['fld_customer_name'];?></option>
        <?php } ?>
      <?php
      } // while
      $conn = null;
      ?> 
      </select> <br>
      </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
      <?php if (isset($_GET['edit'])) { ?>

      <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>  
      <!-- <button type="submit" name="update">Update</button> -->
      <?php } else { ?>
      <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
      <!-- <button type="submit" name="create">Create</button> -->
      <?php } ?>
      <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
      <!-- <button type="reset">Clear</button> -->
      </div>
      </div>
    </form>
    </div>
      </div>
<div class="row lightblue">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Order List</h2>
      </div>
      <table class="table table-bordered">

      <tr>
         <th>Order ID</th>
          <th>Date</th>
          <th>Staff Name</th>
          <th>Customer Name</th>
          <th></th>
      </tr>
      <?php

      $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbl_orders_a160195, tbl_staffs_a160195_pt2, tbl_customers_a160195_pt2 WHERE ";
        $sql = $sql."tbl_orders_a160195.fld_staff_num = tbl_staffs_a160195_pt2.fld_staff_num and ";
        $sql = $sql."tbl_orders_a160195.fld_customer_num = tbl_customers_a160195_pt2.fld_customer_num";
        // $stmt = $conn->prepare($sql);
        $stmt = $conn->prepare($sql." LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $orderrow) {
      ?>
      <tr>
        <td><?php echo $orderrow['fld_order_num']; ?></td>
        <td><?php echo $orderrow['fld_order_date']; ?></td>
        <td><?php echo $orderrow['fld_staff_name']; ?></td>
        <td><?php echo $orderrow['fld_customer_name']; ?></td>
        <td>
         
          <a href="orders_details.php?oid=<?php echo $orderrow['fld_order_num']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="orders.php?edit=<?php echo $orderrow['fld_order_num']; ?>" class="btn btn-success btn-xs" role="button">Edit</a>
          
           <a href="orders.php?delete=<?php echo $orderrow['fld_order_num']; ?>" class="btn btn-danger btn-xs" role="button" onclick="return confirm('Are you sure to delete?');">Delete</a>

        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>
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
            $stmt = $conn->prepare("SELECT * FROM tbl_orders_a160195");
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
            <li><a href="orders.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"orders.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"orders.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="orders.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
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