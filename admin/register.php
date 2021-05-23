
<?php include("includes/header.php"); 
if(isset( $_SESSION['email'])) {
     header('Location:dashboard.php');
}
?>
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <!--begin::Aside-->

        <!--end::Aside-->
        <!--begin::Content-->
        <div
            class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">

            <!--begin::Content body-->
            <div class="d-flex flex-column-fluid flex-center">
                <!--begin::Signin-->
                <div class="login-form login-signin">
                    <div class="">
                        <form class="form m-4" id="register_form" name="form1" method="post">
                            <!--begin::Title-->
                            <div class="pb-13 pt-lg-0 pt-5 text-center">
                                <div class="symbol symbol-150 symbol-lg-120">
                                    <img alt="Pic" src="assets/images/logo.jpg">
                                </div>
                                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Sign Up with Food
                                    Delivery</h3>
                            </div>
                            <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            </div>
                            <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            </div>
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Name:</label>
                                <input type="text" class="form-control form-control-solid h-auto p-6 rounded-lg"
                                    id="name" placeholder="Name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Email:</label>
                                <input type="email" class="form-control form-control-solid h-auto p-6 rounded-lg"
                                    id="email" placeholder="Email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Phone:</label>
                                <input type="text" class="form-control form-control-solid h-auto p-6 rounded-lg"
                                    id="phone" placeholder="Phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Address:</label>
                                <input type="text" class="form-control form-control-solid h-auto p-6 rounded-lg"
                                    id="address" placeholder="Address" name="address">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control form-control-solid h-auto p-6 rounded-lg"
                                    id="password" placeholder="Password" name="password">
                            </div>

                            <input type="button" name="save" class="btn btn-warning" value="Register" id="butsave">
                            <a class="btn btn-light text-warning border border-warning pr-4" href="index.php">Now you
                                are Login!</a>
                        </form>
                    </div>
                    <!--end::Form-->
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
            $(document).ready(function () {
                $('#butsave').on('click', function () {
                    $("#butsave").attr("disabled", "disabled");
                    var name = $('#name').val();
                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var address = $('#address').val();
                    var password = $('#password').val();
                    if (name != "" && email != "" && phone != "" && address !== "" && password != "") {
                        $.ajax({
                            url: "includes/save-inc.php",
                            type: "POST",
                            data: {
                                type: 1,
                                name: name,
                                email: email,
                                phone: phone,
                                address: address,
                                password: password
                            },
                            cache: false,
                            success: function (dataResult) {
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    $("#butsave").removeAttr("disabled");
                                    $('#register_form').find('input:text').val('');
                                    $("#success").show();
                                    $('#success').html('Registration successful!');
                                } else if (dataResult.statusCode == 201) {
                                    $("#error").show();
                                    $('#error').html('Email ID already exists !');
                                }

                            }
                        });
                    } else {
                        alert('Please fill all the field !');
                    }
                });
            });
        </script>
        <?php include("includes/footer-scripts.php"); ?>