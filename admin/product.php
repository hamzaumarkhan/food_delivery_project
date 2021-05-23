<?php include('includes/header.php');?>

<!--begin::Aside-->
<?php include('includes/sidebar.php');?>
<!--end::Aside-->

<!--begin::Wrapper-->
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

	<?php include('includes/topbar.php');?>

	<!--begin::Content-->
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Subheader-->
		<div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
			<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
				<!--begin::Info-->
				<div class="d-flex align-items-center flex-wrap mr-1">
					<!--begin::Page Heading-->
					<div class="d-flex align-items-baseline flex-wrap mr-5">
						<!--begin::Page Title-->
						<h5 class="text-warning font-weight-bold my-1 mr-5">Menu</h5>
						<!--end::Page Title-->
					</div>
					<!--end::Page Heading-->

				</div>
				<!--end::Info-->
				<!--begin::Toolbar-->
				<div class="d-flex align-items-center flex-wrap">
					<!--begin::Dropdown-->
					<div class="dropdown dropdown-inline">
						<a href="#" class="btn btn-fixed-height btn-warning font-weight-bolder font-size-sm px-5 my-1" onclick="run_modal();">
							<span class="svg-icon svg-icon-md"><i class="fas fa-plus-circle"></i></span>Add Product
						</a>
					</div>
					<!--end::Dropdown-->
				</div>
				<!--end::Toolbar-->
			</div>
		</div>
    <?php
      if(isset($_GET['action'])) {
    $action='
    <div class="container pt-5">
    <div class="alert alert-success alert-dismissible fade show " role="alert">
  <strong>Record Updated!</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
';
}
else {
    $action='';
}
?>
		<!--end::Subheader-->
		<!--begin::Entry-->
		<div class="d-flex flex-column-fluid">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Dashboard-->
				<!--begin::Row-->
				<div class="row">
					<div class="col-lg-12">
						<!--begin::Stats Widget 1-->
						<div class="card card-custom card-stretch gutter-b">
							<!--begin::Header-->
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
								<div class="container-xl" id="data_table">
                    <div class="container" id="loaddata">
                      <div class="d-flex justify-content-center text-warning">
                        <div class="spinner-border" role="status">
                          <span class="sr-only">Loading...</span>
                        </div>
                      </div>
                    </div>
									<div class="table-responsive">
										<div class="table-wrapper">
											<table class="table table-striped table-hover table-bordered border border-warning">
												<thead class="datatable-head bg-light-warning text-warning">
													<tr>
														<th>Id</th>
														<th>Title</th>
														<th>Description</th>
														<th>Price</th>
                            <th>D_link</th>
														<th>Image</th>
														<th>Actions</th>
													</tr>
												</thead>
													<tbody class="datatable-body" id="response">
													
													</tbody>
												
											</table>
										</div>
									</div>
								</div>
							</div>
							<!--end::Body-->
						</div>
						<!--end::Stats Widget 1-->
					</div>
				</div>
				<!--end::Dashboard-->
				<!--end::Container-->
			</div>
			<!--end::Entry-->
		</div>
	</div>
		<!-- Add Product Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="myform">
            <div class="form-group">
              <label for="name" class="col-form-label">Title:</label>
              <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
              <label for="description" class="col-form-label">Description:</label>
              <input type="text" name="description" class="form-control">
            </div>
            <div class="form-group">
              <label for="price" class="col-form-label">Price:</label>
              <input type="text" name="price" class="form-control">
            </div>
            <div class="form-group">
              <label for="image" class="col-form-label">Image:</label>
              <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
              <label for="link" class="col-form-label">Delivery Link</label>
              <input type="text" name="link" class="form-control">
            </div>
            <button type="button" class="btn btn-warning" onclick="add();">Submit</button>

          </form>
        </div>

      </div>
    </div>
  </div>
  	<!--End Add Product Modal -->
	   	<!-- Edit Product Modal -->
	  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body" id="editmodaldata">

        </div>
      </div>
    </div>
  </div>

 	<!--End Edit Product Modal -->
	<script>
	  var refresh =
      '<div class="spinner-border text-warning d-flex justifiy-content-center" role="status"><span class="sr-only">Loading...</span></div>'

    var loader = '<div class="spinner-border text-warning" role="status"><span class="sr-only">Loading...</span></div>';
	var x =
       '<div class="row"><div class="col-12 text-center"> <div class="spinner-border text-warning" role="status"><span class="sr-only">Loading...</span></div></div></div>';
	$(document).ready(function() {
      (function(){
          var loaddata = document.getElementById("loaddata"),
            
            show = function(){
          read_data();
              loaddata.style.display = "block";
              setTimeout(hide, 2000); // 2 seconds
          
            },

            hide = function(){
          
              loaddata.style.display = "none";
            };

          show();
        })();
		
	
       
	   read_data();  

	});
// reaed data
  function read_data() {
    
    $('#response').load('product_details/read.php?action=get');
  }
  
// Run modal

  function run_modal() {
     $('#myModal').modal('show');
  }
  

  function close_modal() {
    $('#myModal').modal('hide');
  }
  
// deletet 

function deldata(id) {
 // alert(id);
  if(confirm('Are you sure...?')) {
    $.ajax({
            type: 'GET',
            data: {id:id},	
			url: 'product_details/del.php',
			success: function(data){
        // reload(true);
        $('#response').html(refresh);
        setTimeout(read_data, 1000);
        
      	}
		});
  }
  
}

/// insert record

function add()  {
//  alert('hello world');

    if(fetch('product_details/insert.php',{
             method:"POST",
             body:new FormData(document.getElementById('myform'))
           }))
           
           {
    //  alert('reodrd inserted');
     
    close_modal();
    read_data();
    document.getElementById('myform').reset();    
    $('#response').html(refresh);
        setTimeout(read_data, 1000);
           }
           else {
             
    //  alert('error');
           }
}


//   edit 

function edit(id)  {
  
  $('#editModal').modal('show');
  $('#editmodaldata').html(id);
  $('#editmodaldata').load('product_details/read.php?id='+id);


}

// Update Button 
  function update(id) {
       var value = id;
      //  console.log('Done');
       $.ajax({
         type: 'GET',
         data: {
           id: value
         },
         url: 'product_details/update.php',
         success: function (data) {
           $("#editmodaldata").html(data);
           $('#editModal').modal('show');
         }
       });

     }
	
	</script>

	<?php include('includes/footer.php');?>

</div>
<!--end::Wrapper-->
<?php include('includes/footer-scripts.php');?>