<?php
include("dbconnect.php");

if(isset($_POST['updatesupplier'])){

    session_start();
    $admin_id = $_SESSION['admin_id'];
    $supplier_id = $_POST['supplier_id'];
    $supplier_name = $_POST['supplier_name'];
    $supplier_contact = $_POST['supplier_contact'];
    $supplier_email = $_POST['supplier_email'];
    $supplier_address = $_POST['supplier_address'];
    $tax = $_POST['tax'];
    $query = "UPDATE supplier_tbl set supplier_name = '$supplier_name',supplier_contact='$supplier_contact',supplier_email='$supplier_email',supplier_address='$supplier_address',updated_by_id='$admin_id',tax = '$tax' where supplier_id = '$supplier_id'";
    $query_run = $link->query($query);
    if($query_run)
	{
		
		header('location:view_supplier.php?msg=3');
	}
	else
	{
		header('location:view_supplier.php?msg=3.1');
	}

}









?>