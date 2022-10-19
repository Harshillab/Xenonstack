<html>
<head>
</head>
<body>
<table>
<?php
include('config/db.php');

// $id=$_GET['id'];

if(isset ($_GET['id'])){
     
    $id = mysqli_real_escape_string($con, $_GET['id']);

    // make  sql 
    $s = "SELECT * FROM usertable where id = $id";

        $q="SELECT * FROM `usertable` WHERE id='".$_POST['id']."'";
        $run=mysqli_query($con,$q);
        $data=mysqli_fetch_assoc($run);



if(isset($_POST['update']))
{

  $file_name = $_FILES['attach']['name'];
  $file_size =$_FILES['attach']['size'];
  $file_tmp =$_FILES['attach']['tmp_name'];
  $file_type=$_FILES['attach']['type'];
  $file_store="image/".$file_name;

  // $profile_name=$_FILES[$file_name];

  // Delete old image from database
  if (file_exists($file_store)){
  unlink("image/".$file_name);}
  //inserting new image in database
  move_uploaded_file($file_tmp,"image/".$file_name);
  $con=mysqli_connect('localhost','root','','form');

  $update=mysqli_query($con,"UPDATE usertable SET file='".$file_name."' WHERE id='" . $_POST['id'] . "'");  

    $result = mysqli_query($con, $s);

        $s = "UPDATE  usertable set  user='$user' , id= '$id'
            WHERE id= '$id'";

$result = mysqli_query($con,"SELECT * FROM usertable WHERE id='" . $_POST['id'] . "'");

$row= mysqli_fetch_array($result);
}

else{  ?>

<!-- 
$name=$_POST['name'];
$password=$_POST['password'];

$img1=$_FILES['attach']['name'];
$temp1=$_FILES['attach']['tmp_name'];
$file_store= "image/".$img1;
if(file_exists($file_store))
{
$sname=$_GET['sname'];
unlink("image/$img");
}
move_uploaded_file($temp1,"image/".$img1);

}
$con=mysqli_connect('localhost','root','','form');
$q="UPDATE `form1` SET `name`='$name','password`='$password',`file`='$img1' WHERE name='$name'";
$update=mysqli_query($con,$q);
if($update==TRUE)
{
echo "done";
}
else{
echo "not done";
}?> -->


<form action="" method="post" enctype="multipart/form-data">
<tr>
<td>name</td>
<td><input type="text" name="user" value="<?php echo $data['name'];?>"></td>
</tr>
<tr>
<td>id</td>
<td><input type="text" name="id" value="<?php echo $data['id'];?>"></td>
</tr>
<tr>
<td>image</td>
<td><?php echo "<img src=profile/$data[file] class='rounded-circle' style='width:100px; height:100 px;'>"?>
<input type="file" name="attach" ></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="update" value="update"></td>
</tr>
</form>
</table>
</body>
</html>


<?php }  } ?>