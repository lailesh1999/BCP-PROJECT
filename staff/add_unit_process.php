<?php
include('dbconnect.php');
if(isset($_POST['addunit']))
{
	session_start();
	$staff_id = $_SESSION['staff_id'];
	$unit_name = $_POST['unit_name'];
	$query= " insert into unit_tbl (unit_name,inserted_by_id) values ('$unit_name','$staff_id') ";
		$query_res=$link->query($query);
		if($query_res)
		{
			echo "data has been inserted";
			header('location:add_units.php?msg=1');

		}
		else
		{
			header('location:add_units.php?msg=1.1');

		}

}
