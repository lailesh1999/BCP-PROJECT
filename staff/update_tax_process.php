<?php
include('dbconnect.php');
if(isset($_POST['updatetax']))
{
	session_start();
	$admin_id = $_SESSION["admin_id"];
	$tax_name = $_POST['tax_name'];
	$tax_rate = $_POST['tax_rate'];
	$tax_id = $_POST['tax_id'];
     $query = " UPDATE tax_tbl SET updated_by_id = '$admin_id',tax_name ='$tax_name', tax_rate = '$tax_rate' where tax_id = '$tax_id'";
	$query_res = $link->query($query);
	if($query_res)
	{
		
		header('location:view_tax.php?msg=3');
	}
	else
	{
		header('location:view_tax.php?msg=3.1');
	}
}




?>