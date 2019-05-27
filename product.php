<?php
include('include/header.php');
include('include/left.php');
?>

<?php
if (isset($_GET['id_delete']))
{
    $query = 'delete from product where ProID='.$_GET['id_delete'];
    $result = $dbc->Query($query);
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Product List</h1>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="javascript:;" class="btn btn-danger deleteall" onclick="checkChecked()">Delete</a>
                        <a href="add_product.php" class="btn btn-success">Add</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Product name</th>
                                <th>Product Detail</th>
                                <th>Product Description</th>
                                <th>Product Category</th>

                                <th>Product Images</th>
                                <th>Product Price</th>
                                <th>Product CountOnPackege</th>
                                <th>Product Volume</th>
                                <th>Number of Volume</th>


                                <th>Edit</th>
                                <th>Delete&nbsp;</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $Srno = 0;
                            $query = "SELECT * FROM product join category on product.CategoryID=category.CategoryID join product_volume on product.ProVolID=product_volume.ProVolID ";
                            $result = $dbc->Query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $Srno++;
                                    ?>
                                    <tr>
                                        <td style="width:50px"><?php echo $Srno;     ?></td>
                                        <td style="width:50px"><?php echo $row['ProName']; ?></td>
                                        <td style="width:50px"><?php echo $row['ProDetail']; ?></td>
                                        <td style="width:50px"><?php echo $row['ProDes']; ?></td>
                                        <td style="width:50px"><?php echo $row['CategoryName']; ?> </td>

                                        <td style="width:650px"> <img src="images/product/<?php echo $row['ProImg1'];?>"  height="80" width="80">
                                            <img src="images/product/<?php echo $row['ProImg2'];?>"  height="80" width="80">
                                            <img src="images/product/<?php echo $row['ProImg3'];?>"  height="80" width="80">
                                            <img src="images/product/<?php echo $row['ProImg4'];?>"  height="80" width="80">
                                            <img src="images/product/<?php echo $row['ThumbnailImg'];?>"  height="80" width="80">
                                        </td>
                                        <td style="width:50px"><?php echo $row['ProPrice']; ?></td>
                                        <td style="width:50px"><?php echo $row['NoOfCountOnPackage']; ?></td>
                                        <td style="width:50px"><?php echo $row['ProValName']; ?></td>
                                        <td style="width:50px"><?php echo $row['NoOfValume']; ?></td>
                                       <td style="width:50px"><a href="add_product.php?id=<?php echo $row['ProID']; ?>"><i class="fa fa-edit"></i></a></td>
                                        <td style="width:100px"><a href="product.php?id_delete=<?php echo $row['ProID']; ?>"><i class="fa fa-trash-o"></i></a></td>

                                    </tr>
                                <?php } }
                          ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {

        var checkAll = $('input.all');
        var checkboxes = $('input.check');

        $(document).on('change','.all',function() {
            var ischecked = $(this).is(':checked');
            if(!ischecked){
                checkboxes.prop('checked', false);
            }else{
                checkboxes.prop('checked', 'checked');
            }

        });
    });

    function checkChecked() {
        var property_id = [];
        var anyBoxesChecked = false;
        $('.check').each(function () {
            if ($(this).is(":checked")) {
                anyBoxesChecked = true;
                property_id.push($(this).val());
            }
        });

        if(anyBoxesChecked == true){

            bootbox.confirm("Are you sure do you want to delete ?", function (result) {
                //if user confirm ok then process delete blog
                if (result) {
                    var dataString = {
                        property_id: property_id,
                        type:'delete_property'
                    };
                    //define ajax path
                    var path = 'core/add_property.php';
                    $.post(path, {
                            data: dataString
                        },
                        function (res) {
                            if (res.status == 201) {
                                toastr.error('Something went wrong', 'Error');
                                return false;
                            } else {
                                toastr.success('Deleted successfully', 'Success');
                                setTimeout(function(){ location.reload(); }, 2000);
                            }
                        }, 'json');
                }
            });
        }

        if (anyBoxesChecked == false) {
            toastr.warning('Please select at least one checkbox','Alert');
            return false;
        }
    }
</script>

<?php
include('include/footer.php');
?>
