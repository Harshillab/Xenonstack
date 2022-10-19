
<?php  include('design.php');

	include('db.php');

	// check GET request id param
	$id = mysqli_real_escape_string($con, $_GET['id']);

   	$s = "DELETE FROM usertable1 WHERE id= '$id'";

   	if (mysqli_query($con, $s)) {
    	// echo '<script>alert("Record deleted successfully")</script>';
    	header("Location: welcome.php");

	} else {
    	echo "Error deleting record: " . mysqli_error($con);
	}
		mysqli_close($con);
   
?>

<!-- 
<div class="col-md-6 login-right box"> 
	<h2 style="margin:auto">   </h2>
		<center>
			<a href="welcome.php" class="btn btn-primary" class="back">Back</a> 
		</center>
	</div>
 -->





	
