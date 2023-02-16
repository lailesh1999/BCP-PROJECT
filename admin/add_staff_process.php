<?php
include('dbconnect.php');

if(isset($_POST['addstaff'])){
	$staff_name = $_POST['staff_name'];
	$staff_address = $_POST['staff_address'];
	$staff_contact = $_POST['staff_contact'];
	$staff_email = $_POST['staff_email'];
	$password = $_POST['password'];
	session_start();
	$admin_id = $_SESSION['admin_id'];
echo $query = "insert into staff_tbl (staff_name,staff_contact,staff_email,staff_address,password,inserted_by_id) values ('$staff_name','$staff_contact','$staff_email','$staff_address','$password','$admin_id') ";
		$query_result=$link->query($query);
		if($query_result)
	 {
	 	header('location:view_staff.php?msg=1');

	 }
	 else
	 {
        header('location:view_staff.php?msg=1.1');
    }
}



?>