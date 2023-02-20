<?php
include('../dbconnect.php');
$sid = $_GET['sid'];

echo $query = "UPDATE stock_tbl SET status = '1' where stock_id = '$sid'";
$query_run = $link->query($query);
if($query_run){
	echo " REMOVED SUCESSFULLY";
}
else
{
	echo " NOT REMOVED";
}

$sql = "select * from stock_tbl where stock_id = '$sid'";
$sql_run = $link->query($sql);
$c =0;
session_start();
$admin_id = $_SESSION['admin_id'];
while($rows = mysqli_fetch_array($sql_run)){
	$sup_id = $rows['supplier_id'];
	$pid = $rows['product_id'];
	$quantity = $rows['quantity'];
	$batch_number = $rows['batch_number'];
	$expiry_date = $rows['expiry_date'];
	$rate = $rows['rate'];
}
 echo 	$query1= " insert into return_stock_tbl (stock_id,supplier_id,product_id,batch_number,quantity,expiry_date,rate,inserted_by_id) values ('$sid','$sup_id','$pid','$batch_number','$quantity','$expiry_date','$rate','$admin_id')";
	  $query_res1=$link->query($query1);

?>