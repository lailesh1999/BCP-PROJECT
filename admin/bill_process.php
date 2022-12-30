<?php
include('dbconnect.php');
if(isset($_POST['bill']))
{
	$order_no = $_POST['order_no'];
	$customer_id = $_POST['customer_id'];
	//$date= $_POST['date'];
	//$time = $_POST['time'];
	//$address_id = $_POST['address_id'];
	//$grand_total = $_POST['grand_total'];
	$total = $_POST['total'];
    $grand_total = $_POST['grand_total'];
	// $grand_total=0;
	// foreach ($total as $totals) {
	// 	$grand_total = $grand_total + $totals;
	// }
    //$grand_total;
   $query = "INSERT into invoice_tbl (order_no,customer_id,grand_total) VALUES('$order_no','$customer_id','$grand_total')";
    
    $query_run = $link->query($query);
	$invoice_id = $link->insert_id;
	$quantity = $_POST['quantity'];
	$price = $_POST['rate'];
	$product_name = $_POST['product_name'];
	$batch_number = $_POST['batch_number'];
	//$product_code = $_POST["product_code"];
	$i=0;
	foreach ($product_name as $key=>$value ) {
		//$product_code = $_POST["product_code"][$i];
		$product_name = $_POST['product_name'][$i];
		$price = $_POST['rate'][$i];
		$quantity = $_POST['quantity'][$i];
		$batch_number = $_POST['batch_number'][$i];
		$product_qry = "SELECT p.product_id,s.stock_id from product_tbl p,stock_tbl s where s.rate='$price' and s.batch_number = '$batch_number' and  p.product_name='$product_name' and s.deleted='0'and s.status='0' and p.deleted='0' and p.status='0'";
		$product_result = $link->query($product_qry);
		while($rows = mysqli_fetch_array($product_result))
		{
			$product_id = $rows['product_id'];
			$stock_id = $rows['stock_id']; 
		}
		//echo "<br/>";
		$query_invoice_detail = " INSERT INTO invoice_detail_tbl (invoice_id,stock_id,product_id,quantity,price) values('$invoice_id','$stock_id','$product_id','$quantity','$price') ";
		$query_invoice_detail_result = $link->query($query_invoice_detail);
		$i++;
	}
}  
?>
<div style="width: auto;border: 2px solid black;padding-left: 1%;height: auto;"><br>
<b>DEEPTHI MEDICALS</b><br><br>
	<?php
	$query = " select * from customer_tbl where customer_id='$customer_id' and deleted = '0'";
	$query_run = $link->query($query);
	while($row = mysqli_fetch_array($query_run))
	{
		$customer_name = $row['customer_name'];
		$email = $row['email'];
		$contact = $row['contact'];
		$address = $row['address'];
	
		$email = $row['email'];
	}
	
	?>
	<b>NAME:<?php echo $customer_name;?></b><br>
	<b>PHONE NUMNBER:<?php echo $contact;?></b><br>
	<b>ADDRESS:<?php echo $address;?></b><br>
	<b>RECIPT NO:<?php echo $order_no;?></b><br>
	

	<?php
 $query_invoice = " SELECT i.grand_total,i.order_no,s.expiry_date,s.batch_number,p.product_name,id.quantity,id.price,i.invoice_id,id.invoice_detail_id from invoice_tbl i,stock_tbl s,product_tbl p,invoice_detail_tbl id where id.product_id = p.product_id and id.stock_id = s.stock_id and id.invoice_id = i.invoice_id and i.order_no='$order_no'";
	$query_invoice_result = $link->query($query_invoice);
	$total_quantity = 0;
	?>
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




</div>
<script type="text/javascript">
	
	window.print();
</script>