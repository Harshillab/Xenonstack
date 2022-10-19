<?php
include_once('db.php');

// if(isset ($_GET['id'])){
     
//     $id = mysqli_real_escape_string($db, $_GET['id']);

//     // make  sql 
//     $s = "SELECT * FROM usertable where id = $id";

//     // get the query results
// 	$result = mysqli_query($db, $s);

//     $row = mysqli_fetch_assoc($result);

    

//     $name =$_REQUEST['name'];
// 	  $user = mysqli_real_escape_string($db, $user);

// 	$email =$_REQUEST['email'];
//       $email = mysqli_real_escape_string($db, $email);


// }


$id = mysqli_real_escape_string($con, $_GET['id']);
if(count($_POST)>0) {

    
    

    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_store="picture/".$file_name;

    // $profile_name=$_FILES[$file_name];

    // Delete old image from database
    if (file_exists($file_store))
    {
    @unlink("picture/".$file_name);

}
    //inserting new image in database
move_uploaded_file($file_tmp,"picture/".$file_name);
$update=mysqli_query($con,"UPDATE usertable1 SET image='".$file_name."' WHERE id=$id");  
mysqli_query($con,"UPDATE usertable1 set  user='" . $_POST['user'] . "',
email='" . $_POST['email'] . "' ,
password='" . $_POST['password'] . "', 
dob='" . $_POST['dob'] . "', 
city='" . $_POST['city'] . "',
state='" . $_POST['state'] . "',
country='" . $_POST['country'] . "' WHERE id=$id");
$message = "Record Modified Successfully";
}
$result = mysqli_query($con,"SELECT * FROM usertable1 WHERE id=$id");
$row= mysqli_fetch_array($result);


?>
<html>
<head>
<title>Update Employee Data</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
  /* gender='" . $_POST["gen"] . "',    */
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
        display: flex;
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
        width:550px;
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
</head>
<body>
<div class="h">
<table style="margin-left:15%;">
<h2 style="margin-left:32%;"> UPDATE USER</h2>
<?php echo "<img src=picture/$row[image]  id='image' style='width:80px; height:80px; margin-left: 40%; border-radius: 50%;'>"?>
<form name="frmUser" method="post" action=""  enctype="multipart/form-data">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
</div>
    <tr>
    <td>
    <div class="input-container">
        <i class="fa fa-user icon"></i> 
            <input type="text" name="user" placeholder="Enter Name" size="53"  
            value="<?php echo $row['user'] ?>" readonly>
    </div>
    </td>
    </tr>
    <br>
    <tr>
    <td>
        <div class="input-container">
        <i class="fa fa-envelope icon" style="font-size:24px;"></i> 
        <input type="text" name="email" style="margin-right:1%;" placeholder="Enter Email"  size="53" value="<?php echo $row['email'] ?>">
    </div>
    </td>
    </tr>
    

    <tr><td><div class="input-container">
    <i class="fas fa-key icon" style="font-size:24px;"></i>
    <input type="text" name="password" placeholder="Password" size="53" value="<?php echo $row['password'];?>" >
    <br><br></div></td></tr>
    
    <br>
	<tr><td><div class="input-container">
	<i class="fas fa-table" style="font-size: 24px; margin-left:3%"></i>
    <input type="date" name="dob" placeholder="Enter Date" style="margin-left:2%"
			value="<?php echo $row['dob'];?>">
			</div></td></tr>
        
		<tr><td><div class="input-container">
        <i class='far fa-dot-circle' style='font-size:24px; margin-left:3%;' ></i>
        <br>
        <input type="radio" name="gender"  value="male" style="margin-left:3%" 
                <?php if($row['gender']=="male"){echo "checked";}?> > Male &nbsp;
                <input type="radio" name="gender"  value="female" 
                <?php if($row['gender']=="female"){echo "checked";}?>> Female <br><br></div></td></tr>

    
            <tr><td><div class="input-container">
			<i class="fas fa-globe" style="font-size:24px; margin-left:3%"></i>
			<select name="country"  value="<?php echo $row['country'];?>" style="margin-left:3% ;" id="countyList">
                    <option value="" selected="selected"  hidden><?php echo $row['country'];?></option>
                </select><br>
			</div></td></tr>

	        
		
			<tr><td><div class="input-container">
			<i class="fas fa-city" style="font-size: 24px; margin-left:3%;" ></i>
			<select name="state"  value="<?php echo $row['state'];?>" style="margin-left: 2%;" id="stateList">
                    <option value="" selected="selected" hidden><?php echo $row['state'];?></option>
                </select> <br>
			</div></td></tr>
			
			

            <tr><td><div class="input-container">
	        <i class="fas fa-city" style="font-size:24px; margin-left:3%"></i>
		        <select name="city"  value="<?php echo $row['city'];?>" style="margin-left:2%" id="cityList"> 
                    <option value="" selected="selected" hidden><?php echo $row['city'];?></option>
                </select><br>
			</div></td></tr>

    <tr>
    <td>
        <div class="input-container">
        <i class="fas fa-portrait" style="font-size: 24px ;  margin-left:4%"></i>
         <?php echo $row['image'] ;?>
        <input type="file" name="image" onchange="loadfile(event)" style="margin-left:3%">
        </div></td></tr>

<tr><td>
    <input type="submit" name="submit" value="Update" class="btn" size="53" style="margin-left:30%" >
    <a href="profile.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary" class="back"
    style= "text-decoration:none;">Back</a>
    </td></tr>
</form>
</table>
</div>
<script type="text/javascript">
    function loadfile(event){
    var output=document.getElementById('image');
    output.src=URL.createObjectURL(event.target.files[0]);
    }



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
</script>

</body>
</html>