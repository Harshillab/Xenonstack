<!-- http://localhost/phpmyadmin/sql.php?db=userregistration&table=usertable&pos=0 -->
<!-- <?php  include('design.php'); ?> -->
<?php


// require('/db.php');  
include('db.php');

session_start();

if (isset($_POST['email'])) {
  $email = stripslashes($_REQUEST['email']);    // removes backslashes
  $email = mysqli_real_escape_string($con, $email);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($con, $password);
  // Check user is exist in the database
  $s    = "SELECT * FROM `adminlogin` WHERE email='$email'
               AND password='$password'";



$message="";
if(count($_POST)>0) {
$con = mysqli_connect('localhost','root','','userregistration') or die('Unable To connect');
$result = mysqli_query($con,"SELECT * FROM adminlogin WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
// $_SESSION["id"] = "1";
$_SESSION["email"] ="admin@gmail.com";
$_SESSION['password']="admin";
} else {
$message = "Invalid Username or Password!";
}
}
if(isset($_SESSION["id"])) {
header("Location:index.php");
}              

  $result = mysqli_query($con , $s) or die(mysqli_error($con));
  $rows = mysqli_num_rows($result);
  if ($rows == 1) {
      $_SESSION['email'] = $email;
      // Redirect to user dashboard page
      header("Location: welcome.php");
  } else {
      echo "<div class='form'>
            <h3>Incorrect Username/password. </h3><br/>
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
        width: 21%;
        opacity: 0.9;
        border-radius: 12px;
        text-decoration: none;
        }

        .btn:hover {
        /* opacity: 0.4; */
        background-color: green;
        }
        a {
        color: black;
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
<div class="h">
    <center>
        
        <form action="Admin.php" method="POST">
        <div class="message">
            <?php $message="";
            if($message!="") { echo $message; } 
            ?></div>
        <h2 > Admin Login Here </h2>
            <div class="input-container">
            <i class="fa fa-envelope icon" style="font-size:24px; margin-left:23%;"></i>
            <input type="text" name="email" class="form-control" placeholder="Username">
            </div>
            <div class="input-container">
            <i class="fa fa-key icon" style="font-size:24px; margin-left:23%"></i>
            <input type="password" name="password" class="form-control"  placeholder="Password">
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary"> Log In </button>
            </form><br>
            <a href="registration.php" class="btn btn-primary">Register</a><br><br><br>
            <a href="user.php" class="btn btn-primary">User Login</a>
    </center>
    </div>
    </div>
    </div>
    </div>
<?php
    }
?>