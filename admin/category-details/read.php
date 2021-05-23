<?php
include('../includes/db.php');


    if(isset($_GET['action'])) {
        $sql="SELECT * FROM category ORDER BY id DESC";
        $result = mysqli_query($conn,$sql);
        while( $row = mysqli_fetch_assoc($result)) {
            echo '
            <tr  class="datatable-row">
                <td class="datatable-cell  datatable-cell-sort w-25">'.$row['id'].'</td>
                <td class="datatable-cell datatable-cell-sort w-50">'.$row['name'].'</td>
                <td  class="datatable-cell datatable-cell-sort">
                    <button class="btn btn-sm btn-warning" onclick=" edit('.$row['id'].');"><i class="fa fa-edit fa-1x"></i></button>
                    <button class="btn btn-sm btn-danger" onclick=" deldata('.$row['id'].');"><i class="fa fa-trash fa-1x"></i></button>
                </td>
            </tr>
            ';
        }
    }
    
    if(isset($_GET['id'])) {

        $sql="SELECT * FROM category WHERE id='$_GET[id]'";
        $run=mysqli_query($conn,$sql);
        while( $row= mysqli_fetch_assoc($run)) {
            echo '<form id="myeditform">
            <div class="form-group">
            <label for="id" class="col-form-label"></label>
            <input type="hidden" id="id" class="form-control" value="'.$row['id'].'" >
          </div>

            <button type="submit" name="submit" class="btn btn-warning"  onclick="update();">update</button>
       
          </form>';
        }
      }



?>
