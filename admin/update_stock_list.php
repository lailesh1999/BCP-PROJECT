<?php
$stock_id = $_GET['stock_id'];
session_start();
include('dbconnect.php');
$admin_id = $_SESSION['admin_id'];
 $query =  "update stock_tbl set status ='0',deleted_by_id ='$admin_id' where stock_id = '$stock_id'";
$query_rs = $link->query($query);

$sql = "update return_stock_tbl set deleted = '1',deleted_by_id ='$admin_id' where stock_id = '$stock_id'";
$run = $link->query($sql);
if($run and $sql ){
	header('location:view_stock_list.php?msg=2');
}
else
{
	header('location:view_stock_list.php?msg=2.1');
}


?>