<?php
include('../includes/db.php');


    $sql="INSERT INTO category(name) VALUES 
    ('$_POST[name]')";
        $run=mysqli_query($conn,$sql);
    if($run) {
       echo  "<script>alert('Done');</script>";
    }


?>
