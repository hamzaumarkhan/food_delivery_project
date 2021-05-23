 <?php
 session_start();


 include('../admin/includes/db.php');
$sql="DELETE FROM cart WHERE id='$_GET[id]'";
$run=mysqli_query($conn,$sql);
if($run) {
echo 'done';
}
?>
