
<?php


$con = mysqli_connect("localhost", "root", "", "hp_quiz");
if($_SERVER['REQUEST_METHOD']=='GET'){
 $name = $_GET['name'];
 $phone = $_GET['phone'];
 $password = $_GET['password'];
 $email = $_GET['email'];


 $sql = "SELECT * FROM user_info WHERE PHONE ='$phone' OR EMAIL='$email'";

 $check = mysqli_fetch_array(mysqli_query($con,$sql));
 $response = array();


 if(isset($check)){
 $code = "register_duplicate";
	$message = "An account with this Email ID or Phone Number already exists";
	array_push($response, array("code"=>$code,"message"=>$message));
	echo json_encode(array("result"=>$response));
 }
 else{
 $sql = "INSERT INTO user_info (NAME,PHONE,EMAIL,PASSWORD) VALUES('".$name."','".$phone."','".$email."', '".$password."')";
 	if(mysqli_query($con,$sql)){
 	$code = "register_success";
	$message = "You have been registered successfully. Please login now.";
	array_push($response, array("code"=>$code,"message"=>$message));
	echo json_encode(array("result"=>$response));
 	}
	 else{
 	$code = "register_fail";
	$message = "Server Error. Please try again.";
	array_push($response, array("code"=>$code,"message"=>$message));
	echo json_encode(array("result"=>$response));
 	}
 }

 mysqli_close($con);

 }

?>
