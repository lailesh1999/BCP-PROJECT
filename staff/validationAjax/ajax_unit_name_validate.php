<?php
include('../dbconnect.php');
$vali = $_GET['valiUnit'];
$flag = 0;
$query = "select * from unit_tbl where unit_name= '$vali' and deleted = '0'";
$query_run = $link->query($query);

if(mysqli_num_rows($query_run) > 0){
	$flag = 1;
}
echo $flag;


?>