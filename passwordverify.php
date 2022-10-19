<?php

include_once 'db.php';

session_start();

if(isset($_POST['id'])){
    $id = stripslashes($_REQUEST['id']);    // removes backslashes
    $id = mysqli_real_escape_string($con, $id);
    $random = stripslashes($_REQUEST['random']);    // removes backslashes
    $random = mysqli_real_escape_string($con, $random);
    // Check user is exist in the database
    $s    = "SELECT * FROM `usertable1` WHERE id='$id' AND random='$random'" ;


$message="";
if(count($_POST)>0) {
$con = mysqli_connect('localhost','root','','userregistration') or die('Unable To connect');
$result = mysqli_query($con,"SELECT * FROM usertable1 WHERE id='" . $_POST["id"] . "' and random = '". $_POST["random"]."'");
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
// $_SESSION["id"] = "1";
$_SESSION["id"] ="$id";
$_SESSION["random"] = "$random";
} else {
$message = "Invalid Username or Password!";
}
}

}
// if(isset($_SESSION["id"])) {
// header("Location:passwordverify.php");
// }  

if(isset($_POST['submit']))
{
    $userid = $_POST['id'];
    $random = $_POST['random'];
    
    $result = mysqli_query($con,"SELECT * FROM usertable1 where id='" . $_POST['id'] . "'");
    $row = mysqli_fetch_assoc($result);
	
    $fetch_id=$row['id'];
    $fetch_random = $row['random'];
                if($userid == $fetch_id && $random == $fetch_random && !empty($userid) && !empty($random)){
                         echo "$id . $random";
                        header("Location: password.php?id=$userid");
                }
                    else{
                        echo '<h3>Invalid Username or Random Number</h3>';
                        // <h3 style='color:red;'>Could Not Modify your password</h3>
                    } 
}


?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }


 * {box-sizing: border-box;}
    body{
        background: radial-gradient(circle,rgba(255,0,255,0.8),blue);
        margin: 0 auto;
    text-align: center;
    }
    
        .btn {
        background-color: dodgerblue;
        color: white;
        padding: 15px 20px;
        border: none;
        cursor: pointer;
        /* width: 20%; */
        opacity: 0.9;
        border-radius: 12px;
        text-decoration: none;
        }

        .btn:hover {
        /* opacity: 0.4; */
        background-color: green;
        }
        input[type=text],input[type=password],input[type=date],select
        {
            padding:8px;
            color:black;
            /* width: 60%; */
            border-radius: 12px;
            
        }

        .left1 {
            position: relative;
            right: 90px;
        }

        .left2 {
            position: relative;
            right: 25px;
        }

        span.right1 {
            position: relative;
            left: 15px;
            top:-9px;
        }

        input[type="file"] {
            position: relative;
            left: 15px;
        }

        .half{
            float: left;
            position: relative;
            left: 43px;
            bottom: -50px;
            width: 58%;
        } 
       form{
             margin-top: 200px;
            margin-right: 100px; 
        }

        form {
            text-align: center;
            background: lightgray;
            margin: 0 40%;
            margin-top: 200px;
        }

        td {
            font-size: 22px;
            color: green;
        }

        h3{
            height: 10%;
            color:red;
            margin-right: 300p;
        }
</style>
</head>
<body>
<form action='passwordverify.php' method='post' align='center'>
<table cellspacing='5' align='center'>
<h1>Please enter your random number<h1>
<tr><td>UserId:</td><td><input type='text' name='id' placeholder = "Enter your UserId"/></td></tr>
<tr><td>Random Number:</td><td><input type='text' name='random' placeholder = "Enter your Random Number" /></td></tr>
<tr><td></td><td><input type='submit' name='submit'  class = "btn btn-success" /></td></tr>
</table>
</form>
</body>
</html>