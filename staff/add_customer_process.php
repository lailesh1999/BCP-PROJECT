<?php
include('dbconnect.php');
if(isset($_POST['addcustomer']))
{
	session_start();
	$staff_id= $_SESSION['staff_id'];
	$customer_name=$_POST['customer_name'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$address=$_POST['address'];
   echo $query = "insert into customer_tbl (customer_name,contact,email,address,inserted_by_id) values ('$customer_name','$contact','$email','$address','$staff_id') ";
		$query_result=$link->query($query);
		if($query_result)
	 {
	 	header('location:billing.php');
        echo"inserted";

	 }
	 else
	 {
        //header('location:view_supplier.php?msg=1.1');
        echo "not inserted";
    }

}