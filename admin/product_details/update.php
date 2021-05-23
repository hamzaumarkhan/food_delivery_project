<?php 
include('../includes/db.php');
   

if(isset($_GET['submit'])){
    echo "Submit Button Clicked";
    $query=mysqli_query($conn,"Update product 
    SET name='$name' where id=$update_id");
    $result = mysqli_query($con,$query);
    header('location:product.php');  
}






?>