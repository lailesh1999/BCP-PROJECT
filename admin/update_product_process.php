<?php

include('dbconnect.php');
if(isset($_POST['updateproduct']))
{
	session_start();
	$admin_id = $_SESSION['admin_id'];
    $product_id = $_POST['product_id'];
	$category_id=$_POST['category_id'];
	$unit_id =$_POST['unit_id'];
	$tax_id=$_POST['tax_id'];
    $product_name = $_POST['product_name'];
	$product_description =$_POST['product_description'];
	$product_code=$_POST['product_code'];
	$quantity=$_POST['quantity'];
	$packing = $_POST['packing'];
    $generic_name = $_POST['generic_name'];
    $expiry_date = $_POST['expiry_date'];
    $mrp = $_POST['mrp'];
    $rate = $_POST['rate'];
    $query = " UPDATE product_tbl SET product_name ='$product_name',product_description='$product_description'
    ,product_code='$product_code',quantity='$quantity',packing='$packing',generic_name='$generic_name',expiry_date='$expiry_date',rate='$rate',mrp='$mrp',category_id='$category_id',unit_id='$unit_id',tax_id='$tax_id',updated_by_id='$admin_id' where product_id = '$product_id'";
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