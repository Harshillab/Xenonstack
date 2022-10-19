<!-- http://localhost/phpmyadmin/sql.php?db=userregistration&table=usertable&pos=0 -->

<!DOCTYPE html>
<html lang="en">


<?php
include('db.php');

session_start();

$user = $email = $password = $dob = $gender =  $city =  $state = $country = $image = '' ;
$errors = array('user'=> '' , 'email' => '' , 'password' => '' , 'dob'=>'', 
    'gender'=>'' , 'city' =>'' ,'state' => '' , 'country'=> '' , 'image' => '' );

$con = mysqli_connect('localhost', 'root','');

mysqli_select_db($con , 'userregistration');  

if(isset($_POST['submit'])){
    // $user = $_POST['user'];

    // check title
    if(empty($_POST['user'])){
        $errors['user'] = ' Title is required <br />';
    }else{
        $user = $_POST['user'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $user)){
            $errors['user'] = 'User must be letters and space only';
        }
    }
    // $email = $_POST['email'];

    // check email
    if(empty($_POST['email'])){
        $errors['email'] = 'An email is required <br />';
    }else{
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'email must be a vaild email address';
        }
    }

// $password = $_POST['password'];

    // check password
    if(empty($_POST['password'])){
        $errors['password'] = 'Password is required <br />';
    }else{
        $password = $_POST['password'];
        if(!preg_match('/^[a-zA-Z0-9\s]+$/', $password)){
            $errors['password'] = 'Password must be letters and space only';
        }
    }


    // if(empty($_POST['city'])){
    //     $msg_package = "You must select a city";
    // }
    // // image
    // $image=$_FILES['image'];
    // $image_name= $_FILES['image']['name'];
    // $image_size= $_FILES['image']['size'];  
    // $image_tmp= $_FILES['image']['tmp_name'];
    // $image_type= $_FILES['image']['type'];  

    // $image_store = "images/" . $image_name;

    // move_uploaded_file($image_tmp,$image_store);

    // if(move_uploaded_file($image_tmp,$image_store));
    // {
    //     echo "<img src=".$image_name." height=50 width=50 />";
    // } 
    // else {
    //     echo "Error !!";
    // }

    $errorString='';
    $dob=$_POST['dob'];
    if (empty($row["dob"]))
      // the user's date of birth cannot be a null string
      $errorString .= "You must supply a date of birth.";
    elseif (!preg_match("^([0-9]{2})/([0-9]{2})/([0-9]{4})$",
          $row["dob"], $dob))
      // Check the format
      $errorString .=
        "The date of birth is not a valid date in the " .
        "format DD/MM/YYYY";

        if(empty($_POST['gender'])){
            $errors['gender'] = 'A gender is required <br />';
        }else{
            $gender = $_POST['gender'];
            if(!isset($_POST["gender"])) {
                $errors['gender'] = 'Gender is required';
            }
        }



        if(empty($_POST['state'])){
            $errors['state'] = 'A state is required <br />';
        }else{
            $state = $_POST['state'];
            if(!isset($_POST["state"])) {
                $errors['state'] = 'state is required';
            }
        }



        if(empty($_POST['city'])){
            $errors['city'] = 'A city is required <br />';
        }else{
            $city = $_POST['city'];
            if(!isset($_POST["city"])) {
                $errors['city'] = 'City is required';
            }
        }

      

        if(empty($_POST['country'])){
            $errors['country'] = 'A country is required <br />';
        }else{
            $country = $_POST['country'];
            // if(!isset($_POST["city"])) {
            //     $errors['city'] = 'City is required';
            // }
        }


        




    // error filter array 
    if(array_filter($errors)){
        echo '';
    } else{
        $id = mysqli_real_escape_string($con, $_POST['id']);
        $user = mysqli_real_escape_string($con, $_POST['user']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $dob = mysqli_real_escape_string($con, $_POST['dob']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);
        $city = mysqli_real_escape_string($con, $_POST['city']);
        $state = mysqli_real_escape_string($con, $_POST['state']);
        $country = mysqli_real_escape_string($con, $_POST['country']);
        $image = mysqli_real_escape_string($con, $_FILES['file_name']);







$s = " select * from usertable where user = '$user' ";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    // echo "Username Already Taken";
    // check title
    if(!empty($_POST['user'] )){
  echo   $errors['user'] = 'Username Already Taken <br />';
    }   
}else {

        $image = $_FILES['image'];
    
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp  = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_store = "picture/".$file_name;

      move_uploaded_file($file_tmp, $file_store);

    $reg = "insert into usertable(user , email , password , dob , gender , city , state, country ,image) values('$user' ,'$email', '$password' ,'$dob' , '$gender' ,'$city' ,'$state' ,
    '$country' , '$file_name')";

    mysqli_query($con, $reg);
    header('Location: /Form/home.php'); 
    // echo "Welcome" .' ' . $user;
}
    }
}
?>


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
        width: 20%;
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
        height:750px;
        background: lightgray;
        border: 1px solid black;
        margin-bottom: 15px;
        }
        .input-contain{
            width:80%;
        }
        input[type=text],input[type=password],input[type=date],select
        {
            padding:8px;
            color:black;
            width: 60%;
            
        }

        .left1 {
            position: relative;
            right: 90px;
        }

        span.right1 {
            position: relative;
            left: 15px;
        }

        input[type="file"] {
            position: relative;
            left: 15px;
        }


    </style>
</head>

<body>



    <!-- <div class="col-md-6 login-right box"> -->
    <div class="h">
    <center>
        <h2> Register Here</h2>
        
        <form action="registration.php" method="post" enctype="multipart/form-data">
        <div class="input-container">
            <i class="fa fa-user icon"style="font-size:24px;"></i> 
            <input type="text" name="user" class="form-control" placeholder="Enter Your Name">
            <div class="red-text"><?php echo $errors['user'] ?></div>
            <br>

            <i class="fa fa-envelope icon"style="font-size:24px;"></i>
            <input type="text" name="email" class="form-control" placeholder="Enter Your Email">
            <div class="red-text"><?php echo $errors['email'] ?></div> 

            <br>
            <i class="fa fa-key icon" style="font-size:24px;"></i>
            <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
            <div class="red-text"><?php echo $errors['password'] ?></div>
            
            <br>
            <i class="fas fa-birthday-cake" style="font-size:24px;"></i> &nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;<input type="date" name="dob" class="form-control" style="margin-left:1%;">
            <div class="red-text"><?php echo $errors['dob'] ?></div>
            
            <br>
            <div class="left1">
            <i class='far fa-dot-circle' style='font-size:24px;'></i>
            <span class="right1">
            <input type="radio" name="gender"  value="male" > Male &nbsp;
            <input type="radio" name="gender"  value="female" > Female </span>
            <div class="red-text"><?php echo $errors['gender'] ?></div> </div>
            <br>
            
            <i class="fas fa-city"style="font-size:24px;" ></i> &nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;<select name="city" id="city"  >
                <option value=""  hidden selected>select city</option>
                <option value="jaipur" >jaipur</option>
                <option value="kota" >kota</option>
                <option value="udaipur" >udaipur</option>
                <option value="bali" >bali</option>
                <option value="Mumbai" >Mumbai</option>
                <option value="Indore" >Indore</option>
                <option value="Surat" >Surat</option>
                <option value="bali" >bali</option>
                <option value="bali" >bali</option>
                
            </select>
            <div class="red-text"><?php echo $errors['city'] ?></div> 

            <br>

           






            <i class="fas fa-city" style="font-size:24px;"></i>&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;<select name="state" id="state">
                <option value=""  hidden selected>select state</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="MP">MP</option>
                <option value="Maharastra">Maharastra</option>
                <option value="Gujarat">Gujarat</option>
            </select>
            <div class="red-text"><?php echo $errors['state'] ?></div> 

             <br>

            <i class="fas fa-globe" style="font-size:24px;"></i>&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;<select name="country" id="country" style="margin-left:1%">
                <option value=""  hidden selected>select country</option>
                <option value="India">India</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="USA">USA</option>
            </select>
            <div class="red-text"><?php echo $errors['country'] ?></div> 
            <br>
         
            <i class="fas fa-portrait" style="font-size: 24px;"></i>&nbsp;&nbsp;
            <span class="right2">
                <input type="file" name="image" style="margin-right:10%;">
            </span>   
        <br><br>

            <center>
                <button type="submit" name="submit" class="btn btn-primary"> Register </button><br><br><br>
                <a href="user.php" class="btn btn-primary">User Login</a>
</h2>
            </center>
        </form>
    </div>
    </div>
        </center>
</div>
    </div>
    </div>
    </div>
    </div>
</body>
</html>