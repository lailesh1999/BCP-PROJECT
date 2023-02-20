<?php
include('dbconnect.php');
$cust_name = $_GET["cust_name"];
$query = "SELECT * from customer_tbl where customer_name = '$cust_name' and deleted='0'";
$query_result = $link->query($query);
while($rows = mysqli_fetch_array($query_result))
{
	$customer_id = $rows['customer_id'];
	$customer_phone_number = $rows['contact'];
	//$selling_price = $rows['selling_price'];
	//$quantity = $rows['quantity'];
	//$total = $quantity * $selling_price;
    $arr = array("$customer_phone_number","$customer_id");
}

//echo $arr;
// if(!$customer_phone_number){
//     echo "NO CUSTOMER FOUND";
// }
// else{
//     echo "$customer_phone_number";
//     echo "$customer_id";
// }

if(isset($customer_id) && isset($customer_phone_number)){
    echo implode(" ",$arr);} else {
    echo 'NO_CUSTOMER_FOUND ';
}





?>