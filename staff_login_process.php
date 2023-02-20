<?php
include("dbconnect.php");
if(isset($_POST['loginbtn']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$flag = "0";
	$staff_id = "";
	$query=" SELECT * FROM staff_tbl WHERE staff_name='$username' AND password='$password'";
	$query_run = $link->query($query);
	while($rows=mysqli_fetch_array($query_run))
	{
			$staff_id = $rows["staff_id"];
			$flag="1";
	}
		if($flag=="1")
		{
			session_start();
			$_SESSION["staff_id"] = $staff_id;
			header("location:staff/index.php");
			echo "password and username are correct";
		}
		else
		{
			//$message = "Username and/or Password incorrect.\\nTry again.";
 			 /*echo "<script type='text/javascript'>alert('$message'); </script>";
 			 echo "<script type='text/javascript'>window.location='login.php';</script>";*/
 			 header('location:staff_login.php?msg=1');

		}
}

?>