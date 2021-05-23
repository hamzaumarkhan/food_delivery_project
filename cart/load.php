<?php
            session_start();

    
            include('../admin/includes/db.php');
echo '<div class="datatable datatable-default datatable-primary datatable-loaded">
   <table class="table-bordered table-hover datatable-sm datatable-table  text-center datatable-sm "  style="display: block;">
      <thead class="datatable-head bg-light-primary text-primary">
         <tr class="datatable-row p-5" >
    
            <th class="datatable-cell  datatable-cell-sort " style="width:50px" >  Id </th>
            <th  class="datatable-cell datatable-cell-sort w-50"  >  name </th>

            <th  class="datatable-cell datatable-cell-sort  " style="width:100px">  Action </th>
         </tr>
      </thead>
      <tbody style="" class="datatable-body ">';

$sql="SELECT * FROM product";
$run=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($run)) {
    echo '
         <tr  class="datatable-row p-0" >
            <td class="datatable-cell datatable-toggle-detail " style="width:50px" >  '.$row['id'].' </td>
            <td class="datatable-cell datatable-toggle-detail w-50" >  '.$row['title'].' </td>
         
            <td class="datatable-cell datatable-toggle-detail  "style="width:100px">';  
          
                echo '
            <a onclick="del_service('.$row['id'].');" class="btn btn-sm btn-clean btn-icon mr-1 border" title="Delete"><i class="fas fa-trash fa-1x"></i></a>
             </td>
          </tr>
         
    ';
}
echo '  </tbody>
   </table>

      
</div>';
    
          ?>
