
<?php
include('dbconnect.php');
$date = date('Y-m-d');
$product_name = $_GET["proname"];
$query = "SELECT p.product_name,p.generic_name,p.product_id,s.rate,s.expiry_date,s.quantity,s.batch_number,s.stock_id from product_tbl p,stock_tbl s where p.product_id = s.product_id  and p.deleted='0' and s.deleted='0' and p.product_name='$product_name'";
$query_result = $link->query($query);
while($rows = mysqli_fetch_array($query_result))
{
	$product_name = $rows['product_name'];
	$generic_name = $rows['generic_name'];
    $product_id = $rows['product_id'];
    $rate = $rows['rate'];
    $expiry_date = $rows['expiry_date'];
    $quantity = $rows['quantity'];
    $batch_number = $rows['batch_number'];
	//$quantity = $rows['quantity'];
	//$total = $quantity * $selling_price;
}

echo "$generic_name~$batch_number~$expiry_date~$rate";


?>






