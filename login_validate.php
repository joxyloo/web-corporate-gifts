<?php 

include_once 'database.php';

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["sid"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["sid"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['staffpassword']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['staffpassword']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        
        if($stmt = $pdo->prepare("SELECT fld_staff_num, fld_staff_password FROM tbl_staffs_a160195_pt2 WHERE fld_staff_num = :username")){
            // Bind variables to the prepared statement as parameters
           $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            
            // Set parameters 
            $param_username = trim($_POST["sid"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $database_password = $row['fld_staff_password'];
                        if($database_password == $password){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['fld_staff_num'] = $username;      
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}

 ?>