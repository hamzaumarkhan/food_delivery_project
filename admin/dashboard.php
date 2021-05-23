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
						<h5 class="text-dark font-weight-bold my-1 mr-5">Order</h5>
						<!--end::Page Title-->
					</div>
					<!--end::Page Heading-->

				</div>
				<!--end::Info-->
				<!--begin::Toolbar-->
				
				<!--end::Toolbar-->
			</div>
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
							<div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
								<div class="container-xl">
									<div class="table-responsive">
										<div class="table-wrapper">
											<table class="table table-striped table-hover table-bordered border border-warning">
												<thead class="datatable-head bg-light-warning text-warning">
													<tr>
														<th>Id</th>
														<th>Name</th>
														<th>Email</th>
														<th>Address</th>
														<th>Product</th>
														<th>Phone</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
													<tr class="bg-white">
														<td>1</td>
														<td>Admin</td>
														<td>admin@admin.com</td>
														<td>Rawalpindi</td>
														<td>Food</td>
														<td>(171) 555-2222</td>
														<td>
															<a href="#"
																class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																<span class="svg-icon svg-icon-md svg-icon-primary">
																	<!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Communication/Write.svg-->
																	<button class="btn btn-sm btn-warning" ><i class="fa fa-edit fa-1x text-light"></i></button>
																	<!--end::Svg Icon-->
																</span>
															</a>
															<a href="#"
																class="btn btn-icon btn-light btn-hover-primary btn-sm">
																<span class="svg-icon svg-icon-md svg-icon-primary">
																	<!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/General/Trash.svg-->
																	
																	<button class="btn btn-sm btn-danger" ><i class="fa fa-trash fa-1x text-light"></i></button>
																	<!--end::Svg Icon-->
																</span>
															</a>
														</td>
													</tr>
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

	<?php include('includes/footer.php');?>

</div>
<!--end::Wrapper-->
<?php include('includes/footer-scripts.php');?>