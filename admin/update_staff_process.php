<?php
include("dbconnect.php");

if(isset($_POST['updatestaff'])){

    session_start();
    $admin_id = $_SESSION['admin_id'];
    $staff_id = $_POST['staff_id'];
    $staff_name = $_POST['staff_name'];
    $staff_contact = $_POST['staff_contact'];
    $staff_email = $_POST['staff_email'];
    $staff_address = $_POST['staff_address'];
    $password = $_POST['password'];
    $query = "UPDATE staff_tbl set staff_name = '$staff_name',staff_contact='$staff_contact',staff_email='$staff_email',staff_address='$staff_address',updated_by_id='$admin_id',password = '$password' where staff_id = '$staff_id'";
    $query_run = $link->query($query);
    if($query_run)
	{
		
		header('location:view_staff.php?msg=3');
	}
	else
	{
		header('location:view_staff.php?msg=3.1');
	}

}









?>