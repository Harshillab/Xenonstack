<?php  include('design.php');

include('db.php');


session_start();


    $s = "SELECT * FROM product";
    
    $result = mysqli_query($con, $s);


?> 
          

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


<html>
<head>

    
<style type="text/css">
 .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  margin: 10px;
}

.card{
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}



.product-image img {
  max-width: 100%;
}





</style>
</head>

<body>
<ul class="nav navbar-nav navbar-right">
	      	<li class="active"><a href="View_cart.php"><span class="badge"></span> <i class="fas fa-shopping-cart" style="font-size:72px; float:right;"></i> <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
			  
		  </ul>

<center>

<div class="container">
        <div class="row">

           <?php   while($row = mysqli_fetch_assoc($result))  { ?> 
         
            <div class="card">
                
                <div class="product-image"> 
            <?php echo "<img src=picture/$row[image] style='width:100px; height:100px;'>"?>
                </div>
                <h1><?php echo "{$row["name"]} "; ?></h1>
                <p class="price"> MRP: <strike><?php echo "₹"."{$row["mprice"]} "; ?></strike></p>
                <p class="price"> <?php echo "₹"."{$row["sprice"]} "; ?></p>
                <p> <?php echo "{$row["specification"]} "; ?></p>
                <p><button><a href="Cart.php?id=<?php echo $row["id"]; ?>">Add to Cart</a></button></p>
            </div>
           
            <br><br>
<?php } ?> 
        </div>
</div>
</center>

    <br>
    <div class="text-center">
        
    </div>


</body>
</html>
