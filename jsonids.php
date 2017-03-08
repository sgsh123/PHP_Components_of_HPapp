<?php

$con = mysqli_connect("localhost", "root", "", "hp_quiz");
if($_SERVER['REQUEST_METHOD']=='GET')
{

$table = $_GET['table_name'];

$sql = "select ID from $table";

$res = mysqli_query($con,$sql);

$result = array();

while($row = mysqli_fetch_array($res))

{
	$result[] = $row['ID'];
}

echo json_encode(array("result"=>$result));

}

mysqli_close($con);

?>
