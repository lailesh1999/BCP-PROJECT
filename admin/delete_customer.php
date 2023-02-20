<?php
include('dbconnect.php');
session_start();
$admin_id = $_SESSION['admin_id'];
$cid = $_GET['cid'];
$query = "UPDATE customer_tbl set deleted = '1',deleted_by_id = '$admin_id' where customer_id = '$cid'";
$query_result = $link->query($query);
if($query_result)
{
	header('location:view_customer.php?msg=2');

}
else{
	header('location:view_customer.php?msg=2.1');
}


?>