<?php
require 'include/config.php';
session_start();
if(isset($_SESSION) && !empty($_SESSION)){
    header('location: dashboard.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Varshani Products| Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/css/blue.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="index.php"><b>VArshani Products</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in here</p>

        <form method="post" id="login-form">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <span><i class="fa fa-envelope form-control-feedback"></i></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span><i class="fa fa-lock form-control-feedback"></i></span>
            </div>
            <div class="row">
                <div class="col-xs-8">

                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit" id="submit">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- /.social-auth-links -->

        <a href="forgot_password.php">I forgot my password</a><br>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/additional-methods.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="assets/js/bootbox.min.js"></script>
<script src="assets/js/custom_script.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#login-form').validate({
            rules: {
                email: {required: true,email:true},
                password: {required: true}
            },
            messages: {
                email: {required: "Email required"},
                password: {required: "Password required"}
            },
            submitHandler: function (form) {
                var data = new FormData($('#login-form')[0]);
                $.ajax({
                    type: 'post',
                    data: data,
                    dataType: "json",
                    url: "core/login.php",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (r) {
                        if (r.status == 200) {
                            toastr.success(r.message, 'Success');
                            $("#login-form")[0].reset();
                            window.location = 'dashboard.php';
                        }
                        else
                        {
                            toastr.error(r.message, 'Error');
                        }
                    },
                });
            }
        });
    });
</script>
</body>
</html>
