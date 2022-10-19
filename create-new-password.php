<?php

    require "db.php";

?>


<html>
<head>
<title></title>
</head>
<body>

<?php

    $selector= $_GET["selector"];
    $validator= $_GET["validator"];

    if(empty($selector) || empty($validator)){
        echo "Could not validate your request";
    }else{
       if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
        ?>

    <form action="reset.php" method="post">
    
        <input type="hidden" name="selector" value="<?php echo $selector ?>">
        <input type="hidden" name="selector" value="<?php echo $validator ?>">
    
        <input type="password" name="pwd" placeholder="Enter a new password..">
        <input type="password" name="pwd-reapeat" placeholder="Repeat new password..">
        <button type="submit" name="submit">Reset Password</button>
    
    
    </form>


<?php } } ?>












</body>
</html>