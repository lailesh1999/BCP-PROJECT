<?php
include('dbconnect.php');
$unit_id = $_GET['unit_id'];
session_start();
$admin_id = $_SESSION['admin_id'];
echo $query = "UPDATE  unit_tbl set deleted = '1',deleted_by_id='$admin_id' where unit_id = '$unit_id'";
$query_run = $link->query($query);
if($query_run)
{
    header('location:view_unit.php?msg=2');
}
else
{
    header('location:view_unit.php?msg=2.1');  
}




?>