<?php
include_once("../include/config.php");

// Adding and Deleting Product Category Detail

if (isset($_POST['product_key']) && isset($_POST['spe_index']) && isset($_POST['product_value'])) {

    if (!empty($_POST['pid']) && $_POST['pid'] != '')
    {
        $query="update product_specification set ProSpeIndex='$_POST[spe_index]',ProKey='$_POST[product_key]',ProValue='$_POST[product_value]' where ProSpeID=".$_POST['pid'];
        $result=$dbc->Query($query);
        $output_array['status'] = 200;
        $output_array['message'] = 'Updated successfully!';
    }
    else {
        $query = 'insert into product_specification (ProID,ProSpeIndex,ProKey,ProValue) value ("' . $_POST['product_name'] . '","' . $_POST['spe_index'] . '","' . $_POST['product_key'] . '","' . $_POST['product_value'] . '")';
        $result = $dbc->Query($query);
        $output_array['status'] = 200;
        $output_array['message'] = 'Inserted successfully!';
    }
    echo json_encode($output_array);
    exit;
}
?>
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
<?php
$Srno = 0;
if (isset($_POST['ProID'])) {
    $output='';
    if($_POST["ProID"]) {
        $query = "select * from product_specification join product on product_specification.ProID=product.ProID  where product_specification.ProID=".$_POST['ProID'];
    }
    else{
        $query = "select * from product_specification join product on product_specification.ProID=product.ProID  where product_specification.ProID=".$_POST['ProID'];
    }
        $result=$dbc->Query($query);
        while ($row=$result->fetch_assoc()){
        $Srno++;
            ?>
<tr>
    <td style="width:50px"><?php echo $Srno; ?></td>
    <td style="width:50px"><?php echo $row['ProName']; ?><input type="hidden" name="pid" value="<?php echo $row['ProID']; ?>"></td>
    <td style="width:50px"><?php echo $row['ProSpeIndex'];; ?></td>
    <td style="width:50px"><?php echo $row['ProKey'];; ?></td>
    <td style="width:650px"><?php echo $row["ProValue"] ?></td>
    <td style="width:50px"><a href="add_specification.php?id=<?php echo $row['ProSpeID']; ?>"><i class="fa fa-edit"></i></a></td>
    <td style="width:100px"><a href="category.php?id_delete=<?php echo $row['ProSpeID']; ?>"><i class="fa fa-trash-o"></i></a></td><?php }?>
    <?php

}

?>
                </tbody>
            </table>
        </div>
    </form>
<?php

?>



