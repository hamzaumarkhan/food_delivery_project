<?php
      include('../includes/db.php');
   
        
        $sql="DELETE FROM product WHERE id ='$_GET[id]'";
        $run=mysqli_query($conn,$sql);
        if($run){
          echo "<script>alert('Done');</script>";
        }else{
          echo "<script>alert('Errror');</script>";
        }
    
?>
