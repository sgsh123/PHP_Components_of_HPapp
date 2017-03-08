<?php

 
$result = array();
$row = array();
//$ques = "";
$con = mysqli_connect("localhost","root","","hp_quiz");

if($_SERVER['REQUEST_METHOD']=='GET')
{

$table = $_GET['table_name'];
$qid = $_GET['Q_no'];
 
$sql = "select * from $table where ID = '".$qid."'";
 
	
$res = mysqli_query($con,$sql);
 
$row = mysqli_fetch_array($res);
//$ques = mysqli_real_escape_string($con, $table_name.Question);
}

else
{
	array_push($result,
	array('question'=>"Server Error. Please click on any of the options to finish the quiz.",
	'opt1'=>"Error",
	'opt2'=>"Error",
	'opt3'=>"Error",
	'opt4'=>"Error",
	'c_opt'=>"Error"
	));
}

array_push($result,
array('question'=>$row[0],
'opt1'=>$row[1],
'opt2'=>$row[2],
'opt3'=>$row[3],
'opt4'=>$row[4],
'c_opt'=>$row[5]

));


echo json_encode(array("result"=>$result));

mysqli_close($con);
 
?>