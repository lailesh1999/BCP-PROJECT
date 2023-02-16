<?php
include('../dbconnect.php');
$uid = $_GET['uid'];
$flag = 0;
$query = "select unit_id from product_tbl where unit_id= '$uid' and deleted = '0'";
$query_run = $link->query($query);

if(mysqli_num_rows($query_run) > 0){
	$flag = 1;
}
echo $flag;


?>