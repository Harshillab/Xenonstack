
<?php  include('design.php');
		include('db.php');

	// check GET request id param
if(isset ($_GET['id'])){
     
    $id = mysqli_real_escape_string($con, $_GET['id']);

    // make  sql 
    $s = "SELECT * FROM usertable1 where id = $id";

    // get the query results
	$result = mysqli_query($con, $s);

	$row = mysqli_fetch_assoc($result);
	// close the conn
    // mysqli_free_result($result);
    // mysqli_close($con);

   // print_r($row);
}

?>


<html>
	<head>
		<style>
			tr:nth-child(even) {
    	background-color: #ffffe6;
  		}
     	tr:nth-child(odd) {
   		background-color: #e7f5fe;
  		}
		</style>
	</head>
	<body>
    <table  >
    	<tr>
            <th> ID </th>
	        <th> Name </th>
	        <th> Email </th>
	        <th> Password </th>
	        <th> DOB </th>
	        <th> Gender </th> 
	        <th> City </th> 
	        <th> State </th> 
	        <th> Country </th> 
	        <th> Image </th> 
	        <th> Created At </th>
        </tr>

    	<tr>
            <td><?php echo "{$row["id"]} "; ?> </td> 
    		<td><?php echo "{$row["user"]} "; ?> </td> 
    		<td> <?php echo"{$row["email"]} "; ?> </td>  
    		<td><?php echo "{$row["password"]} ";  ?> </td>
    		<td><?php echo "{$row["dob"]} ";  ?> </td>
    		<td><?php echo "{$row["gender"]} ";  ?> </td>
    		<td><?php echo "{$row["city"]} ";  ?> </td>	
    		<td><?php echo "{$row["state"]} ";  ?> </td>	
    		<td><?php echo "{$row["country"]} ";  ?> </td>	
    		<td><?php echo "<img src=picture/$row[image] class='rounded-circle' style='width:100px; height:100 px;'>"?>
</td>		
            

    		<td><?php echo "{$row["created_at"]} ";  ?> </td>
        </tr> 
	
	</table>

	
	<br>
    <div class="text-center">
    <!-- <a href="Cart.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary" class="back">Shop</a> -->
	<a href="Update.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary" class="back">Update</a>
        <a href="home.php" class="btn btn-primary" class="back">Back</a>
	</div>
	
	</body>
</html>







        