<?php
session_start();
include('../includes/db.php');


if(isset($_GET['action'])) {
    $sql="SELECT * FROM product ORDER BY id ASC";
    $result = mysqli_query($conn,$sql);
    while( $row = mysqli_fetch_assoc($result)) {
        echo '<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['title'].'</td>
            <td>'.$row['description'].'</td>
            <td>'.$row['price'].'</td>
            <td>'.$row['link'].'</td>
            <td width="10%">'.($row['image'] == '' ? 'No Image' : '<img src="../'.$row['image'].'" width="100px">').'</td>
            <td>
                <button class="btn btn-warning m-2 btn-sm " onclick=" edit('.$row['id'].');"><i class="fa fa-edit"></i></button>
                <button class="btn btn-danger m-2 btn-sm" onclick=" deldata('.$row['id'].');"><i class="fa fa-trash"></i></button>
            </td>
        </tr>';
    }
}
    
    
    if(isset($_GET['id'])) {

        $sql="SELECT * FROM product WHERE id='$_GET[id]'";
        $run=mysqli_query($conn,$sql);
        while( $row= mysqli_fetch_assoc($run)) {
            $title=$row['title'];
            $description=$row['description'];
            $price=$row['price'];
            $link=$row['link'];
        }
            echo '<form id="myeditform">
          <div class="form-group">
          <label for="name" class="col-form-label">Title:</label>
          <input type="text" name="title" value="'.$_SESSION['title']=$title.'" class="form-control">
        </div>
        <div class="form-group">
          <label for="description" class="col-form-label">Description:</label>
          <input type="text" name="description" value="'.$_SESSION['description']=$description.'" class="form-control">
        </div>
        <div class="form-group">
          <label for="price" class="col-form-label">Price:</label>
          <input type="text" name="price"  value="'.$_SESSION['price']=$price.'"  class="form-control">
        </div>
        <div class="form-group">
          <label for="link" class="col-form-label">link:</label>
          <input type="text" name="link"  value="'.$_SESSION['link']=$link.' class="form-control">
        </div>
            <button type="submit" name="submit" class="btn btn-warning"  onclick="update();">update</button>
       
          </form>';
        
      }



?>
