<?php
  include_once 'login_validate.php';
?>

<!DOCTYPE html>
<html>
<head>

   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>BEST Corporate Gifts and Souvenirs Ordering System : Login</title>

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
</style>

<body>

  

 
<div class="container-fluid">

<img src="logo.jpg" align="center" width="13%" height="13%">

  <div class="row">

    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">

        <h2>Login</h2>
      </div>


    <form action="login.php" method="post" class="form-horizontal">

       <div class="form-group">
          <label for="staffid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">
      <!-- Staff ID -->
      <input name="sid" type="text" class="form-control" id="staffid" placeholder="Staff ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_num']; ?>" required> 
      <div class=="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
               <span class="help-block"><?php echo $username_err; ?></span>
            </div>
       </div>
      </div>
            

       
      <div class="form-group">
        <label for="staffpassword" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-9">
      <!-- Name -->
        <input name="staffpassword" type="password" class="form-control" id="staffpassword" placeholder="Staff Password" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_password']; ?>" pattern=".{6,}" required> 
         <div class=="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
               <span class="help-block"><?php echo $password_err; ?></span>
            </div>

      </div>
      </div>
            
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
      <button class="btn btn-success" type="submit" name="stafflogin">Login</button>
      
        </div>

      <!-- <button type="reset">Clear</button> -->

      </div>
      </div>

    </form>

    </div>
      </div>
  
  </div>

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>