<?php
include('db.php');

if(isset($_GET['status']))
    {
        $id=$_GET['status'];
        $select=mysqli_query($con,"select * from usertable1 where id='$id'");
        while($row=mysqli_fetch_object($select))
        {
            $status_var=$row->status;
            if($status_var=='0')
            {
                $status_state=1;
            }
            else
            {
                $status_state=0;
            }
            $update=mysqli_query($con,"update usertable1 set status='$status_state' where id='$id' ");
            if($update)
            {
                header("Location:welcome.php");
            }
            else
            {
                echo mysqli_error($con);
            }
        }
?>
<?php
    }
?>