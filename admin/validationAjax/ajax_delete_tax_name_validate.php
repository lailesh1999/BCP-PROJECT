<?php
include('../dbconnect.php');
$tid = $_GET['tid'];
$flag = 0;
$query = "select tax_id from product_tbl where tax_id= '$tid' and deleted = '0'";
$query_run = $link->query($query);

if(mysqli_num_rows($query_run) > 0){
	$flag = 1;
}
echo $flag;


?>