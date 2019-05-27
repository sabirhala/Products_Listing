<?php
include('include/header.php');
include('include/left.php');
$temp_id = $_GET['id'];
echo $temp_id;

if(isset($_GET['id']) && $_GET['id'] != '') {

    $query = "SELECT * FROM sub_category WHERE SubCateID=" . $_GET['id'];
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
                                    <select class="form-control" name="category_name" id="category_name" >
                                        <option value="">Select</option>
                                        <?php
                                        $query="select * from category";
                                        $result=$dbc->Query($query);
                                        while ($row1=$result->fetch_assoc()){
                                            if ($row1['CategoryID'] == $row['CategoryID']){
                                                echo "<option value='" . $row1['CategoryID'] . "' selected>" . $row1['CategoryName'] . "</option>";
                                            }
                                            else {
                                                echo "<option value='" . $row1['CategoryID'] . "'>" . $row1['CategoryName'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="sub_category_name">Sub Category Name</label>
                                    <input type="text" class="form-control" name="sub_category_name" id="sub_category_name" placeholder="Sub_Category Name" value="<?php if($temp_id != '') { echo $row['SubCateName']; }?>" >
                                    <input type="hidden" name="cat_id" id="cat_id" value="<?php if($temp_id != '') { echo $row['SubCateID']; }?>">
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                <a href="sub_category.php" class="btn btn-primary">Cancel</a>
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
                    category_name:{required:true},
                    sub_category_name: {required: true}
                },
                messages: {
                    category_name: {required: "Category Name required"},
                    sub_category_name:{required: "Sub Category Name required"}
                },
                submitHandler: function (form) {
                    var data = new FormData($('#category_form')[0]);
                    $.ajax({
                        type: 'post',
                        data: data,
                        dataType: "json",
                        url: "core/add_sub_category.php",
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