<?php

// connect to DataBAse

// paramter = host , username , password , database
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con , 'userregistration'); 
// check the connection
// if(!$con){
//     echo 'Conecction Error: ' . mysqli_connect_error();
// }

if(mysqli_connect_errno()){
    echo 'Conecction Error: ' . mysqli_connect_error();
}

?>


