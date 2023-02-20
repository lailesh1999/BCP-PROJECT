<?php
include('../dbconnect.php');
$pid = $_GET['pid'];
$flag = 0;
$query = "select product_id from stock_tbl where product_id= '$pid' and deleted = '0'";
$query_run = $link->query($query);

if(mysqli_num_rows($query_run) > 0){
	$flag = 1;
}
echo $flag;


?>