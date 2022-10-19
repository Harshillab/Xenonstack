
<?php  include('design.php');

include('db.php');


session_start();



if(isset($_SESSION["email"])) {
  
    // Check user is exist in the database

    $s = "SELECT * FROM usertable1";
    
    $result = mysqli_query($con, $s);


?> 
          

   <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




<html>
<head>

    
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


.color4{
  font-size:24px; 
  color:black; 
  border-radius:8px; 
  background:darkmagenta;
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


.color4:hover{
  color:white;
}


tr td:first-child:before
{
  counter-increment: Serial;      /* Increment the Serial counter */
  content:  counter(Serial);      /* Display the counter */
}

tr th{
  text-align: center;
}

tr td{
  text-align: center;
}

</style>
</head>

<body>

    <ul><h2>SHOPPING</h2>
      <span class="right">
          <li><a href="#home" ><i class="fa fa-home" style="font-size:20px"></i>    Home</a></li>
          <li><a href="#about"><i class="fas fa-address-card" style="font-size:20px"></i>    About</a></li>
          <li><a href="#contact"><i class='fas fa-phone' style='font-size:20px'></i>    Contact</a></li>
          <li>
            <div class="dropdown">
              <button class="dropbtn"><i class="fa fa-user icon" style="font-size:24px;"></i>   <?php  echo $_SESSION["email"]; ?>
              </button>
            <div class="dropdown-content">
              <a href="logout.php"><i class="fa fa-power-off" style="font-size:24px;"></i>    Logout</a>
            </div>
          </div> 

          </li>
        </span>
    </ul>
    
</div>




<br>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>


  
  <h2>  
   
        <i class="fa fa-home" style="font-size:38px;color:black"></i> User List
 </h2>
  <br>
<br>
<center>
    <div class="text-center">
        <!-- <a title="Add a Product" href="product.php" class="btn btn-primary"  style="  position: relative;  left: 545px;
          top: -25px; border-color:brown;"> -->
          <!-- <i class="fas fa-plus-circle"style="font-size:24px;">Add Product</i></a> -->
        <a title="Register" href="registration.php" class="btn btn-primary"  style="  position: relative;  left: 700px;
              top: -25px; border-color:brown;"><i class="fas fa-user-plus" style="font-size:24px;">Add</i></a>
        <a title="Back to Login" href="Admin.php" class="btn btn-primary" style="  position: relative;  left: 705px;
              top: -25px; border-color:brown;"><i class="far fa-arrow-alt-circle-left" style="font-size:24px;">Back</i></a>
    </div>
    <table style="width:98%;"> 
    <tr>

        <th> S.No. </th>
        <th> Name </th>
        <th> Image </th>
        <th> Email </th>
        <th> Action </th>
        <th> Status </th>
     
    </tr>
          <?php   while($row = mysqli_fetch_assoc($result))  { 
            $id=$row['id'];
            // $data=$row['detail'];
            $status=$row['status'];
          ?>

            
        
            
     <tr>
            <td> </td> 
            <td><?php echo "{$row["user"]} "; ?> </td> 
            <td><?php echo "<img src=picture/$row[image] class='rounded-circle' style='width:80px; height:80px;'>"?></td>
            <td> <?php echo "{$row["email"]} "; ?> </td>  
            <td style="padding:40px;">
                
                <a title="Edit" href="edit.php?id=<?php echo $row["id"]; ?>" class="color1"> 
                    <i class="fas fa-edit">
                </a></i> &nbsp;&nbsp;&nbsp;
                <a title="View" href="view.php?id=<?php echo $row["id"]; ?>" class="color2"> 
                    <i class="fa fa-eye" > 
                </a></i>    &nbsp;&nbsp;&nbsp;
                <a title="Delete" href="delete.php?id=<?php echo $row["id"]; ?>" class="color3">
                    <i class="fa fa-trash-o" >
                </a></i>
            </td>
            <td><?php
                if(($status)=='1')
                {
                ?>
                <a title="Click To Activate" href="action.php?status=<?php echo $row['id'];?>" 
                 onclick="return confirm('Activate <?php echo $data?>');" class="color4" 
                 style="text-decoration:none;"><i class="fas fa-circle-notch"></i>  </a>
                <?php
                }
                if(($status)=='0')
                {
                ?>
                <a title="Click To Deactivate" href="action.php?status=<?php echo $row['id'];?>" 
                 onclick="return confirm('De-activate <?php echo $data?>');" class="color4"
                 style="text-decoration:none;"><i class="fas fa-check-double"></i> </a>
                <?php
                }
                ?> 
            </td>
    
    </tr> 
<?php } ?> 
</table>
</center>

<!-- class="deact"
class="act" -->
    <br>
    <div class="text-center">
        
    </div>

    <?php 
   }
   else
   { 
    if(isset($_SESSION['email'])|| isset($_SESSION['password'])){
      header('location:Admin.php');
    }
    else{
      header('location:welcome.php');
    }
    
     echo "<h1>Please login first .</h1>";
     header('location:Admin.php');
   }

   
 ?>



<!-- <?php
    // check if the cookie exists
    // if(isset($_COOKIE["email"]))
    // {
    //     echo "Cookie set with value: ".$_COOKIE["email"];
    // }
    // else
    // {
    //     echo "cookie not set!";
    // }
    ?> -->


</body>
</html>











