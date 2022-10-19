<?php

if(isset($_POST["submit"])){

    $selector = bin2hex(random_bytes(8));    
    $token= random_bytes(32);

    $url = "localhost/forgottenpwd/create-new-password.php?selector=" . $selector ."&validator=".bin2hex($token); 

    $expires = date("U") + 1800;

    require 'db.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset Where pwdReset Email=?";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "There was an error";
        exit();
    }else{
        mysqli_stmt_bind_param($stmt,"s",$userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail,pwdResetSelector,pwdResetToken, pwdResetExpires) VALUES(?,?,?,?);";

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "There was an error";
        exit();
    }else{

        $hashedToken= password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"ssss",$userEmail,$selector,$hashedToken,$expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);

    $to= $userEmail;
    $subject= 'Reset your password';
    $message='<p>Password Reset Request. Click to reset ';
    $message .='<p> Here is the password reset link:</br>';
    $message .= '<a href= "'.$url. '">'.$url. '</a></p>';

    $headers = "From: harshilagarwal55570@gmail.com\r\n";
    $headers .= "Reply-To:harshilagarwal048@gmail.com \r\n";
    $headers .= "Content-type: text/html\r\n ";

    mail($to, $subject,$headers);


    header("Location: resetpass.php?reset=success");

}else{
    header("location:registration.php");
}

?>