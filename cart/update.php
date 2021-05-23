<?php
session_start();
 include('../admin/includes/db.php');

if($_SESSION['updateservicecategoryname']!=$_POST['updateservicecategoryname']) {
$name=$_POST['updateservicecategoryname'];
}
else {
    $name=$_SESSION['updateservicecategoryname'];
}



$sql="UPDATE service_category SET name='$name' WHERE  id='$_POST[updateservicecategoryid]'";
$run=mysqli_query($conn,$sql);
header('location:../service_category.php?action=done');
    
          ?>
