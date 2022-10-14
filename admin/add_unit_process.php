<?php
include('dbconnect.php');
if(isset($_POST['addunit']))
{
	session_start();
	$admin_id = $_SESSION['admin_id'];
	$unit_name = $_POST['unit_name'];
	$query= " insert into unit_tbl (unit_name,inserted_by_id) values ('$unit_name','$admin_id') ";
		$query_res=$link->query($query);
		if($query_res)
		{
			echo "data has been inserted";
			header('location:view_unit.php?msg=1');

		}
		else
		{
			header('location:view_unit.php?msg=1.1');

		}

}
