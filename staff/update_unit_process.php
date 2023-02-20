<?php
include('dbconnect.php');


if(isset($_POST['updateunit']))
{
	session_start();
	$staff_id = $_SESSION['staff_id'];
	$unit_name = $_POST['unit_name'];
	$unit_id = $_POST['unit_id'];
    $query = " UPDATE unit_tbl SET unit_name ='$unit_name',updated_by_id = $staff_id  where unit_id = '$unit_id'";
	$query_res = $link->query($query);
	if($query_res)
	{
		echo "updated sucessfully";
		header('location:view_unit.php?msg=3');
	}
	else
	{
		header('location:view_unit.php?msg=3.1');
	}
}

?>