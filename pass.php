<?php

include_once 'db.php';

session_start();

if(isset($_POST['id'])){
    $id = stripslashes($_REQUEST['id']);    // removes backslashes
    $id = mysqli_real_escape_string($con, $id);
    $questions = stripslashes($_REQUEST['questions']);    // removes backslashes
    $questions = mysqli_real_escape_string($con, $questions);
    $answer = stripslashes($_REQUEST['answer']);    // removes backslashes
    $answer = mysqli_real_escape_string($con, $answer);
    // $user = stripslashes($_REQUEST['user']);    // removes backslashes
    // $user = mysqli_real_escape_string($con, $user);
    $password = stripslashes($_REQUEST['password']);    // removes backslashes
    $password = mysqli_real_escape_string($con, $password);
    // Check user is exist in the database
    $s    = "SELECT * FROM `usertable1` WHERE id='$id', questions = '$questions' AND answer = '$answer' " ;

    $userid = $_POST['id'];
    $questions = $_POST['questions'];
    $answer = $_POST['answer'];
    // $user = $_POST['user'];
    $password = $_POST['password'];

    $result = mysqli_query($con,"SELECT * FROM usertable1 where id='" . $_POST['id'] . "'");
    $row = mysqli_fetch_assoc($result);
	
    $fetch_id=$row['id'];
    $fetch_questions = $row['questions'];
    $fetch_answer = $row['answer'];

    // $fetch_user = $row['user'];
    $fetch_password = $row['password'];

    // $q = mysqli_query($con,"UPDATE `password` SET `id` = '$userid' WHERE name = '". $fetch_user."'");
    $q = mysqli_query($con,"UPDATE `mypassword` SET `id` = '$userid' WHERE password1 = '". $fetch_password."'");

                if($userid == $fetch_id && $questions == $fetch_questions && $answer == $fetch_answer && !empty($userid) && !empty($questions) && !empty($answer) ){
                        $_SESSION['id'] = $userid;
                        // header("Location: password.php");
                        header("Location: threepassword.php");
                }
                    else{
                        echo '<h3>Invalid Username or Random Number</h3>';

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
            margin: 0 35%;
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
<form action='pass.php' method='post' align='center'>
<table cellspacing='5' align='center'>
    <h1>Please enter your Details<h1>
        <tr><td>UserId:</td><td><input type='text' name='id' placeholder = "Enter your UserId"/></td></tr>
        <tr><td>Security Questions:</td><td>
            <select name="questions" id="que" class="ll" style = "width: 175px ;">
            <option>Select Question</option>
            <option>Who is your best friend?</option>
            <option>Which is your favourite movie?</option>
            <option>Who is your favourite actor?</option>
            <option>Who is your favourite actress?</option>
            <option>What is your petname?</option>
            </select>
        </td></tr>
        <tr><td>Answer:</td><td>
            <input type="text" name="answer" class="form-control ll" placeholder = "Enter Your Answer"><br>
        </td></tr>
        <tr><td><input type='submit' name='submit'  class = "btn btn-success" />
                <a href="user.php" class = "btn btn-success" style = "font-size : 15px ;">Back</a>
        </td></tr>
</table>
</form>
</body>
</html>