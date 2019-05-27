<?php
include('include/header.php');
include('include/left.php');
$temp_id = $_GET['id'];
if(isset($_GET['id']) && $_GET['id'] != '') {
    $query = "SELECT * FROM category WHERE CategoryID=" . $_GET['id'];
    $row = $dbc->QueryGetRow($query);
}
?>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Add Category</h1>
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
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name" value="<?php if($temp_id != '') { echo $row['CategoryName']; }?>" >
                                    <input type="hidden" name="cat_id" id="cat_id" value="<?php if($temp_id != '') { echo $row['CategoryID']; }?>">
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="uploadimage">Category Imgage: </label>
                                <input type="file" name="uploadimage" id="uploadimage"/>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="category_dis">Discription</label>
                                    <input type="text" class="form-control" name="category_dis" id="category_dis" placeholder="Category Discription" value="<?php if($temp_id != '') { echo $row['CatDis']; }?>" >
                                    <input type="hidden" name="cat_id" id="cat_id" value="<?php if($temp_id != '') { echo $row['CategoryID']; }?>">
                                </div>

                            </div>
                            <?php
                            if ($temp_id != '' && $row['isheader']=='true')
                            {?>
                                <div class="box-body">
                                <div class="form-group">
                                    <label for="ischeked">IS Header Image</label>
                                    <input type="checkbox" name="ischeked" value="true" checked>
                                </div>

                            </div>
                           <?php }
                            else {
                                ?>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="ischeked">IS Header Image</label>
                                        <input type="checkbox" name="ischeked" value="true">
                                    </div>

                                </div>
                                <?php
                            }
                            ?>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                <a href="category.php" class="btn btn-primary">Cancel</a>
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
                    category_name: {required: true},
                    category_dis:{required:true},


                },
                messages: {
                    category_name: {required: "Category Name required"},
                    category_dis:{required:"Discrption Reqiured"},

                },
                submitHandler: function (form) {
                    var data = new FormData($('#category_form')[0]);
                    $.ajax({
                        type: 'post',
                        data: data,
                        dataType: "json",
                        url: "core/add_category.php",
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