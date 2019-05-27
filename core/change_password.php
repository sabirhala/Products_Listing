<?php
include("../include/config.php");

if(isset($_POST['userID']) && !empty($_POST['userID'])){
    $output_array = [];

    $userID = $_POST['userID'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $query = "SELECT * FROM userdetail WHERE adminid = ".$userID." AND password = '".$current_password."'";


    $result = $dbc->Query($query);
    $num = mysqli_num_rows($result);
    if($num > 0){
        $where = "adminid='".$userID."'";
        $dbc->update('userdetail', array('password' => $new_password), $where, '');
        $output_array['status'] = 200;
        $output_array['message'] = 'Password updated Successfully';
        $output_array['data'] = [];
    }else{
        $output_array['status'] = 201;
        $output_array['message'] = 'Wrong current password entered';
    }
    //header('Content-type: application/json; charset=utf-8');
    echo json_encode($output_array);
}
?>