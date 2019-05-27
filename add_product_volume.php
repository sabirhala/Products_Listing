<?php
include('include/header.php');
include('include/left.php');
$temp_id = $_GET['id'];
echo $temp_id;

if(isset($_GET['id']) && $_GET['id'] != '') {

    $query = "SELECT * FROM product_volume WHERE ProVolID=" . $_GET['id'];
    $row = $dbc->QueryGetRow($query);
}
?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Add Product Volume</h1>
        </section>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form role="form" id="category_form" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="category_name">Product Volume Name</label>
                                    <input type="text" class="form-control" name="volume_name" id="volume_name" placeholder="Product Volume Name" value="<?php if($temp_id != '') { echo $row['ProValName']; }?>" >
                                    <input type="hidden" name="cat_id" id="cat_id" value="<?php if($temp_id != '') { echo $row['ProVolID']; }?>">
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                <a href="product_volume.php" class="btn btn-primary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#category_form').validate({
                rules: {
                    volume_name: {required: true},
                },
                messages: {
                    volume_name: {required: "Product Volume Name required"},
                },
                submitHandler: function (form) {
                    var data = new FormData($('#category_form')[0]);
                    $.ajax({
                        type: 'post',
                        data: data,
                        dataType: "json",
                        url: "core/add_category.php",//Performing opertion on same file to reduce the file count
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (r) {
                            if (r.status == 200) {
                                toastr.success(r.message, 'Success');
                                $("#category_form")[0].reset();
                                $('form :input').val('');

                            } else
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

include('include/footer.php');
?>