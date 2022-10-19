
<?php 

include('design.php');

include('db.php');

session_start();


if(isset($_SESSION["user"])) {
if (isset($_SESSION['user'])) {
  $result = mysqli_query($con, "SELECT id FROM usertable1 where user='".$_SESSION['user']."'");
 
  if (mysqli_num_rows($result) > 0) {
 
    $row = mysqli_fetch_array($result); 
    $id = $row['id']; 
  }
}
?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
 ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  /* overflow: hidden; */
  background-color: #333;
  height: 52px;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
  color: pink;
}

.active {
  background-color: #4CAF50;
  color: black;
}   
.active:hover {
  background-color: #4CAF50;
  color: yellow;
}
ul h2{
    color: white;
}



body {
  font-family: Arial, Helvetica, sans-serif;
  counter-reset: Serial;  /*Set the Serial counter to 0 */
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  background-color: #f9f9f9;
  min-width: 110px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

tr:nth-child(even) {
    background-color: #ffffe6;
  }
tr:nth-child(odd) {
   background-color: #e7f5fe;
  }

.color1{
  font-size:24px; 
  color:black; 
  border-radius:8px; 
  background:green;
  padding: 12px;
  
}

.color2{
  font-size:24px; 
  color:black; 
  border-radius:8px; 
  background:blue;
  padding: 12px;
  
}

.color3{
  font-size:24px; 
  color:black; 
  border-radius:8px; 
  background:red;
  padding: 12px;
  
}

.color1:hover{
  color:white;
}

.color2:hover{
  color:white;
}

.color3:hover{
  color:white;
}



tr td:first-child:before
{
  counter-increment: Serial;      /* Increment the Serial counter */
  content:  counter(Serial);      /* Display the counter */
}



/* image slider */


* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}



</style>
</head>
<body bgcolor="#efefef">




    <ul><h2>SHOPPING</h2>
      <span class="right">
          <li><a href="#home" ><i class="fa fa-home" style="font-size:20px"></i>    Home</a></li>
          <li><a href="#about"><i class="fas fa-address-card" style="font-size:20px"></i>    About</a></li>
          <li><a href="contact.php"><i class='fas fa-phone' style='font-size:20px'></i>    Contact</a></li>
          <!-- <li><a href="indx.php">Products</a> -->

          <li>
            <div class="dropdown">
              <button class="dropbtn"><i class="fa fa-user icon" style="font-size:24px;">
            <?php echo $_SESSION['user']; ?>
            </i>   
              </button>
            <div class="dropdown-content">
            <a href="profile.php?id=<?php echo $row["id"]; ?>" 
                    title="Profile" class="active"><i class="fa fa-user icon" style="font-size:24px;"></i>   Profile</a>
              <a href="userlogout.php"><i class="fa fa-power-off" style="font-size:24px;"></i>    Logout</a>
            </div>
          </div> 
          </li>
      </span>
    </ul>
    


    <div class="slideshow-container">

      <div class="mySlides fade">
        <img src="slider1.jfif" style="width:100%">
      </div>

      <div class="mySlides fade">
        <img src="slider2.jfif" style="width:100%">
      </div>

      <div class="mySlides fade">
        <img src="slider3.png" style="width:100%">
      </div>

    </div>
    <br>

    <div style="text-align:center">
      <span class="dot"></span> 
      <span class="dot"></span> 
      <span class="dot"></span> 
    </div>

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}    
            for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 2000); // Change image every 2 seconds
          }
    </script>
    <br><br>

    <!-- <a href="user.php" class="btn btn-primary" style="  position: relative;  left: 710px;
      top: -40px; "><i class="far fa-arrow-alt-circle-left" style="font-size:24px;">Back</i></a>  -->








 <?php 
   }
   else
   { 
    if(isset($_SESSION['user'])|| isset($_SESSION['password'])){
      header('location:user.php');
    }
    else{
      header('location:welcome.php');
    }
    
     echo "<h1>Please login first .</h1>";
     header('location:user.php');
   }

   
 ?> 
 


 </body>
</html>