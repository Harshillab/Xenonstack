<?php

include('db.php');
session_start();
    
if(isset($_SESSION["id"])) {

    $id = $_SESSION['id'];

    $m = mysqli_query($con,"SELECT * FROM `password` WHERE id = '".$id."' ");
    $r = mysqli_fetch_assoc($m);
    
        $password2 = $r['userpassword'];

        $r1 = explode(" " , $password2 );
        print_r($r1);

        $k =mysqli_query($con,"SELECT `password` FROM  `usertable1` WHERE  id = '". $id ."'");
        $row = mysqli_fetch_assoc($k);

    
    $password1 = $row['password'];

    if(isset($_POST['submit'])){
            $newpassword = $_POST['get_password'];
            if( $password1 == $newpassword || $r1[0] == $newpassword ){
              echo "";
            }
            else{
              echo "";
            }

            $password = $_POST["get_password"];
            $cpassword = $_POST["get_cpassword"];

            $n[] = $password;
            $nam1 = $n;
            if(isset($nam1)){
                $name1 = implode('',$nam1);
            }
            

                if ($password == $cpassword && !empty($password) && !empty($cpassword) && $password1 != $password && $r1[0] != $password) {
                        $query = mysqli_query($con,"UPDATE `usertable1` SET `password` = '$cpassword' WHERE id = '". $id ."'");
                        echo "<h3 style='color:green;'>Password Modified Successfully</h3><br><br> ";
                        $qu = mysqli_query($con,"UPDATE `password` SET `userpassword` = '$password1 $name1' , `id` = '$id' WHERE id = '". $id ."'");
                        session_destroy();
                    }
                else {
                        echo "<h3 style='color:red;'>Could Not Modify your password</h3>";
                        session_destroy();
                }
        }

       }
   
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
            margin: 0 auto;
            text-align: center; 
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
        display: contents;
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
        input[type=text],input[type=password],input[type=date],select
        {
            padding:8px;
            color:black;
            /* width: 60%; */
            border-radius: 12px;
            
        }

        .half{
            float: left;
            position: relative;
            left: 43px;
            bottom: -50px;
            width: 58%;
        } 
        .half1{
            top:-90px;
            position: relative;
        }

        i.fa.fa-key.icon {
            position: relative;
            top: 30px;
            right: 295px;
        }
       form{
            text-align: center;
            background: lightgray;
            margin: 0 40%;
            margin-top: 200px;
        }
        h3{
            height: 10%;
            color:red;
            margin-right: 40;
        }

        

        
    </style>
</head>
<body>

<form action="" method="post">
<h1>Enter New Password</h1>
<tr><td>Password:<br> <input type="password" name="get_password"  placeholder="Enter your new Password"></td></tr><br><br>
<tr><td>Confirm Password:<br> <input type="password" name="get_cpassword"  placeholder="Please re-enter your password"></td></tr><br><br>
<tr><td><input type='submit' value='Submit' class="btn btn-success" name="submit"> </td></tr>
</form>

</body>
</html>





<!-- 
//       $k =mysqli_query($con,"SELECT `password` FROM  `usertable1` WHERE  id = '". $id ."'");
//       $row = mysqli_fetch_assoc($k);
//       print_r($row);
//       $password1 = $row['password']; 
//     echo $password1;
//     if(isset($_POST['submit'])){
//         $newpassword = $_POST['get_password'];
//         if( $password1 == $newpassword){
//             echo "You can't use your old password";
//           }
//           else{
//            $query = mysqli_query($con,"UPDATE `usertable1` SET `password` = '$newpassword' WHERE id = '". $id ."'");
//           }
//       }
// } -->