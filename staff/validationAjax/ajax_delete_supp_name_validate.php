<?php
include('../dbconnect.php');
$sid = $_GET['sid'];
$flag = 0;
$query = "select supplier_id from product_tbl where supplier_id= '$sid' and deleted = '0'";
$query_run = $link->query($query);

if(mysqli_num_rows($query_run) > 0){
	$flag = 1;
}

$query1 = "select supplier_id from stock_tbl where supplier_id= '$sid' and deleted = '0'";
$query_run1 = $link->query($query1);

if(mysqli_num_rows($query_run1) > 0){
	$flag = 1;
} 


echo $flag;


?>