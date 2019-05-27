<?php
include_once("../include/config.php");
if (isset($_POST['product_name'])) {
    $pname = $_POST['product_name'];
    $pdetail = $_POST['product_detail'];
    $pdes = $_POST['product_discription'];
    $cat = $_POST['category_name'];
    $subcat = $_POST['sub_category_name'];
    $pprice = $_POST['product_price'];
    $noc = $_POST['product_cop'];
    $pvolume = $_POST['product_volume'];
    $nvol = $_POST['product_numvolume'];

    if (!empty($_POST['productid']) && $_POST['productid'] != '') {

        if (!empty($_FILES["uploadimage"]["name"]))
        {
            $upload_status1 = upload_img();
            $query = "update product set ProName='$pname',ProDetail='$pdetail',ProDes='$pdes',CategoryID='$cat',ProPrice='$pprice',SubCateID='$subcat',NoOfCountOnPackage='$noc',ProVolID='$pvolume',NoOfValume='$nvol',ProImg1='$upload_status1' where ProID=" . $_POST['productid'];
            $result = $dbc->Query($query);
            $output_array['status'] = 200;
            $output_array['message'] = 'Updated successfully!';
        }
        elseif(!empty($_FILES["uploadimage2"]["name"]))
        {

            $upload_status2 = upload_img2();
            $query = "update product set ProName='$pname',ProDetail='$pdetail',ProDes='$pdes',CategoryID='$cat',ProPrice='$pprice',SubCateID='$subcat',NoOfCountOnPackage='$noc',ProVolID='$pvolume',NoOfValume='$nvol',ProImg2='$upload_status2' where ProID=" . $_POST['productid'];
            $result = $dbc->Query($query);
            $output_array['status'] = 200;
            $output_array['message'] = 'Updated successfully!';
        }
        elseif(!empty($_FILES["uploadimage3"]["name"]))
        {
            $upload_status3 = upload_img3();
            $query = "update product set ProName='$pname',ProDetail='$pdetail',ProDes='$pdes',CategoryID='$cat',ProPrice='$pprice',SubCateID='$subcat',NoOfCountOnPackage='$noc',ProVolID='$pvolume',NoOfValume='$nvol',ProImg3='$upload_status3' where ProID=" . $_POST['productid'];
            $result = $dbc->Query($query);
            $output_array['status'] = 200;
            $output_array['message'] = 'Updated successfully!';
        }
        elseif (!empty($_FILES["uploadimage4"]["name"]))
        {
            $upload_status4 = upload_img4();
            $query = "update product set ProName='$pname',ProDetail='$pdetail',ProDes='$pdes',CategoryID='$cat',ProPrice='$pprice',SubCateID='$subcat',NoOfCountOnPackage='$noc',ProVolID='$pvolume',NoOfValume='$nvol',ProImg4='$upload_status4' where ProID=" . $_POST['productid'];
            $result = $dbc->Query($query);
            $output_array['status'] = 200;
            $output_array['message'] = 'Updated successfully!';
        }
        elseif(!empty($_FILES["uploadimage5"]["name"]))
        {
            $upload_status5 = upload_img5();
            $query = "update product set ProName='$pname',ProDetail='$pdetail',ProDes='$pdes',CategoryID='$cat',ProPrice='$pprice',SubCateID='$subcat',NoOfCountOnPackage='$noc',ProVolID='$pvolume',NoOfValume='$nvol',ThumbnailImg='$upload_status5' where ProID=" . $_POST['productid'];
            $result = $dbc->Query($query);
            $output_array['status'] = 200;
            $output_array['message'] = 'Updated successfully!';
        }
        else{
            $query = "update product set ProName='$pname',ProDetail='$pdetail',ProDes='$pdes',CategoryID='$cat',ProPrice='$pprice',SubCateID='$subcat',NoOfCountOnPackage='$noc',ProVolID='$pvolume',NoOfValume='$nvol',ProImg1='$pim1' where ProID=" . $_POST['productid'];
            $result = $dbc->Query($query);
            $output_array['status'] = 200;
            $output_array['message'] = 'Updated successfully!';
        }

    } else {
                $upload_status1 = upload_img();
                $upload_status2 = upload_img2();
                $upload_status3 = upload_img3();
                $upload_status4 = upload_img4();
                $upload_status5 = upload_img5();
                $query = "INSERT INTO product (ProName,ProDetail,ProDes,CategoryID,ProPrice,SubCateID,NoOfCountOnPackage,ProVolID,NoOfValume,ProImg1,ProImg2,ProImg3,ProImg4,ThumbnailImg) VALUES ('" . $pname . "','" . $pdetail . "','" . $pdes . "','" . $cat . "','" . $pprice . "','" . $subcat . "','" . $noc . "','" . $pvolume . "','" . $nvol . "', '" . $upload_status1 . "', '" . $upload_status2 . "', '" . $upload_status3 . "', '" . $upload_status4 . "', '" . $upload_status5 . "')";
                $result = $dbc->Query($query);
                $output_array['status'] = 200;
                $output_array['message'] = 'Inserted successfully!';
            }
            echo json_encode($output_array);
            exit;

}

function upload_img() {
    $f_name = $_FILES["uploadimage"]["name"];
    $ext = substr($f_name, strpos($f_name, '.'), strlen($f_name) - 1);
    $file_name =  $f_name;//ic_cate + category id + image extension
    $temp_name = $_FILES["uploadimage"]["tmp_name"];
    $target_path = '../images' . '/' . 'product' . '/' . $file_name;
    if (move_uploaded_file($temp_name, $target_path) == FALSE) {
        echo "<h1>Error in Uploading Image...</h1>";
    }
        else
        {
           $return['sucess']="Sucess";
        }
    return $file_name;
}
function upload_img2() {
    $f_name = $_FILES["uploadimage2"]["name"];
    $ext = substr($f_name, strpos($f_name, '.'), strlen($f_name) - 1);
    $file_name =  $f_name;//ic_cate + category id + image extension
    $temp_name = $_FILES["uploadimage2"]["tmp_name"];
    $target_path = '../images' . '/' . 'product' . '/' . $file_name;
    if (move_uploaded_file($temp_name, $target_path) == FALSE) {
        echo "<h1>Error in Uploading Image...</h1>";
    }
    else
    {
        $return['sucess']="Sucess";
    }
    return $file_name;
}
function upload_img3() {
    $f_name = $_FILES["uploadimage3"]["name"];
    $ext = substr($f_name, strpos($f_name, '.'), strlen($f_name) - 1);
    $file_name =  $f_name;//ic_cate + category id + image extension
    $temp_name = $_FILES["uploadimage3"]["tmp_name"];
    $target_path = '../images' . '/' . 'product' . '/' . $file_name;
    if (move_uploaded_file($temp_name, $target_path) == FALSE) {
        echo "<h1>Error in Uploading Image...</h1>";
    }
    else
    {
        $return['sucess']="Sucess";
    }
    return $file_name;
}
function upload_img4() {
    $f_name = $_FILES["uploadimage4"]["name"];
    $ext = substr($f_name, strpos($f_name, '.'), strlen($f_name) - 1);
    $file_name =  $f_name;//ic_cate + category id + image extension
    $temp_name = $_FILES["uploadimage4"]["tmp_name"];
    $target_path = '../images' . '/' . 'product' . '/' . $file_name;
    if (move_uploaded_file($temp_name, $target_path) == FALSE) {
        echo "<h1>Error in Uploading Image...</h1>";
    }
    else
    {
        $return['sucess']="Sucess";
    }
    return $file_name;
}
function upload_img5() {
    $f_name = $_FILES["uploadimage5"]["name"];
    $ext = substr($f_name, strpos($f_name, '.'), strlen($f_name) - 1);
    $file_name =  $f_name;//ic_cate + category id + image extension
    $temp_name = $_FILES["uploadimage5"]["tmp_name"];
    $target_path = '../images' . '/' . 'product' . '/' . $file_name;
    if (move_uploaded_file($temp_name, $target_path) == FALSE) {
        echo "<h1>Error in Uploading Image...</h1>";
    }
    else
    {
        $return['sucess']="Sucess";
    }
    return $file_name;
}

function GetImageExtension($imagetype) {
    if (empty($imagetype))
        return false;
    switch ($imagetype) {
        case 'image/jpeg':
            return '.jpg';
        case 'image/png':
            return '.png';
        default:
            return false;
    }
}
