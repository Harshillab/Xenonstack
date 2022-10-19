<?php

include("db.php");
include("design.php");
?>

<html>
<head>

<title></title>
</head>
<body>
    <h1> Reset your password </h1>
<form action="reset.php" method="post">
    <input type="text" name="email" placeholder="Enter your e-mail address..">
    <button type="submit" name="submit">Recieve new password</button>
</form>

<?php
    if(isset($_GET["reset"])){
        if($_GET["reset"] == "success"){
            echo "<p>Check your email</p>";
        }
    }

?>
</body>
</html>