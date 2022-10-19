<!-- http://localhost/phpmyadmin/sql.php?db=userregistration&table=usertable&pos=0 -->

<!DOCTYPE html>
<html lang="en">


<?php
include('db.php');

session_start();

$user = $email = $password = $dob = $gender =  $city =  $state = $country = $image = $random=$questions=$answer='' ;
$errors = array('user'=> '' , 'email' => '' , 'password' => '' , 'dob'=>'', 
    'gender'=>'' , 'city' =>'' ,'state' => '' , 'country'=> '' , 'image' => '' , 'random' => '','questions' => '','answer' => '' );

$con = mysqli_connect('localhost', 'root','');

mysqli_select_db($con , 'userregistration');  

if(isset($_POST['submit'])){


    $random = mt_rand(10,100);

    if(empty($_POST['user'])){
        $errors['user'] = 'Title is required <br />';
    }else{
        if(strlen($_POST['user']) < 7){
            $errors['user'] = "length is less than 8";
        }
    elseif (strlen($_POST['user']) > 15){
            $errors['user'] = "length is more than 15";
        }
        $user = $_POST['user'];

    if(!preg_match('/^[a-zA-Z\-\ ]+$/', $user)){
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
        $errors['password'] = 'Password is required <br />';
    }else{
        $password = $_POST['password'];
        if(!preg_match('/^[a-zA-Z0-9\s]+$/', $password)){
            $errors['password'] = 'Password must be letters and space only';
        }
    }

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
        // echo '<script> Your Random is : $random;</script>';
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
        $random = mysqli_real_escape_string($con, $_POST['random']);
        // echo '<script>alert("Your Random Number is : $random")</script>';
        $questions = mysqli_real_escape_string($con, $_POST['questions']);
        $answer = mysqli_real_escape_string($con, $_POST['answer']);

        // $random = rand(10,100);

        // echo $random;


        


$s = " select * from usertable1 where user = '$user' ";

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

      $random= strtoupper(substr(md5(time().rand(10000,99999)), 0,8));

    $reg = "insert into usertable1(user , email , password , dob , gender , city , state, country ,image , random, questions, answer) 
    values('$user' ,'$email', '$password' ,'$dob' , '$gender' ,'$city' ,'$state' ,'$country' , '$file_name' , '$random', '$questions', '$answer')";

    mysqli_query($con, $reg);

    $yyy = mysqli_query($con,"INSERT into mypassword(password1) values ('$password')");
    
    // $y = mysqli_query($con,"INSERT into `password`(`userpassword`,`name`) values ('$password','$user')");
    header('Location: /Form/home.php'); 

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
        height:850px;
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
        .half1{
            top:-90px;
            position: relative;
        }

        i.fa.fa-key.icon {
            position: relative;
            top: 30px;
            right: 295px;
        }

        .lol2{
            
            position: relative;
            left: 30px;
            top:-10px;
        }

        .ll1 {
            margin-left: 23px;
        }

        .ll{
            position: relative;
            left:30px;
        }

        
        /* input.form-control {
        position: relative;
        left: 20px;
        } */
        /* input[type="text"] {
  padding: 10px;

  background: linear-gradient(#000, #000), linear-gradient(#000, #000), linear-gradient(#000, #000);
  background-size: 1px 20%, 100% 1px, 1px 20%;
  background-position: bottom left, bottom center, bottom right;
  background-repeat: no-repeat;

  border: none;
  color: #999;
} */

    </style>
</head>

<body>

    <div class="h">
    <center>
        <h2> Register Here</h2>
        <form action="registration.php" method="post" enctype="multipart/form-data">
        <div class="input-container">
            <span class="half ">
            <i class="fa fa-user icon "style="font-size:24px;"></i> 
            <input type="text" name="user" class="form-control"  placeholder="Enter Your Name" >
            <div class="red-text"><?php echo $errors['user'] ?></div>
            </span>
            <img  id="image" height="100" width="100"  style="border:2px solid; margin-left: 50%; position:relative; bottom:-10px;">
            <br>
            
            <span class="half">
            <i class="fa fa-envelope icon "style="font-size:24px; position:relative; top:-90px;"></i>
            <input type="text" name="email" class="form-control half1" placeholder="Enter Your Email">
            <div class="red-text"><?php echo $errors['email'] ?></div>
            </span>

            <i class="fa fa-key icon"  style="font-size:24px;"></i>
            <input type="password" name="password" class="form-control" style="position: relative; left: 25px; top:-15px;" 
            placeholder="Enter Your Password">
            <div class="red-text"><?php echo $errors['password'] ?></div>
            
            <br>
            <i class="fas fa-birthday-cake lol2" style="font-size:24px;"></i> &nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;<input type="date" name="dob" class="form-control" style="margin-right:9%; position: relative; left: 25px; top:-15px;">
            <div class="red-text"><?php echo $errors['dob'] ?></div>
            
            <br>
            <div class="left1">
            <i class='far fa-dot-circle' style='font-size:24px; position:relative; top:-5px; margin-left:1%;'></i>
            <span class="right1">
            <input type="radio" name="gender"  value="male" > Male &nbsp;
            <input type="radio" name="gender"  value="female" > Female </span>
            <div class="red-text"><?php echo $errors['gender'] ?></div> </div>
            <br>



            <i class="fas fa-globe" style="font-size:24px; margin-left:2%;"></i>&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;<select name="country" id="countyList" style="margin-left:0%;">
                    <option value="" selected="selected">Select Country</option>
                </select>
            <div class="red-text"><?php echo $errors['country'] ?></div> 
            <br>
            
            <i class="fas fa-city" style="font-size:24px; margin-left:5%;"></i>&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;<select name="state" id="stateList" style="margin-right:5%;">
                    <option value="" selected="selected">Select State</option>
                </select>
            <div class="red-text"><?php echo $errors['state'] ?></div> 

             <br>


            <i class="fas fa-city"style="font-size:24px;" ></i> &nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;
            </div>
            <select name="city" id="cityList">
                    <option value="" selected="selected">Select City</option>
                </select>
                <div class="red-text"><?php echo $errors['city'] ?></div>
            <br>

            <span class="left2">
            <i class="fa fa-question-circle ll1" style= "font-size:24px ;"  aria-hidden="true"></i> 
            <select name="questions" id="que" class="ll">
            <option>Select Question</option>
            <option>Who is your best friend?</option>
            <option>Which is your favourite movie?</option>
            <option>Who is your favourite actor?</option>
            <option>Who is your favourite actress?</option>
            <option>What is your petname?</option>
            </select>
            </span>
           <br><br>
            <span class="left2">
            <i class="fas fa-lock ll1" style= "font-size:24px ;"  aria-hidden="true"></i>
            <input type="text" name="answer" class="form-control ll" placeholder="Enter Your Answer"><br>
            </span>
            <br>
            <span class="left2">
            <i class="fas fa-portrait " style="font-size: 24px ;"></i>&nbsp;&nbsp;
            <input type="file" name="image" onchange="loadfile(event)" style="margin-left:1%">  
            </span>
            <br><br>


            

            <span class="half ">
            <input type="hidden" name="random" class="form-control">
            </span>
            
            <center>
                <button type="submit" name="submit" class="btn btn-primary"> Register </button><br><br><br>
                <a href="user.php" class="btn btn-primary">User Login</a>
            </h2>
            </center>
        </form>

        <script>
            var worldData = {
                USA: {
                    California: ["Los Angeles", "San Diego", "Sacramento"],
                    Texas: ["Houston", "Austin"],
                    Florida: ["Miami", "Orlando", "Tampa"],
                },
                India: {
                    Maharashtra: ["Mumbai", "Pune", "Nagpur"],
                    TamilNadu: ["Chennai", "Madurai"],
                    Karnataka: ["Bangalore", "Mangalore"],
                },
                Canada: {
                    Alberta: ["Calgary", "Edmonton", "Red Deer"],
                    BritishColumbia: ["Vancouver", "Kelowna"],
                    Manitoba: ["Winnipeg", "Brandon"],
                },
                Germany: {
                    Bavaria: ["Munich", "Nuremberg"],
                    NorthRhine: ["Cologne", "Düsseldorf"],
                },
            };
            window.onload = function () {
                var countyList = document.getElementById("countyList"),
                    stateList = document.getElementById("stateList"),
                    cityList = document.getElementById("cityList");
                for (var country in worldData) {
                    countyList.options[countyList.options.length] = new Option(country, country);
                }
                countyList.onchange = function () {
                    stateList.length = 1;
                    cityList.length = 1;
                    if (this.selectedIndex < 1) return;
                    for (var state in worldData[this.value]) {
                        stateList.options[stateList.options.length] = new Option(state, state);
                    }
                };
                countyList.onchange();
                stateList.onchange = function () {
                    cityList.length = 1;
                    if (this.selectedIndex < 1) return;
                    var city = worldData[countyList.value][this.value];
                    for (var i = 0; i < city.length; i++) {
                        cityList.options[cityList.options.length] = new Option(city[i], city[i]);
                    }
                };
            };


            function loadfile(event){
            var output=document.getElementById('image');
            output.src=URL.createObjectURL(event.target.files[0]);
    }
        </script>
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




<!-- // $user = $_POST['user'];

// check title
// if(empty($_POST['user'])){
//     $errors['user'] = ' Title is required <br />';
// }else{
//     $user = $_POST['user'];
//     if(!preg_match('/^[a-zA-Z\s]+$/', $user)){
//         $errors['user'] = 'User must be letters and space only';
//     }
// } -->


<!-- // if(empty($_POST['city'])){
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
    // } -->