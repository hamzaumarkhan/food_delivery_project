<?php
            session_start();


      include('../admin/includes/db.php');

$ag=0;


$sqll="SELECT * FROM cart WHERE user_ip='$_SESSION[myip]'";
$runl=mysqli_query($conn,$sqll);
while($rowl=mysqli_fetch_assoc($runl)) {
    if($rowl['menu_id']==$_GET['id'] && $rowl['user_ip']==$_SESSION['myip'] && $rowl['purchase_status']==0) {
 
     
$ag=1;
 break;
    }
     else {
        $ag=0;
        
     }
}

if ($ag===0) {
    $date=date('d-m-y');
    $sql="INSERT INTO cart(user_ip,date,menu_id,purchase_status) VALUES ('$_SESSION[myip]','$date','$_GET[id]','0')";
    $run=mysqli_query($conn,$sql);
    if($run) {
        echo 'Added to Cart';
        $_SESSION['total']=0;
        $_SESSION['cartfill']++;
     
    }
else {
    echo 'Error';
    
}   
}
else if($ag===1) {
    echo 'Already Added!';
}





          ?>
