<?php
include('dbconnect.php');
session_start();
$admin_id = $_SESSION['admin_id'];
$purchase_id = $_GET['purchase_id'];
$query = "UPDATE purchase_tbl set deleted = '1',deleted_by_id = '$admin_id' where purchase_id = '$purchase_id'";
$query_result = $link->query($query);
if($query_result)
{
	header('location:view_purchase.php?msg=2');
}
else{
	header('location:view_purchase.php?msg=2.1');
}
?>