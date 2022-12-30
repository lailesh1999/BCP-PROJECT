<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



<?php
include('dbconnect.php');

$invoice_id = $_GET['invoice_id'];
$query = "SELECT * from invoice_tbl where invoice_id='$invoice_id' and deleted = '0'";
$query_res = $link->query($query);
?>
<div style="width: 50%;border: 2px solid black;padding-left: 1%;height: auto;">
<table class="table table-bordered" style="width: 100%;" id="datatable">
<b><center>CUSTOMER DETAIL</center></b><hr>	
<?php
 while($row = mysqli_fetch_array($query_res))
 {
 	$order_no = $row['order_no'];
 	$invoice_id = $row['invoice_id'];
 	$grand_total = $row['grand_total'];
 	$customer_id = $row['customer_id'];
 	$created_date = $row['created_date'];
 	$query1 = "SELECT * from customer_tbl  where customer_id='$customer_id'";
 		$query_result1 = $link->query($query1);
 		while($r = mysqli_fetch_array($query_result1))
 		{
 			$address = $r['address'];
 			$customer_name =$r['customer_name'];
 			$contact=$r['contact'];
 			
 		}
 	?>
 	<tr>
 		<tr><th style="text-align: left;">CUSTOMER NAME:</th><td><?php echo $customer_name; ?></td></tr>
 		<tr><th style="text-align: left;">ORDER NO:</th><td><?php echo $order_no; ?></td></tr>
 		<tr><th style="text-align: left;">ADDRESS:</th><td><?php echo $address; ?></td></tr>
 		<tr><TH style="text-align: left;">PHONE NUMBER:P</TH><td><?php echo $contact; ?></td></tr>
 		<tr><th style="text-align: left;">ORDERED  DATE:</th><td><?php echo $created_date; ?></td>
<?php
}
?>
</tr></table></div>

<?php


 	$query_invoice = " SELECT i.grand_total,i.order_no,s.expiry_date,s.batch_number,p.product_name,id.quantity,id.price,i.invoice_id,id.invoice_detail_id from invoice_tbl i,stock_tbl s,product_tbl p,invoice_detail_tbl id where id.product_id = p.product_id and id.stock_id = s.stock_id and id.invoice_id = i.invoice_id and i.order_no='$order_no'";
	$query_invoice_result = $link->query($query_invoice);
	$total_quantity = 0;
	?>
<div style="width: 50%;border: 2px solid black;padding-left: 1%;height: auto;">

<table class="table table-borderless" style="width: 100%;">
 			<thead><tr><th>MEDICINE  NAME</th>
						<th>EXPIRY DATE</th>
 						<th>BATCH NUMBER</th>
 						 <th>QUANTITY</th>
 			 			<th>PRICE</th>
 						<th>TOTAL PRICE</th>
						<hr>
 						</tr>
	<?php
	$t =0;
	while($r =mysqli_fetch_array($query_invoice_result))
	{
		//$grand_total = $r['grand_total'];
		$product_name = $r['product_name'];
		$quantity=$r['quantity'];
		$price=$r['price'];
		$grand_total =$r['grand_total'];
		$expiry_date = $r['expiry_date'];
		$batch_number = $r['batch_number'];
		$totalq = $quantity * $price;
		$total_quantity = $total_quantity + $quantity;
		//$t = $t + $grand_total;
	?>
<tr><td style="text-align: center;"> <?php echo " $product_name"; ?></td>
			<td style="text-align: center;"> <?php echo "$expiry_date "; ?></td>
			<td style="text-align: center;"> <?php echo "$batch_number "; ?></td>
				<td style="text-align: center;"> <?php echo "$quantity "; ?></td>
				<td style="text-align: center;"> <?php echo "$price "; ?></td>
				<td style="text-align: center;"> <?php echo " $totalq"; ?></td>
		<?php
 }

?>
 				</tr>
 				<td  style="padding-left: 2%;"></td>  <td><b>TOTAL QUANTITY:&nbsp</b><?php echo $total_quantity; ?></td><td colspan="1"> </td><td colspan="2"><b>GRAND-TOTAL:&nbsp</b><?php echo $grand_total; ?></td>




</table></div>
<script type="text/javascript">
	
window.print();	
</script>

</body>
</html>
