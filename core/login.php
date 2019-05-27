<?php
session_start();

  if(isset($_SESSION) && !empty($_SESSION)){
    header('location: ../dashboard.php');
}	
	include("../include/config.php");

	if(isset($_POST['email'])){
	 	$email = $_POST['email'];
		$password = $_POST['password'];
		$newPassword = md5($password);

		$query = "SELECT * FROM userdetail WHERE email ='$email' and password ='$newPassword'";
		$result = $dbc->query($query);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        @session_start();
		        $_SESSION['uID'] = $row["adminid"];
		        $_SESSION['unm'] = $row["adminname"];
		        $_SESSION['email'] = $row["email"];
		        //$_SESSION['issuperadmin']=$row["issuperadmin"];

		        $output_array['status'] = 200;
		        $output_array['message'] = 'Login successfully';
		        $output_array['url'] = ROOT_WWW.'dashboard.php';
		    }
		} else {
			$output_array['status'] = 201;
		    $output_array['message'] = 'Incorrect email password combination';
		}
		echo json_encode($output_array); exit;
	}

?>