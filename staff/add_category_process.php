<?php
include('dbconnect.php');
if(isset($_POST['addcategory']))
{
	session_start();
	$staff_id=$_SESSION['staff_id'];
	$category_name = $_POST['category_name'];
	 $query = " insert into category_tbl (category_name,inserted_by_id) values ('$category_name','$staff_id')";
	 $query_res = $link->query($query);
	 if($query_res)
	 {
	 	header('location:add_category.php?msg=1');

	 }
	 else
	 {
        header('location:add_category.php?msg=1.1');
    }
	 
  } 
?>