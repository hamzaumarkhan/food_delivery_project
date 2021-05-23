<?php
  session_start();

include('admin/includes/db.php');
include('includes/header.php');?>
<!--container-->
<div class="page-heading">
</div>
<div class="content">
	<div class="top-cate">
			<section class=" mt-2 p-4">
				<div class="container">

					<?php if ($_SESSION['cartisempty']==0) {?>
					<div class="row card shadow-lg mb-5">
						<?php
         echo ' <table class="table text-center table-bordered border-dark table-hover" >
			<tr class="h4">
				<th>ID</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Action</th>
			</tr>';
         $_SESSION['total']=0;
         
		$sql="SELECT * FROM cart WHERE user_ip='$_SESSION[myip]' AND purchase_status='0' ";
		$run=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($run)) {
		echo '<tr>
		'; ?>

		<?php 
         $sqll="SELECT id,title,price FROM product WHERE id='$row[menu_id]'";
		$runl=mysqli_query($conn,$sqll);
		while($rowl=mysqli_fetch_assoc($runl)) { 

		echo '<td>'.$rowl['title'].'</td>
         <td>'.$rowl['price'].'</td>';
    	$_SESSION['total']=$_SESSION['total']+$rowl['price'];
		}
         
         ?>


		<?php echo'   <td><a  onclick="confirm_this('.$row['id'].');"  class="pointer" title="Confirm"><i class="fa fa-trash text-danger"></i></a></td>
      
         </tr>
		 
		 <td class="datatable-cell datatable-toggle-detail " style="width:50px" >  '.$row['id'].' </td>
		 <td class="datatable-cell datatable-toggle-detail w-50" >  '.$row['id'].' </td>
		 <td class="datatable-cell datatable-toggle-detail w-50" >  '.$row['id'].' </td>
	  
		 <td class="datatable-cell datatable-toggle-detail  "style="width:100px"> 
	   
			 
		 <a onclick="del_service('.$row['id'].');" class="btn btn-danger" title="Delete"><i class="fas fa-trash fa-1x"></i></a>
		  </td>';
		}
		echo '   </table>';
         ?>

						<div class="row col-12 text-right">
							<div class="col-md-6 offset-md-5">
								<h4 class="mb-4">Total : <?php echo $_SESSION['total'];?></h4>
								<?php
         if ($_SESSION['total']==0) {
           echo 'Cart is Empty
           ';
         } else {
           echo '<a href="pickup.php"  class="btn btn-warning col-3 mb-4 btn-sm btn-round text-white ">check out</a>
           ';
         }
         ?>
							</div>

						</div>


						<?php echo '   </div>';}
		  else {
			echo '
				<script>alert("Cart is Empty");</script>';
      }?>
			</section>
		</div>
	</div>
	
	<!-- order now modal -->

	


<script>
	function run_modal() {
		$('#myModal').modal('show');
	}

	function close_modal() {
		$('#myModal').modal('hide');
	}

	// For Add to cart
	function add_cart(id) {

		$.ajax({
			type: "GET",
			url: 'cart/add.php',
			data: {
				id: id
			},
			success: function (response) {
				alert(response);
				get_cart();
			}
		});



	}
</script>

<?php include('includes/footer.php');?>