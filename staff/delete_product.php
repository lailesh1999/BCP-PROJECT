<?php
include('dbconnect.php');
session_start();
$staff_id = $_SESSION['staff_id'];
$stock_id = $_GET['stock_id'];
$query = "UPDATE product_tbl set deleted = '1',deleted_by_id = '$staff_id' where product_id = '$product_id'";
$query_result = $link->query($query);
if($query_result)
{
	header('location:view_product.php?msg=2');
}
else{
	header('location:view_product.php?msg=2.1');
}
?>