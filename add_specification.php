<?php
include('include/header.php');
include('include/left.php');
$temp_id = $_GET['id'];
if (isset($_GET['id']) && $_GET['id'] != '') {
    $query = "SELECT * FROM product_specification WHERE ProSpeID=" . $_GET['id'] . "";
    $row = $dbc->QueryGetRow($query);
}
?>
    <style type="text/css">
        .imagePreview {
            float: left;
            position: relative;
            margin-right: 20px;
        }

        .imagePreview a img{
            position: absolute;
            top: -6px;
            right: -6px;
        }
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            PRoduct Details
        </section>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->

                        <form role="form" id="property_form" method="post" enctype="multipart/form-data">
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <select class="form-control" name="product_name" id="product_name" >
                                        <option value="">Select</option>
                                        <?php
                                        $query="select * from product";
                                        $result=$dbc->Query($query);
                                        while ($row1=$result->fetch_assoc()){
                                            if ($row1['ProID'] == $row['ProID']){
                                                echo "<option value='" . $row1['ProID'] . "' selected>" . $row1['ProName'] . "</option>";
                                            }
                                            else {
                                                echo "<option value='" . $row1['ProID'] . "'>" . $row1['ProName'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="pid" value="<?php if($temp_id != '') { echo $row['ProSpeID']; }?>">

                                </div>

                                <div class="form-group">
                                    <label for="spe_index">Product Specification Index</label>
                                    <input type="number" class="form-control" name="spe_index" id="spe_index" value="<?php if($temp_id != '') { echo $row['ProSpeIndex']; }?>" >
                                </div>
                                <div class="form-group">
                                    <label for="product_key">Product Key</label>
                                    <input type="text" class="form-control" name="product_key" id="product_key" value="<?php if($temp_id != '') { echo $row['ProKey']; }?>"  >
                                </div>

                                <div class="form-group">
                                    <label for="product_value">Product Value</label>
                                    <input type="text" class="form-control" name="product_value" id="product_value" value="<?php if($temp_id != '') { echo $row['ProValue']; }?>" >
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success" name="submit" id="submit">Submit</button>
                                <a href="product.php" class="btn btn-primary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

            <section class="content-header">
                <h1>Specification List</h1>
            </section>
            <div class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">

                            <div class="row" id="show_product">
                            <form role="form" id="category_form" method="post" enctype="multipart/form-data">
                                <!-- /.box-header -->
                                <div class="box-body">

                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Product Name</th>
                                            <th>Product Specification Index</th>
                                            <th>Product Key</th>
                                            <th>Product Value</th>
                                            <th>Edit</th>
                                            <th>Delete&nbsp;</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                      <!-- <?php
/*                                   $Srno = 0;
                                        $query = "select * from product_specification join product on product_specification.ProID=product.ProID";
                                        $result = $dbc->Query($query);
                                        if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                        $Srno++;
                                        */?>
                                        <tr>
                                            <td style="width:50px"><?php /*echo $Srno; */?></td>
                                            <td style="width:50px"><?php /*echo $row['ProName'];*/?></td>
                                            <td style="width:50px"><?php /*echo $row['ProSpeIndex'];; */?></td>
                                            <td style="width:50px"><?php /*echo $row['ProKey'];; */?></td>
                                            <td style="width:650px"><?php /*echo $row["ProValue"] */?></td>
                                            <td style="width:50px"><a href="add_category.php?id=<?php /*echo $row['CategoryID']; */?>"><i class="fa fa-edit"></i></a></td>
                                            <td style="width:100px"><a href="category.php?id_delete=<?php /*echo $row['CategoryID'];*/?>"><i class="fa fa-trash-o"></i></a></td>--><?php /*} }*/?>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>

                            <!-- / .box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </div>

        <div id="flash"></div>
        <div id="display"></div>
        </div>

    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>



    <script type="text/javascript">
        $(document).ready(function () {
            $('#property_form').validate({
                rules: {
                    product_name: {required: true},
                    spe_index: {required: true},
                    product_key: {required: true},
                    product_value: {required: true},
                },
                messages: {
                    product_name: {required: "product name required"},
                    spe_index: {required: "product Index"},
                    product_key: {required: "product Key required"},
                    product_value: {required: "category Value required"},
                },
                submitHandler: function (form) {
                    var data = new FormData($('#property_form')[0]);
                    $.ajax({
                        type: 'post',
                        data: data,
                        dataType: "json",
                        url: "core/add_specification.php",
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (r) {
                            if (r.status == 200) {
                                toastr.success(r.message, 'Success');
                                $('#spe_index').val('');
                                $('#product_key').val('');
                                $('#product_value').val('');
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



    <script>
        $(document).ready(function(){
            $('#product_name').change(function(){
                var brand_id = $(this).val();
                $.ajax({
                    url:"core/add_specification.php",
                    method:"POST",
                    data:{ProID:brand_id},
                    success:function(data){
                        $('#show_product').html(data);
                    }
                });
            });
        });
    </script>




<?php
include('include/footer.php');
?>