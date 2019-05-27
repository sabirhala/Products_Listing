<?php
include("../include/config.php");

if(isset($_POST['username'])){
    if(isset($_POST['userID'])){
        $query = "UPDATE userdetail SET adminname = '".$_POST['username']."', email = '".$_POST['email']."' WHERE adminid = '".$_POST['userID']."'";
        $result = $dbc->Query($query);

        $output_array['status'] = 200;
        $output_array['message'] = 'Username Updated Successfully! will be changed after you logout' ;
    }else{
        $output_array['status'] = 201;
        $output_array['message'] = 'Something went wrong!' ;
    }
    echo json_encode($output_array); exit;
}
?>