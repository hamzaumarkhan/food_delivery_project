<?php 

include('../includes/db.php');
    $update_id=$_POST['id'];
	$name=$_POST['name'];


if(isset($_POST['submit'])){
    echo "Submit Button Clicked";
    $query=mysqli_query($con,"Update user 
    SET name='$name' where id=$update_id");

    $result = mysqli_query($con,$query);
    header('location:category.php');  
}


?>