<?php
session_start();
include('design.php');
include("db.php");

if(isset($message))
 {
  echo $name;
  echo $msgtxt;
  echo $email;
  echo $phone;
	 if(mysqli_query($con,"insert into tblmessage(fld_name,fld_email,fld_phone,fld_msg) values ('$user','$email','$phone','$msgtxt')"))
     {
		 echo "<script> alert('We will be Connecting You shortly')</script>";
	 }
	 else
	 {
		 echo "failed";
	 }
  }

?>
<html>
  <head>
     <title>Contact-us</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Permanent+Marker" rel="stylesheet">
     
	 <style>
	 .carousel-item {
  height: 100vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

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
	 
	 
	 <script>
	 //search product function
            $(document).ready(function(){
	
	             $("#search_text").keypress(function()
	                      {
	                       load_data();
	                       function load_data(query)
	                           {
		                        $.ajax({
			                    url:"fetch.php",
			                    method:"post",
			                    data:{query:query},
			                    success:function(data)
			                                 {
				                               $('#result').html(data);
			                                  }
		                                });
	                             }
	
	                           $('#search_text').keyup(function(){
		                       var search = $(this).val();
		                           if(search != '')
		                               {
			                             load_data(search);
		                                }
		                            else
		                             {
			                         load_data();			
		                              }
	                                });
	                              });
	                            });
</script>
<style>
ul li {list-style:none;}
ul li a{color:black; font-weight:bold;}
ul li a:hover{text-decoration:none;}

/* our css */
.contact_pp{
	position: relative;
	top: 7;
}

.pp {
    position: relative;
    top: 7;
}
</style>
  </head>
  
    
<body>
<div id="result" style="position:fixed;top:100; right:50;z-index: 3000;width:350px;background:white;"></div>
<!--navbar start-->
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
  
    <a class="navbar-brand" href="index.php"><span style="color:green;font-family: 'Permanent Marker', cursive;">Food Services</span></a>
    <?php
	if(!empty($cust_id))
	{
	?>
	<a class="navbar-brand" style="color:black; text-decoratio:none;"><i class="far fa-user"><?php if(isset($cust_id)) { echo $qqr['fld_name']; }?></i></a>
	<?php
	}
	?>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
	
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link contact_pp" href="index.php">Home
                
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link contact_pp" href="aboutus.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link contact_pp" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link contact_pp" href="contact.php">Contact</a>
        </li>
		<li class="nav-item">
          <a class="nav-link pp" href="edit.php">Edit</a>
        </li>
		<li class="nav-item">
		  <form method="post">
          <?php
			if(empty($cust_id))
			{
			?>
			<a href="form/index.php?msg=you must be login first"><span style="color:red; font-size:30px;"><i class="fa fa-shopping-cart contact_pp" aria-hidden="true">&nbsp;<span style="color:red;" id="cart"  class="badge badge-light">0</span></i></span></a>
			
			&nbsp;&nbsp;&nbsp;
			<button class="btn btn-outline-danger my-2 my-sm-0" name="login" type="submit">Log In</button>&nbsp;&nbsp;&nbsp;
            <?php
			}
			else
			{
			?>
			<a href="form/cart.php"><span style=" color:green; font-size:30px;"><i class="fa fa-shopping-cart contact_pp" aria-hidden="true">&nbsp;<span style="color:green;" id="cart"  class="badge badge-light"><?php if(isset($re)) { echo $re; }?></span></i></span></a>
			<button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Log Out</button>&nbsp;&nbsp;&nbsp;
			<?php
			}
			?>
			</form>
        </li>
		
      </ul>
	  
    </div>
	
</nav> -->
<!--navbar ends-->

  
<ul><h2>SHOPPING</h2>
      <span class="right">
          <li><a href="home.php" ><i class="far fa-arrow-alt-circle-left" style="font-size:20px"></i>Back</a></li>
          <!-- <li><a href="indx.php">Products</a> -->

          <li>
            <div class="dropdown">
              <!-- <button class="dropbtn"><i class="fa fa-user icon" style="font-size:24px;">
            <?php echo $_SESSION['user']; ?> -->
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
    <br><br><br>
    <div class="container-fluid">
  <img src="/Food_Services/img/slide1.jpg" width="100%">
</div>
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-8" style="padding:20px; border:1px solid #F0F0F0;">
	    <form method="post">
            <div class="form-group">
                 <input type="text" class="form-control"  placeholder="Name" name="name" required/>
            </div>
			<div class="form-group">
                 <input type="email" class="form-control"  placeholder="email" value="<?php if(isset($cust_id)) echo $cust_id; ?>" name="email" required/>
            </div>
			<div class="form-group">
                 <input type="tel" class="form-control" pattern="[6-9]{1}[0-9]{9}"  name="phone" placeholder="Phone(optional) EX 9213298761"/>
            </div>
			<div class="form-group">
                <textarea class="form-control"    placeholder="Message" name="msgtxt" rows="3" col="10" required/></textarea/>
            </div>
			<div class="form-group">
                   <button type="submit" name="message" class="btn btn-primary">Send Message</button>
            </div>
        </form>
	</div>
    <div class="col-sm-4" style="padding:30px;">
	   <div class="form-group">
           <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;<b>+91 8619673761<br><br>
			<i class="fa fa-home" aria-hidden="true"></i>&nbsp; <br>(24*7 Days)
	       
	   </div>
	</div>
  </div>
</div>
<br><br>
</body>
</html>