<?php
include('../dbconnect.php');
$vali = $_GET['valiNam'];
$flag = 0;
$query = "select * from supplier_tbl where supplier_name= '$vali' and deleted = '0'";
$query_run = $link->query($query);

if(mysqli_num_rows($query_run) > 0){
	$flag = 1;
}
echo $flag;


?>