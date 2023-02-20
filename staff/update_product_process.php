<?php

include('dbconnect.php');
if(isset($_POST['updateproduct']))
{
	session_start();
	$staff_id = $_SESSION['staff_id'];
    $product_id = $_POST['product_id'];
	$category_id=$_POST['category_id'];
	$unit_id =$_POST['unit_id'];
	$tax_id=$_POST['tax_id'];
	$supplier_id = $_POST['supplier_id'];
    $product_name = $_POST['product_name'];
	$packing = $_POST['packing'];
    $generic_name = $_POST['generic_name'];
   echo  $query = " UPDATE product_tbl SET product_name ='$product_name',packing='$packing',generic_name='$generic_name',supplier_id='$supplier_id',category_id='$category_id',unit_id='$unit_id',tax_id='$tax_id',updated_by_id='$staff_id' where product_id = '$product_id'";
	$query_res = $link->query($query);
	if($query_res)
	{
		header('location:view_product.php?msg=3');
	}
	else
	{
		header('location:view_product.php?msg=3.1');
	}
}

?>