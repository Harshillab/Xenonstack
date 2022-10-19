<!-- http://localhost/phpmyadmin/sql.php?db=userregistration&table=usertable&pos=0 -->
<!-- Registration form -->




<!DOCTYPE html>
<html lang="en">

<?php  include('design.php');  ?>

<?php

session_start();

$user = $email = $password = $dob = $gender =  $city =  $state = $country = $image = '' ;
$errors = array('user'=> '' , 'email' => '' , 'password' => '' , 'dob'=>'', 
    'gender'=>'' , 'city' =>'' ,'state' => '' , 'country'=> '' , 'image' => '' );

$con = mysqli_connect('localhost', 'root1','light17791754');

mysqli_select_db($con , 'userregistration');  

if(isset($_POST['submit'])){
    // $user = $_POST['user'];

    // check title
    if(empty($_POST['user'])){
        $errors['user'] = 'An Username is required <br />';
    }else{
        if(strlen($_POST['user']) < 7){
            $errors['user'] = "length is less than 8";
        }
    elseif (strlen($_POST['user']) > 15){
            $errors['user'] = "length is more than 10";
        }
        $user = $_POST['user'];

    if(!preg_match('/^[a-zA-Z]+$/', $user)){
        $errors['user'] = 'Username must have Uppercase and lowercase ';
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
        $errors['password'] = 'An password is required <br />';
    }else{
        $password = $_POST['password'];
        if(!preg_match('/^[a-zA-Z0-9\s]+$/', $password)){
            $errors['password'] = 'Password must be letters and space only';
        }
    }

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



    // check DOB
    if(empty($_POST['dob'])){
        $errors['dob'] = 'An dob is required <br />';
    }else{
        $dob = $_POST['dob'];
        if(preg_match("/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/", $_POST["date"]) === 0){
            $errors['dob'] = 'Error in dob';
        }
        
    }


    // check Gender
    if(empty($_POST['gender'])){
        $errors['gender'] = 'An gender is required <br />';
    }else{
        $gender = $_POST['gender'];
        // if(!isset($_POST["gender"])) {
        //     $errors['gender'] = 'Gender is required';
        // }
    }



    // check city

    if(empty($_POST['city'])){
        $errors['city'] = 'An city is required <br />';
    }else{
        $city = $_POST['city'];
        // if(!isset($_POST["city"])) {
        //     $errors['city'] = 'city is required';
        // }
    }

    // check state

    if(empty($_POST['state'])){
        $errors['state'] = 'An state is required <br />';
    }else{
        $state = $_POST['state'];
        // if(!isset($_POST["state"])) {
        //     $errors['state'] = 'state is required';
        // }
    }    

    // check country

    if(empty($_POST['country'])){
        $errors['country'] = 'An country is required <br />';
    }else{
        $country = $_POST['country'];
        // if(!isset($_POST["country"])) {
        //     $errors['country'] = 'country is required';
        // }
    }

    // check image

    if(empty($_POST['image'])){
        $errors['image'] = 'An image is required <br />';
    }else{
        $image = $_POST['image'];
        if(!isset($_POST["image"])) {
            $errors['image'] = 'image is required';
        }
    }


    // Validate Date of Birth

    // if (empty($formVars["dob"]))
    //   // the user's date of birth cannot be a null string
    //   $errorString .= "You must supply a date of birth.";
    // else if (!ereg("^([0-9]{2})/([0-9]{2})/([0-9]{4})$",
    //       $formVars["dob"], $parts))
    //   // Check the format
    //   $errorString .=
    //     "The date of birth is not a valid date in the " .
    //     "format DD/MM/YYYY";








    // error filter array 
    if(array_filter($errors)){
        echo 'errors in the form';
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
        $image = mysqli_real_escape_string($con, $_FILES['image_name']);







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
    
      $image_name = $_FILES['image']['name'];
      $image_size = $_FILES['image']['size'];
      $image_tmp  = $_FILES['image']['tmp_name'];
      $image_type = $_FILES['image']['type'];
      $image_store = "profile/".$image_name;


    $str = $image_name;
    $pattern = '/ /i';
    $image_newName =  preg_replace($pattern, '', $str);

    // echo $image_newName;



      move_uploaded_file($image_tmp, $image_store);

    $reg = "insert into usertable(user , email , password , dob , gender , city , state, country ,image) values('$user' ,'$email', '$password' ,'$dob' , '$gender' ,'$city' ,'$state' ,
    '$country' , '$image_newName')";

    mysqli_query($con, $reg);
    header('Location: /Form/home.php'); 
    // echo "Welcome" .' ' . $user;
}
    }
}





?>

<body>



    <div class="col-md-6 login-right box">
    
 <h2> Register Here     
    <a href="Admin.php" class="btn btn-primary">Admin Login</a>
    <a href="user.php" class="btn btn-primary">User Login</a>
</h2>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label> Username </Label>
            <input type="text" name="user" class="form-control" placeholder="Example - Vishal_karnawat">
            <div class="red-text"><?php echo $errors['user'] ?></div>
            </div>
            <div class="form-group">
            <label> Email </Label>
            <input type="text" name="email" class="form-control" placeholder="Example - vishal@gmail.com">
            <div class="red-text"><?php echo $errors['email'] ?></div>
            </div>
            <div class="form-group">
            <label> Password </Label>
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="red-text"><?php echo $errors['password'] ?></div>
            </div>
            <div class="form-group">
            <label> DOB </Label>
            <input type="date" name="dob" class="form-control" >
            <div class="red-text"><?php echo $errors['dob'] ?></div>
            </div>
            <label> Gender </Label><br>
            <input type="radio" name="gender"  value="male"> Male &nbsp;
            <input type="radio" name="gender"  value="female"> Female
            <div class="red-text"><?php echo $errors['gender'] ?></div>
            
            <label> City </Label> &nbsp;&nbsp;
            <select name="city" id="city">
                <option selected hidden value="">Select City</option>
                <option value="jaipur">jaipur</option>
                <option value="kota">kota</option>
                <option value="udaipur">udaipur</option>
                <option value="bali">bali</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Indore">Indore</option>
                <option value="Surat">Surat</option>
                <option value="bali">bali</option>
            </select> 
            <div class="red-text"><?php echo $errors['city'] ?></div>

            <label> State </Label>&nbsp;&nbsp;
            <select name="state" id="state">
                <option selected hidden value="">Select State</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="MP">MP</option>
                <option value="Maharastra">Maharastra</option>
                <option value="Gujarat">Gujarat</option>
            </select> 
            <div class="red-text"><?php echo $errors['state'] ?></div>
            
            <label> Country </Label>&nbsp;&nbsp;
            <select name="country" id="country">
                <option selected hidden value="">Select Country</option>
                <option value="India">India</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="USA">USA</option>
            </select>
            <div class="red-text"><?php echo $errors['country'] ?></div>

            <label> Image </Label>&nbsp;&nbsp;

            <input type="file" name="image">
            <div class="red-text"><?php echo $errors['image'] ?></div>

                        <!-- <br><br> -->


<!--             <div class="red-text"><?php echo $errors['city'] ?></div>
            </div> -->

<!--             <label for="img">Select image: </label> &nbsp;&nbsp;
            <input type="file"  name="image"  width="50px" height="50px" > <br> -->
            <center>
                <button type="submit" name="submit" class="btn btn-primary"> Register </button>
            </center>
        </from>
    </div>
    </div>
    </div>
    </div>
</body>
</html>