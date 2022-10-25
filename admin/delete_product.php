<?php
include('dbconnect.php');
session_start();
$admin_id = $_SESSION['admin_id'];
$product_id = $_GET['product_id'];
$query = "UPDATE product_tbl set deleted = '1',deleted_by_id = '$admin_id' where product_id = '$product_id'";
$query_result = $link->query($query);
if($query_result)
{
	header('location:view_product.php?msg=2');
}
else{
	header('location:view_product.php?msg=2.1');
}
?>