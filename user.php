<!-- http://localhost/phpmyadmin/sql.php?db=userregistration&table=usertable&pos=0 -->
<?php


// require('/db.php');  
include('db.php');

session_start();

if (isset($_POST['user'])) {
  $user = stripslashes($_REQUEST['user']);    // removes backslashes
  $user = mysqli_real_escape_string($con, $user);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($con, $password);
  // Check user is exist in the database
  $s    = "SELECT * FROM `usertable1` WHERE user='$user'
               AND password='$password'" ;


// $message="";
// if(count($_POST)>0) {
// $con = mysqli_connect('localhost','root','','userregistration') or die('Unable To connect');
// $result = mysqli_query($con,"SELECT * FROM usertable1 WHERE user='" . $_POST["user"] . "' and password = '". $_POST["password"]."'");
// $row  = mysqli_fetch_array($result);
// if(is_array($row)) {
// // $_SESSION["id"] = "1";
// $_SESSION["user"] ="$user";
// $_SESSION['password']="$password";
// } else {
// $message = "Invalid Username or Password!";
// }
// }
// if(isset($_SESSION["id"])) {
// header("Location:index.php");
// }              


  $result = mysqli_query($con , $s) or die(mysqli_error($con));
  $rows = mysqli_num_rows($result);
  $r=mysqli_fetch_assoc($result);
  $status=$r['status'];
  if($status == '1'){
  if ($rows == 1) {
      $_SESSION['user'] = $user;
      // Redirect to user dashboard page
    header('Location: /Form/home.php'); 
  } else {
      echo "<div class='form'>
            <h3>Incorrect Username/password. </h3><br/>
            </div>";
    }
  }else{
    echo "<div class='form'>
    <h3>Your Id is Temporary Deactivated. </h3><br/>
    </div>";
} 
} else {

?>

<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>

* {box-sizing: border-box;}
    body{
        background: radial-gradient(circle,rgba(255,0,255,0.8),blue);
        /* margin:auto;
        padding: 150px; */
        justify-content: center;
        align-items: center;
        display: flex;
    }
    
  
        .input-icons i { 
            position: absolute; 
        } 
          
        .input-icons { 
            width: 100%; 
            margin-bottom: 10px; 
        } 
          
        .icon { 
            padding: 10px; 
            min-width: 40px; 
        } 
          
        .input-field { 
            width: 100%; 
            padding: 10px; 
            text-align: center; 
        } 
        .icon {
         padding: 10px;
        min-width: 50px;
        text-align: center;
        font-size: 24px;
        }
        .input-field {
        width: 90%;
        text-align: left;
        padding: 10px;
        outline: none;
        }
        .input-container {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        width: 125%;
        margin-bottom: 15px;
        font: 400 13.3333px Arial;
        

        }
        .btn {
        background-color: dodgerblue;
        color: white;
        padding: 15px 20px;
        border: none;
        cursor: pointer;
        width: 20%;
        opacity: 0.9;
        border-radius: 12px;
        text-decoration: none;
        }

        .btn:hover {
        /* opacity: 0.4; */
        background-color: green;
        }
        
        .input-birth {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        width: 125%;
        margin-bottom: 15px;
        }
        .h{
        width:500px;
        height:365px;
        background: lightgray;
        border: 1px solid black;
        margin-bottom: 15px;
        }
        .input-contain{
            width:80%;
        }
        a:link {
        background-color: dodgerblue;
        color: white;
        padding: 15px 20px;
        border: none;
        cursor: pointer;
        width: 20%;
        opacity: 0.9;
        border-radius: 12px;
        }
</style>
</head>
<body>
<div class="h">
        <center>
        
        <form action="user.php" method="POST">
        <!-- <div class="message">
            
            </div> -->
        <h2 > User Login Here </h2>
            <div class="input-container">
            <i class="fa fa-user icon" style="font-size:24px; margin-left:20%"></i>
            <input type="text" name="user" class="form-control" placeholder="Username">
            </div>

            <div class="input-container">
            <i class="fa fa-key icon"  style="font-size: 24px; margin-left:20%"></i>
            <input type="password" name="password" class="form-control" placeholder="Password">
            </div>

            <button type="submit" name="submit"class="btn btn-primary" > Log In </button><br><br>
            </form>


            <a href="registration.php" class="btn btn-primary">Register</a><br><br><br>
            <a href="Admin.php" class="btn btn-primary">Admin Login</a> 
            <a href="pass.php" class="btn btn-primary">Forget Your Password?</a> 
        
      </center>
    </div>
    </div>
    </div>
    </div>
    </body>
</html>
<?php
    }
?>


