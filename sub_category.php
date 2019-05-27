<?php
include('include/header.php');
include('include/left.php');
?>
<?php
if (isset($_GET['id_delete']))
{
    $query = 'delete from sub_category where SubCateID='.$_GET['id_delete'];
    $result = $dbc->Query($query);
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Category List</h1>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <form role="form" id="category_form" method="post" enctype="multipart/form-data">


                        <div class="box-header">

                            <a href="javascript:;" class="btn btn-danger deleteall" onclick="checkChecked()">Delete</a>
                            <a href="add_sub_category.php" class="btn btn-success">Add</a>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">

                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Subcategory Name</th>
                                    <th>Category Name</th>
                                    <th>Edit</th>
                                    <th>Delete&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $Srno = 0;
                                $query = "SELECT * FROM sub_category join category on sub_category.CategoryID=category.CategoryID";
                                $result = $dbc->Query($query);
                                if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                $Srno++;
                                ?>
                                <tr>
                                    <td style="width:50px"><?php echo $Srno; ?></td>
                                    <td style="width:650px"><?php echo $row["SubCateName"] ?></td>
                                    <td style="width:650px"><?php echo $row["CategoryName"] ?></td>
                                    <td style="width:50px"><a href="add_sub_category.php?id=<?php echo $row['SubCateID']; ?>"><i class="fa fa-edit"></i></a></td>
                                    <td style="width:100px"><a href="sub_category.php?id_delete=<?php echo $row['SubCateID']; ?>"><i class="fa fa-trash-o"></i></a></td><?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <!-- / .box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</div>



<?php

include('include/footer.php');
?>






