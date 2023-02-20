<?php
include('../dbconnect.php');
$cid = $_GET['cid'];
$flag = 0;
$query = "select customer_id from invoice_tbl where customer_id= '$cid' and deleted = '0'";
$query_run = $link->query($query);

if(mysqli_num_rows($query_run) > 0){
	$flag = 1;
}
echo $flag;


?>