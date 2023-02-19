
<?php
include('dbconnect.php');
session_start();
$admin_id = $_SESSION["admin_id"];
$s_id = $_GET['sid'];
$query = "update staff_tbl set deleted='1', deleted_by_id='$admin_id' where staff_id='$s_id'";
$query_result=$link->query($query);
if($query_result)
	 {
	 	header('location:view_staff.php?msg=2');

	 }
	 else
	 {
        header('location:view_staff.php?msg=2.1');
    }

?>