<?php
include('../includes/db.php');

    $title = $_POST['title'];
		$description = $_POST['description'];
 		$price = $_POST['price'];
		 $link = $_POST['link'];
		$target_dir = "../../assets/img/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
	if(isset($_FILES['image'])){
		// echo "<pre>";
		// print_r($_FILES);
		// echo "<pre>";
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_tmp = $_FILES['image']['tmp_name'];
		$file_type = $_FILES['image']['type'];

		if (move_uploaded_file($file_tmp, $target_file)) {
		$dbpath='assets/img/'.basename($_FILES["image"]["name"]);
		//echo $dbpath;
		$sql="INSERT INTO product (title, description, price, image, link) 
	 	VALUES ('$title','$description','$price','$dbpath','$link')";
		 //echo $sql;
		 if(mysqli_query($conn,$sql)){
			echo '<script>alert("Recorded Added Successful");</script>';
 			
			} else {
			echo "Error";
		 	}
		}
	}
            // $sql="INSERT INTO product(title, description, price,image) VALUES 
            // ('$_POST[title]','$_POST[description]','$_POST[price]','$_POST[$dbpath]')";
            //     $run=mysqli_query($conn,$sql);
            // if($run) {
            //     echo'Success';
            // }




// $sql="INSERT INTO product(title, description, price,image) VALUES 
// ('$_POST[title]','$_POST[description]','$_POST[price]','$_POST[image]')";
//     $run=mysqli_query($conn,$sql);
// if($run) {
//     echo'Success';
// }

?>
