<?php
include_once("../include/config.php");
if (isset($_POST['category_name']) && isset($_POST['sub_category_name']) )
{
    if (!empty($_POST['cat_id']) && $_POST['cat_id'] != '')
    {
        $query="update sub_category set SubCateName='$_POST[sub_category_name]',CategoryID='$_POST[category_name]' where SubCateID=".$_POST['cat_id'];
        $result=$dbc->Query($query);
        $output_array['status'] = 200;
        $output_array['message'] = 'Updated successfully!';
    }
    else {

        $query = 'insert into sub_category (SubCateName,CategoryID) value ("' . $_POST['sub_category_name'] . '","' . $_POST['category_name'] . '")';
        $result = $dbc->Query($query);
        $output_array['status'] = 200;
        $output_array['message'] = 'Inserted successfully!';
    }

    echo json_encode($output_array);
    exit;

}


?>