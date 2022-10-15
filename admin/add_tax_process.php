<?php
include('dbconnect.php');
if(isset($_POST['addtax']))
{
	session_start();
	$admin_id= $_SESSION["admin_id"];
	$tax_rate = $_POST['tax_rate'];
	$tax_name = $_POST['tax_name'];
	$query= " insert into tax_tbl (tax_name,tax_rate,inserted_by_id) values ('$tax_name','$tax_rate','$admin_id')  ";
		$query_res=$link->query($query);
		if($query_res)
		{
			header('location:view_tax.php?msg=1');

		}
		else
		{
			header('location:view_tax.php?msg=1.1');
		}

}



?>