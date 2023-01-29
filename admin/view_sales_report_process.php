<!DOCTYPE html>
 <html>
 <head>
   <title></title> 
<?php

    include('includes/stylesheet.php');
  
     include("dbconnect.php");
     include('secure.php');
?>    
 </head>
 <body>
 <?php 
 if(isset($_POST['report']))
 {
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
   $query = "SELECT * from invoice_tbl where date(created_date) >= '$from_date' and date(created_date)<='$to_date' and deleted = '0'";
    $query_res = $link->query($query);
    $grand=0; 
 }
?>
<div style="padding: 2%"> 
<div id="filter">
<table class="table table-sm" style="width: 100%;" id="datatable">
	<tr>
		<th style="text-align: center;">DATE</th>
        <th style="text-align: center;">CUSTOMER NAME</th>
        <th style="text-align: center;">ORDER NUMBER</th>
		<th style="text-align: center;">MEDICINE NAME</th>
		<th style="text-align: center;">QUANTITY</th>
		<th style="text-align: center;">PRICE</th>
		<th style="text-align: center;">TOTAL</th>
	</tr>
<?php
    if (mysqli_num_rows($query_res) > 0) 
{
 while($row = mysqli_fetch_array($query_res))
 { 
 	$grand_total = $row['grand_total'];
 	$customer_id = $row['customer_id'];
    $invoice_id = $row['invoice_id'];
 	    $query1 = "SELECT * from customer_tbl  where customer_id='$customer_id'";
 		$query_result1 = $link->query($query1);
 		while($r = mysqli_fetch_array($query_result1))
 		{
 			$customer_name =$r['customer_name'];	
 		}
         $query_invoice = " SELECT i.order_no,i.invoice_id,i.created_date,p.product_name,id.quantity,id.price,i.invoice_id,id.invoice_detail_id from invoice_tbl i,product_tbl p,invoice_detail_tbl id where id.product_id = p.product_id and id.invoice_id = i.invoice_id and i.invoice_id = '$invoice_id'";
	    $query_invoice_result = $link->query($query_invoice);
	    $total_quantity = 0;
        while($r =mysqli_fetch_array($query_invoice_result))
	{
		//$grand_total = $r['grand_total'];
		$order_no = $row['order_no'];
        $product_name = $r['product_name'];
		$quantity=$r['quantity'];
		$price=$r['price'];
        $date = $row['created_date'];
		$totalq = $quantity * $price;
		$total_quantity = $total_quantity + $quantity;
        $grand = $grand + $totalq;
		//$t = $t + $grand_total;
	?>
    <tr><td style="text-align: center;"> <?php echo " $date"; ?></td>
			  <td style="text-align: center;"> <?php echo "$customer_name "; ?></td>
			  <td style="text-align: center;"> <?php echo "$order_no "; ?></td>
				<td style="text-align: center;"> <?php echo "$product_name "; ?></td>
				<td style="text-align: center;"> <?php echo "$quantity "; ?></td>
				<td style="text-align: center;"> <?php echo " $price"; ?></td>
                <td style="text-align: center;"> <?php echo " $totalq"; ?></td>
		<?php
    }
}
}
?>
</table>
<h4 style="padding-left:89%;"> TOTAL SALES   &nbsp<?php echo $grand;?></h4>
<a href = "view_sales_report.php">BACK</a>
<input type="button" onclick="print1()" value="PRINT">
</body>

 </html>
<script>
    function print1(){
        window.print();
    }
</script>