<?php

    if(isset($_POST["submit"])){
        $selector = $_POST["selector"];
        $validator = $_POST["validator"];
        $password = $_POST["pwd"];
        $passwordRepeat = $_POST["pwd-repeat"];

        if(empty($password) || empty($passwordRepeat)){
            header("Location:../create-new-password.php?newpwd=empty");  
            exit();
        }elseif($password != $passwordRepeat){
            header("Location:../create-new-password.php?newpwd=pwdnotsame");
            exit();
        }

        $currentDate = date("U");

        require 'db.php';

        $sql = "SELECT * FROM pwdReset Where pwdResetSelector=? AND pwdResetExpires >= ?";
        $stmt = mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                    echo "There was an error";
                    exit();
                }else{
                    mysqli_stmt_bind_param($stmt,"s",$selector);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                    if(!$row = mysqli_fetch_assoc($result)){
                        echo "You need to re-submit your reset request.";
                        exit();
                    }else{

                        $tokenBin = hex2bin($validator);
                        $tokenCheck = password_verify($tokenBin,$row["pwdResetToken"]);
                    
                        if($tokenCheck == false){
                            echo "You need to re-submit your reset request.";
                            exit();
                        }elseif($tokenCheck == true){
                            
                            $tokenEmail = $row['pwdResetEmail'];


                            $sql= "SELECT * FROM usertable1 Where email=?;";

                            $stmt = mysqli_stmt_init($con);
                            if(!mysqli_stmt_prepare($stmt,$sql)){
                                echo "There was an error";
                                exit();
                            }else{
                                mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                if(!$row = mysqli_fetch_assoc($result)){
                                    echo "You need to re-submit your reset request.";
                                    exit();
                                }else{
                                    
                                    $sql = "UPDATE usertable1 Set user=? Where email=?";
                                    
                                    $stmt = mysqli_stmt_init($con);
                                        if(!mysqli_stmt_prepare($stmt,$sql)){
                                            echo "There was an error";
                                            exit();
                                    }else{
                                        $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                                        mysqli_stmt_bind_param($stmt,"ss",$newPwdHash,$tokenEmail);
                                        mysqli_stmt_execute($stmt);



                                        $sql = "DELETE FROM pwdReset Where pwdReset Email=?";
                                        $stmt = mysqli_stmt_init($con);
                                        if(!mysqli_stmt_prepare($stmt,$sql)){
                                            echo "There was an error";
                                            exit();
                                    }else{
                                            mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                                             mysqli_stmt_execute($stmt);
                                             header("Location: registration.php?newpwd=passwordupdated");
                                        }
                                    }
                                }
                    
                            }
                        }
                    }
                }
    
        }else{
            header("Location: registration.php ");  
        }

?>