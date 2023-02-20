<?php
include("dbconnect.php");

if(isset($_POST['updatecustomer'])){

    session_start();
    $admin_id = $_SESSION['admin_id'];
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $query = "UPDATE customer_tbl set customer_name = '$customer_name',contact='$contact',email='$email',address='$address',updated_by_id='$admin_id' where customer_id = '$customer_id'";
    $query_run = $link->query($query);
    if($query_run)
	{
		
		header('location:view_customer.php?msg=3');
	}
	else
	{
		header('location:view_customer.php?msg=3.1');
	}

}









?>