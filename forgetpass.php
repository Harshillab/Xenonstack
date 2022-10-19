<html>
<head></head>

<body>
<form  method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <label> Password</label>
                  <input type="password" name="password" class="form-control"  aria-describedby="emailHelp">
                <input type="submit" name="password-reset-token" class="btn btn-primary">
              </form>
</body>
</html>


<?php 


if(isset($_POST['submit']))
{
    if(mysqli_query($con,"UPDATE usertable1 set  password='" . $password . "' WHERE email='" . $emailId . "'"))
    {
        echo "Password Updated Successfully";
    }
}
?>