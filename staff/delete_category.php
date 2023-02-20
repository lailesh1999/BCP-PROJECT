<?php
include('dbconnect.php');
session_start();
$staff_id = $_SESSION['staff_id'];
$category_id = $_GET['category_id'];
$query = "UPDATE category_tbl set deleted = '1',deleted_by_id = '$staff_id' where category_id = '$category_id'";
$query_result = $link->query($query);
if($query_result)
{
	header('location:view_category.php?msg=2');

}
else{
	header('location:view_category.php?msg=2.1');
}


?>