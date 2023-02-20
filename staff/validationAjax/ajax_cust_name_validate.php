<?php
include('../dbconnect.php');
$customer_name = $_GET['valiName'];
$flag = 0;
$query = "select customer_name from customer_tbl where customer_name= '$customer_name' and deleted = '0'";
$query_run = $link->query($query);

if(mysqli_num_rows($query_run) > 0){
	$flag = 1;
}
echo $flag;


?>