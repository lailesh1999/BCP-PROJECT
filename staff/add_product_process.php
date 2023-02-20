<?php
include('dbconnect.php');
if(isset($_POST['addproduct']))
{
	session_start();
	$staff_id = $_SESSION['staff_id'];
	$product_name = $_POST['product_name'];
	$packing = $_POST['packing'];
    $generic_name = $_POST['generic_name'];
    $unit_id=$_POST['unit_id'];
	$tax_id=$_POST['tax_id'];
	$category_id = $_POST['category_id'];
	$supplier_id = $_POST['supplier_id'];
   echo $supplier_id;

	 echo $query= " insert into product_tbl (unit_id,tax_id,category_id,supplier_id,product_name,
    packing,generic_name,inserted_by_id) values ('$unit_id','$tax_id','$category_id','$supplier_id','$product_name','$packing','$generic_name','$staff_id')";
		$query_res=$link->query($query);
		if($query_res)
		{
		     header('location:view_product.php?msg=1');

		}
		else
		{
			header('location:view_product.php?msg=1.1');
		}

}




?>