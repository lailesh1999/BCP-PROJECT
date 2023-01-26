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
    $query = "SELECT s.supplier_name,p.product_name,pc.quantity,pc.purchase_price,pc.invoice_number,pc.total_price from purchase_tbl pc,supplier_tbl s,product_tbl p where date(pc.created_date) >= '$from_date' and date(pc.created_date)<='$to_date' and pc.deleted = '0' and pc.product_id = p.product_id and pc.supplier_id = s.supplier_id";
    $query_res = $link->query($query);
    $grand_total=0; 
 }
?>
<div style="padding: 2%"> 
<div id="filter">
<table class="table table-sm" style="width: 100%;" id="datatable">
	<tr><th style="text-align: center;">SUPPLIER NAME</th>
        <th style="text-align: center;">MEDICINE NAME</th>
        <th style="text-align: center;">QUANTITY</th>
		<th style="text-align: center;">PURCHASE PRICE</th>
		<th style="text-align: center;">INVOICE NUMBER</th>
		<th style="text-align: center;">TOTAL PRICE</th>
	</tr>
<?php
    if (mysqli_num_rows($query_res) > 0) 
{
 while($row = mysqli_fetch_array($query_res))
 { 
 	$product_name = $row['product_name'];
 	$supplier_name = $row['supplier_name'];
    $quantity = $row['quantity'];
	$purchase_price = $row['purchase_price'];
	$invoice_number = $row['invoice_number'];
    $total_price = $row['total_price'];
	$grand_total = $grand_total + $total_price;
	?>
    <tr><td style="text-align: center;"> <?php echo " $supplier_name"; ?></td>
			  <td style="text-align: center;"> <?php echo "$product_name "; ?></td>
				<td style="text-align: center;"> <?php echo "$quantity "; ?></td>
				<td style="text-align: center;"> <?php echo "$purchase_price "; ?></td>
				<td style="text-align: center;"> <?php echo " $invoice_number"; ?></td>
                <td style="text-align: center;"> <?php echo " $total_price"; ?></td>
		<?php
    }

}
?>
</table>
<h4 style="padding-left:89%;"> TOTAL PURCHASE    &nbsp<?php echo $grand_total ?></h4>
<a href = "view_sales_report.php">BACK</a>
<input type="button" onclick="print1()" value="PRINT">
</body>

 </html>
<script>
    function print1(){
        window.print();
    }
</script>