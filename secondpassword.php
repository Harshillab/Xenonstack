<?php

include('db.php');
session_start();
    
if(isset($_SESSION["id"])) {

    $id = $_SESSION['id'];

    $s = " SELECT * FROM `password` WHERE id = '".$id."' ";

    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result);


    $reg = "insert into `secondpassword`(secondpassword) values('$password1') ";

    mysqli_query($con, $reg);
    
    header('Location: /Form/home.php'); 
        
     }
   
?>


