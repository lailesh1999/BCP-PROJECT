<?php
include('dbconnect.php');
$unit_id = $_GET['unit_id'];
session_start();
$staff_id = $_SESSION['staff_id'];
echo $query = "UPDATE  unit_tbl set deleted = '1',deleted_by_id='$staff_id' where unit_id = '$unit_id'";
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