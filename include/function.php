<?php
require_once "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function getToken($length) {
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet .= "0123456789";
    $max = strlen($codeAlphabet); // edited

    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max - 1)];
    }

    return $token;
}

function crypto_rand_secure($min, $max) {
    $range = $max - $min;
    if ($range < 1)
        return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}

function getHeaderVal($allHeaderVal) {
    $req_oauth_token ='';
    foreach ($allHeaderVal as $name => $value) {
        if (!empty($name)) {
            if ($name == AUTH_TOKEN_LBL) {
                $req_oauth_token = $value;
            }
        }
    }
    return $req_oauth_token;
}

function checkOauthToken($allHeaderVal) {
    $token = getHeaderVal($allHeaderVal);
    $return = [];
    global $dbc;
    if(!empty($token)){
        $qry = "";
        $qry .= " SELECT count(user_app_id) as count";
        $qry .= " FROM " . TBL_USER;
        $qry .= " WHERE  oauth_token='" . $token . "'";
        
        $result_count = $dbc->select($qry);
        if ($result_count[0]['count'] < 0) {
            $return['status'] = 401;
            $return['message'] = 'Authentication Token Incorrect';
            echo json_encode($return); exit;
        }
    }else{
        $return['status'] = 401;
        $return['message'] = 'Authentication Token required';
        echo json_encode($return); exit;
    }    
}

function is_image_exist($path,$url,$name,$no_image){
    
    if(!empty($name) && file_exists($path.$name)){
        return $url.$name;
    }else{
       return $no_image.'dummy-image.jpg';
    }
}

function get_mail_data($type){
    global $dbc;
    $sql = "SELECT * FROM ".TBL_EMAIL_TEMPLATE." WHERE type=".$type;
    $result = $dbc->QueryGetRow($sql);
    return $result;
}

function sendmail($to, $message,$subject) {
    
    $mail = new PHPMailer;

    //Enable SMTP debugging. 
    $mail->SMTPDebug = 0;

    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    $mail->SMTPSecure = "tls";
    $mail->Port = SMTP_PORT;
    $mail->From = FROM_EMAIL;
    $mail->FromName = FROM_NAME;
    $mail->addAddress($to, $to);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    //$mail->AltBody = "This is the plain text version of the email content";

    if (!$mail->send()) {
        return $mail->ErrorInfo;
    } else {
        return TRUE;
    }
}

function check_null($data){
    global $dbc;
    if(!empty($data)){
        $new = mysqli_real_escape_string($dbc->link,$data);
        return $new;
    }else{
        return '';
    }
}

//App related function

function get_type($id=''){
    global $dbc;
    if(!empty($id)){
        $qry = "SELECT * FROM ".TBL_PROPERTY_TYPE." WHERE type_id=".$id;
        $result = $dbc->QueryGetRow($qry);
        $data = [
          'type_id'=> (int)$result['type_id'],
          'type_name'=> $result['type_name']
        ];
        $new_data[] = $data;
        return $new_data;
    }
}

function get_purpose($id=''){
    global $dbc;
    if(!empty($id)){
        $qry = "SELECT * FROM ".TBL_PROPERTY_PURPOSE." WHERE property_purpose_id=".$id;
        $result = $dbc->QueryGetRow($qry);
        $data = [
          'property_purpose_id'=> (int)$result['property_purpose_id'],
          'property_purpose_name'=> $result['property_purpose_name']
        ];
        $new_data[] = $data;
        return $new_data;
    }
}

function get_rating($user_app_id,$property_id){
    global $dbc;
    if(!empty($user_app_id)){
        $qry = "SELECT ROUND(AVG(rating) ,1) AS 'rate' FROM ".TBL_RATING." WHERE user_app_id=".$user_app_id." AND property_id=".$property_id;
        $result = $dbc->QueryGetRow($qry);
        if(!empty($result))
        {
            return !empty($result['rate']) ? (double)$result['rate'] : 0;
        }else{
            return 0;
        }
    }else{
        $qry = "SELECT ROUND(AVG(rating) ,1) AS 'rate' FROM ".TBL_RATING." WHERE property_id=".$property_id;
        $result = $dbc->QueryGetRow($qry);
        if(!empty($result))
        {
            return !empty($result['rate']) ? (double)$result['rate'] : 0;
        }else{
            return 0;
        }
    }
}

function get_rating_count($property_id){
    global $dbc;
    
    $qry = "SELECT COUNT(*) AS 'rate' FROM ".TBL_RATING." WHERE property_id=".$property_id;
    $result = $dbc->QueryGetRow($qry);
    if(!empty($result))
    {
        return !empty($result['rate']) ? (double)$result['rate'] : 0;
    }else{
        return 0;
    }
}

function get_like($user_app_id,$property_id){
    global $dbc;
    $qry = "";
    if(!empty($user_app_id)){
        $qry = "SELECT COUNT(*) AS num_like FROM ".TBL_LIKE." WHERE user_app_id=".$user_app_id." AND property_id=".$property_id;
    }else{
        $qry = "SELECT COUNT(*) AS num_like FROM ".TBL_LIKE." WHERE property_id=".$property_id;
    }
    $result = $dbc->QueryGetRow($qry);
    if(!empty($result))
    {
        return !empty($result['num_like']) ? (double)$result['num_like'] : 0;
    }else{
        return 0;
    }
    
}

function get_favourite($user_app_id,$property_id){
    global $dbc;
    if(!empty($user_app_id)){
        $qry = "SELECT * FROM ".TBL_PROPERTY_FAVOURITE." WHERE user_app_id=".$user_app_id." AND property_id=".$property_id;
        $result = $dbc->QueryGetRow($qry);
        if(!empty($result))
        {
            return 1;
        }else{
            return 0;
        }
    }
}

function get_property_amenities($id=''){
    global $dbc;
    if(!empty($id)){
        $qry = "SELECT * FROM ".TBL_PROPERTY_AMENITIES." WHERE property_amenities_id IN(".$id.")";
        $result = $dbc->select($qry,2);
        foreach($result as $val){
            $data = [
                'property_amenities_id' => (int)$val['property_amenities_id'],
                'property_amenities_name' => $val['property_amenities_name'],
                'property_amenities_icon' => is_image_exist(ROOT_DIR.'images/property_amenities/',IMAGEURL.'property_amenities/',$val["property_amenities_icon"],IMAGEURL)
            ];
            $alldata[] = $data;
        }
        return $alldata;
    }
}

function get_property_image($id=''){
    global $dbc;
    if(!empty($id)){
        $qry = "SELECT * FROM ".TBL_IMAGE." WHERE img_property_id=".$id;
        $result = $dbc->select($qry,2);
        $img = [];
        if(!empty($result)){
            foreach($result as $val){
                $new_val = is_image_exist(ROOT_DIR.'images/propertyimage/',IMAGEURL.'propertyimage/',$val["image"],IMAGEURL);
                array_push($img, $new_val);
            }
            return $img;
        }
        else{
            //$img = array();
            return $img;
        }
    }
}

function get_property_image_data($id=''){
    global $dbc;
    if(!empty($id)){
        $qry = "SELECT * FROM ".TBL_IMAGE." WHERE img_property_id=".$id;
        $result = $dbc->select($qry,2);
        
        if(!empty($result)){
            foreach($result as $key => $val){
                $result[$key]['image'] = is_image_exist(ROOT_DIR.'images/propertyimage/',IMAGEURL.'propertyimage/',$val["image"],IMAGEURL);
            }
            return $result;
        }
    }
}

function register_user_to_onesignal($data,$notification_setting){
    $fields = array(
        'app_id' => $notification_setting['one_signal_app_id'],
        'identifier' => $data['device_token'],
        'language' => "en",
        'timezone' => "-28800",
        'game_version' => "1.0",
        'device_os' => "9.1.3",
        'device_type' => $data['device_type'], //0=ios,1=android
        'device_model' => "iPhone 8,2",
        'tags' => array("foo" => "bar")
    );

    $fields = json_encode($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/players");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}