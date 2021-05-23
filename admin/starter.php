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
						<h5 class="text-dark font-weight-bold my-1 mr-5">Page Header</h5>
						<!--end::Page Title-->
					</div>
					<!--end::Page Heading-->

				</div>
				<!--end::Info-->
				<!--begin::Toolbar-->
				<div class="d-flex align-items-center flex-wrap">
					<!--begin::Dropdown-->
					<div class="dropdown dropdown-inline">
						<a href="#" class="btn btn-fixed-height btn-primary font-weight-bolder font-size-sm px-5 my-1">
							<span class="svg-icon svg-icon-md">Icon</span>New Report
						</a>
					</div>
					<!--end::Dropdown-->
				</div>
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
						<div class="card-header border-0 pt-6">
							<h3 class="card-title">
								<span class="card-label font-weight-bolder font-size-h4 text-dark-75">Weekly Sales</span>
							</h3>						
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body d-flex align-items-center justify-content-between pt-7 flex-wrap">
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime autem saepe magni sit unde repellat. Vitae tenetur ullam at repellendus quasi a, id, qui inventore illum optio natus minus reiciendis? Perspiciatis odit ipsum molestiae fuga eligendi doloremque, natus vitae ducimus doloribus optio quo quibusdam dicta illum possimus assumenda accusantium adipisci necessitatibus impedit est aliquam enim! Voluptas impedit soluta culpa reprehenderit est eveniet odit obcaecati tempore sapiente voluptatum, sunt repellat perspiciatis quaerat quas pariatur enim fuga esse. Aliquid porro rerum, provident vero omnis ex est excepturi non placeat, ipsa eveniet! Sint eveniet ex, at error ducimus dolorum temporibus sapiente corrupti alias?</p>
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