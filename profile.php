<?php
include 'include/header.php';
include 'include/left.php';

if(isset($_GET['id'])){
    $query = 'SELECT * FROM userdetail WHERE adminid =' . $_GET['id'];
    $row = $dbc->QueryGetRow($query);
}
?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1></h1>
        </section>
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="nav-tabs-custom">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs pull-right">
                            <li><a href="#password" data-toggle="tab">Change Password</a></li>
                            <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                            <li class="pull-left header"> Change Profile</li>
                        </ul>
                        <div class="tab-content no-padding">
                            <!-- Morris chart - Sales -->
                            <div class="chart tab-pane active" id="profile">
                                <div class="box box-primary">
                                    <!-- form start -->
                                    <form role="form" id="profile_form" method="post">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="hidden" name="userID" value="<?php echo $_SESSION['uID']; ?>">
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $_SESSION['unm']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $_SESSION['email']; ?>">
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                            <a href="dashboard.php" class="btn btn-primary">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="chart tab-pane" id="password" >
                                <div class="box box-primary">
                                    <form role="form" id="password_form" method="post">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="current_password">Current Password</label>
                                                <input type="hidden" name="userID" value="<?php echo $_SESSION['uID']; ?>">
                                                <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Current Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="new_password">New Password</label>
                                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="confirm_password">Confirm Password</label>
                                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                            <!-- <a href="dashboard.php" class="btn btn-primary">Cancel</a> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            $('#profile_form').validate({
                rules: {
                    username: {required: true},
                    email: {required: true,email: true}
                },
                messages: {
                    username: {required: "Username required"},
                    email: {required: "Email required",
                        email: "Please provide valid email address"
                    }
                },
                submitHandler: function (form) {

                    var data = new FormData($('#profile_form')[0]);
                    $.ajax({
                        type: 'post',
                        data: data,
                        dataType: "json",
                        url: "core/profile.php",
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (r) {
                            if (r.status == 200) {
                                toastr.success(r.message, 'Success');
                                $("#profile_form")[0].reset();
                            }
                            else
                            {
                                toastr.error(r.message, 'Error');
                            }
                        },
                    });
                }
            });

            $('#password_form').validate({
                rules: {
                    current_password: {required: true},
                    new_password: {required: true},
                    confirm_password: {required: true,equalTo: '#new_password'}
                },
                messages: {
                    current_password: {required: "Current Password required"},
                    new_password: {required: "New password required",
                    },
                    confirm_password: {equalTo: "Password and confirm password do not match.",
                        required: "Confirm Password required"},
                },
                submitHandler: function (form) {

                    var data = new FormData($('#password_form')[0]);
                    $.ajax({
                        type: 'post',
                        data: data,
                        dataType: "json",
                        url: "core/change_password.php",
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (r) {
                            if (r.status == 200) {
                                toastr.success(r.message, 'Success');
                                $("#password_form")[0].reset();
                                window.location = 'core/logout.php';
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

<?php
include 'include/footer.php';
?>