
<?php include("includes/header.php"); 
if(isset( $_SESSION['email'])) {
     header('Location:product.php');
}
?>
<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
		<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white"
			id="kt_login">
			<!--begin::Aside-->

			<!--end::Aside-->
			<!--begin::Content-->
			<div
				class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">

				<!--begin::Content body-->
				<div class="d-flex flex-column-fluid flex-center">
					<!--begin::Signin-->
					<div class="login-form login-signin">
						<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						</div>
						<div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						</div>

						<?php //include('includes/login/register.php'); ?>
						<!--begin::Form-->
						<div class="">						
							<form class="form m-4 " id="login_form" name="form1" method="post">					
								<!--begin::Title-->
								<div class="pb-13 pt-lg-0 pt-5 text-center">
									<div class="symbol symbol-150 symbol-lg-120">
										<img alt="Pic" src="assets/images/logo.jpg">
									</div>
									<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Login With Food Delivery</h3>
								</div>
								<!--begin::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">Email</label>								
									<input type="email" class="form-control form-control-solid h-auto p-6 rounded-lg" id="email_log" placeholder="Email" name="email">
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<div class="d-flex justify-content-between mt-n5">
										<label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
									</div>
									<input type="password" class="form-control form-control-solid h-auto p-6 rounded-lg" id="password_log" placeholder="Password" name="password">
								</div>
								<!--end::Form group-->
								<!--begin::Action-->							
								<input type="button" name="save" class="btn btn-warning btn-lg btn-block" value="Login" id="butlogin">
								<a class="btn btn-light border-warning text-warning mt-2" href="register.php">Register Now</a>
								<!--end::Action-->
							</form>
						</div>

						<!--end::Form-->
					</div>
					<!--end::Signin-->
				</div>
				<!--end::Content body-->
				<!--begin::Content footer-->
				<div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">

				</div>
				<!--end::Content footer-->
			</div>
			<!--end::Content-->
		</div>
		
		<!--end::Wrapper-->

<script>
$(document).ready(function() {

	$('#butlogin').on('click', function() {
		var email = $('#email_log').val();
		var password = $('#password_log').val();
		if(email!="" && password!="" ){
			$.ajax({
				url: "includes/save-inc.php",
				type: "POST",
				data: {
					type:2,
					email: email,
					password: password						
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						location.href = "product.php";						
					}
					else if(dataResult.statusCode==201){
						$("#error").show();
						$('#error').html('Invalid EmailId or Password !');
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>

<?php include("includes/footer-scripts.php"); ?>