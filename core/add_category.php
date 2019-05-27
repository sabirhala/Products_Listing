<?php
include_once("../include/config.php");

// Adding and Deleting Product Category Detail

if (isset($_POST['category_name'])) {

    if (!empty($_POST['cat_id']) && $_POST['cat_id'] != '') {

        if (!empty($_FILES["uploadimage"]["name"]))
        {
            if (isset($_POST['ischeked'])) {
                $upload_status1 = upload_img();
                $query = 'UPDATE category SET CategoryName = "' . $_POST['category_name'] . '",CatImg="' . $upload_status1 . '",CatDis="' . $_POST['category_dis'] . '",isheader="true" WHERE CategoryID =' . $_POST['cat_id'];
                $result = $dbc->Query($query);
                $output_array['status'] = 200;
                $output_array['message'] = 'Updated successfully!';
                $output_array['url'] = 'category.php';
            }
            else{
                $upload_status1 = upload_img();
                $query = 'UPDATE category SET CategoryName = "' . $_POST['category_name'] . '",CatImg="' . $upload_status1 . '",CatDis="' . $_POST['category_dis'] . '",isheader="false" WHERE CategoryID =' . $_POST['cat_id'];
                $result = $dbc->Query($query);
                $output_array['status'] = 200;
                $output_array['message'] = 'Updated successfully!';
                $output_array['url'] = 'category.php';
            }
        }
        else{
            if (isset($_POST['ischeked'])) {
                $query = 'UPDATE category SET CategoryName = "' . $_POST['category_name'] . '",CatDis="' . $_POST['category_dis'] . '",isheader="true" WHERE CategoryID =' . $_POST['cat_id'];
                $result = $dbc->Query($query);
                $output_array['status'] = 200;
                $output_array['message'] = 'Updated successfully!';
                $output_array['url'] = 'category.php';
            }
            else{
                $query = 'UPDATE category SET CategoryName = "' . $_POST['category_name'] . '",CatDis="' . $_POST['category_dis'] . '",isheader="false" WHERE CategoryID =' . $_POST['cat_id'];
                $result = $dbc->Query($query);
                $output_array['status'] = 200;
                $output_array['message'] = 'Updated successfully!';
                $output_array['url'] = 'category.php';
            }
        }
    }

    else {
        if (isset($_POST['ischeked'])) {
            if(!empty($_FILES["uploadimage"]["name"])) {
                $upload_status1 = upload_img();
                $query = 'insert into category (CategoryName,CatImg,CatDis,isheader) value ("' . $_POST['category_name'] . '","' . $upload_status1 . '","' . $_POST['category_dis'] . '","true")';
                $result = $dbc->Query($query);
                $output_array['status'] = 200;
                $output_array['message'] = 'Inserted successfully!';
            }
            else{
                $output_array['status'] = 201;
                $output_array['message'] = 'Cant Insert!';
            }

        }
        else{
                $query = 'insert into category (CategoryName,CatDis) value ("' . $_POST['category_name'] . '","' . $_POST['category_dis'] . '")';
                $result = $dbc->Query($query);
                $output_array['status'] = 200;
                $output_array['message'] = 'Inserted successfully!';
            }
        }
    echo json_encode($output_array);
    exit;

}

function upload_img() {
    $f_name = $_FILES["uploadimage"]["name"];
    $ext = substr($f_name, strpos($f_name, '.'), strlen($f_name) - 1);
    $file_name =  $f_name;//ic_cate + category id + image extension
    $temp_name = $_FILES["uploadimage"]["tmp_name"];
    $target_path = '../images' . '/' . 'category' . '/' . $file_name;
    if (move_uploaded_file($temp_name, $target_path) == FALSE) {
        echo "<h1>Error in Uploading Image...</h1>";
    }
    else
    {
        $return['sucess']="Sucess";
    }
    return $file_name;
}

// Adding and Deleting Product Volume Detail


if (isset($_POST['volume_name'])) {

    if (!empty($_POST['cat_id']) && $_POST['cat_id'] != '') {

        $query = 'UPDATE product_volume SET ProValName = "' . $_POST['volume_name'] . '" WHERE ProVolID =' . $_POST['cat_id'];
        $result = $dbc->Query($query);
        $output_array['status'] = 200;
        $output_array['message'] = 'Updated successfully!';
        $output_array['url'] = 'product_volume.php';
    }

    else {
        $query = 'insert into product_volume (ProValName) value ("' . $_POST['volume_name'] . '")';
        $result = $dbc->Query($query);
        $output_array['status'] = 200;
        $output_array['message'] = 'Inserted successfully!';
        $output_array['url'] = 'product_volume.php';

    }
    echo json_encode($output_array);
    exit;

}




?>