<?php include('includes/header.php');?>

<!--begin::Aside-->
<?php include('includes/sidebar.php');?>
<!--end::Aside-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i>Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="myform">
            <div class="form-group">
              <label for="name" class="col-form-label">Name:</label>
              <input type="text" name="name" class="form-control">
            </div>
            <button type="button" class="btn btn-warning" onclick="add();">Submit</button>

          </form>
        </div>

      </div>
    </div>
  </div>


  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="editmodaldata">

        </div>
      </div>
    </div>
  </div>
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
						<h5 class="text-dark font-weight-bold my-1 mr-5">Category</h5>
						<!--end::Page Title-->
					</div>
					<!--end::Page Heading-->

				</div>
				<!--end::Info-->
				<!--begin::Toolbar-->
				<div class="d-flex align-items-center flex-wrap">
					<!--begin::Dropdown-->
					<div class="dropdown dropdown-inline">
						<a href="#" class="btn btn-fixed-height btn-warning font-weight-bolder font-size-sm px-5 my-1"onclick="run_modal();">
							<span class="svg-icon svg-icon-md"><i class="fa fa-plus"></i></span>Add Category
						</a>
					</div>
					<!--end::Dropdown-->
				</div>
				<!--end::Toolbar-->
			</div>
		</div>
				
					<div class="container" id="loaddata">

					</div>
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
							<div class="card-body d-flex align-items-center justify-content-between  ">
								<div class="container" id="loaddata">
									<div class="datatable datatable-default datatable-primary datatable-loaded">
										<table
											class="table-bordered table-sm   table-hover datatable-sm datatable-table  text-center datatable-sm ">
											<thead class="datatable-head bg-light-warning text-warning">
												<tr class="datatable-row ">

													<th class="datatable-cell  datatable-cell-sort w-25" >
														Id </th>
													<th class="datatable-cell datatable-cell-sort w-50"> name </th>

													<th class="datatable-cell datatable-cell-sort w-25  "
														> Action </th>
												</tr>
											</thead>
											<tbody class="datatable-body" id="response">
												
											</tbody>
										</table>
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
	<script>
	  var refresh =
      '<button class="buttonload btn-success" style="margin-left:50%"><i class="fa fa-refresh fa-spin"></i>Loading</button>'

    var loader = '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>';
	var x =
       '<div class="row"><div class="col-12 text-center"> <div class="spinner-border text-warning" role="status"><span class="sr-only">Loading...</span></div></div></div>';
	$(document).ready(function() {
		document.getElementById('loaddata').innerHTML = x;
       //     setTimeout(function() { load_service(); }, 1000);

       setTimeout(function () {
        
       }, 3000);
       $("#loaddata").load("category-details/read.php");
	   read_data();  
	//    $('#loaddata').hide()

    

});
// reaed data
  function read_data() {
    
    $('#response').load('category-details/read.php?action=get');
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
			url: 'category-details/del.php',
			success: function(data){
        // reload(true);
        $('#response').html(loader);
        setTimeout(read_data, 1000);
        
      	}
		});
  }
  
}

/// insert record

function add()  {
//  alert('hello world');

    if(fetch('category-details/insert.php',{
             method:"POST",
             body:new FormData(document.getElementById('myform'))
           }))
           
           {
    //  alert('reodrd inserted');
     
    close_modal();
    read_data();
    document.getElementById('myform').reset();    
    $('#response').html(refresh);
        setTimeout(read_data, 5000);
           }
           else {
             
    //  alert('error');
           }
}


//   edit 

function edit(id)  {
  
  $('#editModal').modal('show');
  $('#editmodaldata').html(id);
  $('#editmodaldata').load('category-details/read.php?id='+id);

}

// Update Button 

function update()  {
//  alert('hello world');

    if(fetch('category-details/update.php',{
              method:"POST",
              body:new FormData(document.getElementById('myeditform'))
            }))
            
          {
          close_modal();
          read_data();
          document.getElementById('myeditform'); 
          alert('Record Updated');   

          }
          else {
            
      alert('error');
          }
  }
  
	
	</script>
	<?php include('includes/footer.php');?>

</div>
<!--end::Wrapper-->
<?php include('includes/footer-scripts.php');?>