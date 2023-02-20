<?php

include('dbconnect.php');
if(isset($_POST['updatecategory']))
{
	session_start();
	$staff_id = $_SESSION['staff_id'];
	$category_name = $_POST['category_name'];
	$category_id = $_POST['category_id'];
    $query = " UPDATE category_tbl SET category_name ='$category_name',updated_by_id='$staff_id' where category_id = '$category_id'";
	$query_res = $link->query($query);
	if($query_res)
	{
		header('location:view_category.php?msg=3');
	}
	else
	{
		header('location:view_category.php?msg=3.1');
	}
	
}

?>