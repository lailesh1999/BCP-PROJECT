<?php
include("dbconnect.php");
if(isset($_POST['loginbtn']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$flag = "0";
	$admin_id = "";
	$query=" SELECT * FROM admin_tbl WHERE username='$username' AND password='$password'";
	$query_run = $link->query($query);
	while($rows=mysqli_fetch_array($query_run))
	{
			$admin_id = $rows["admin_id"];
			$flag="1";
	}
		if($flag=="1")
		{
			session_start();
			$_SESSION["admin_id"] = $admin_id;
			header("location:admin/index.php");
			echo "password and username are correct";
		}
		else
		{
			//$message = "Username and/or Password incorrect.\\nTry again.";
 			 /*echo "<script type='text/javascript'>alert('$message'); </script>";
 			 echo "<script type='text/javascript'>window.location='login.php';</script>";*/
 			 header('location:admin_login.php?msg=1');

		}
}

?>