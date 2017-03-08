<?php
$conn = mysqli_connect("localhost", "root", "", "hp_quiz");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$email = $_POST['username'];
$password = $_POST['password'];


$query = "select * from user_info where EMAIL like '".$email."'and PASSWORD like '".$password."';";
$result = mysqli_query($conn, $query);
$response = array();

if(mysqli_num_rows($result)>0)
{
	$row = mysqli_fetch_row($result);
	$name = $row[1];
	$code = "login_success";
	$message = "Welcome ".$name."";
	array_push($response, array("code"=>$code,"message"=>$message));
	echo json_encode($response);
}else{
$code = "login_failed";
	$message = "Please enter a valid Email ID and Password combination";
	array_push($response, array("code"=>$code,"message"=>$message));
	echo json_encode($response);
}


}
mysqli_close($conn);

?>
