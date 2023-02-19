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
    $supplier_id = $_POST['supplier_id'];
    
$query = "select p.product_name,p.generic_name,p.packing,s.quantity,s.expiry_date,s.batch_number,s.mrp,s.rate,s.stock_id,rt.return_id,rt.status,rt.deleted,p.product_id,st.supplier_id,st.supplier_name from product_tbl p,stock_tbl s,supplier_tbl st ,return_stock_tbl rt where date(rt.created_date) >= '$from_date' and date(rt.created_date)<='$to_date' and rt.supplier_id = st.supplier_id and p.product_id=rt.product_id and rt.stock_id=s.stock_id and p.deleted='0' and st.deleted='0' and s.deleted='1' and rt.deleted ='0' and rt.status='1' and rt.supplier_id='$supplier_id'";
    $query_res = $link->query($query);
    $grand_total=0; 
}
?>
<div style="padding: 2%"> 
<div id="filter">
<table class="table table-sm" style="width: 100%;" id="datatable">
	<tr>
        <th style="text-align: center;">MEDICINE NAME</th>
        <th style="text-align: center;">QUANTITY</th>
        <th style="text-align: center;">PACKING</th>
        <th style="text-align: center;">EXPIRY DATE</th>
        <th style="text-align: center;">BATCH NUMBER</th>
		<th style="text-align: center;">PRICE</th>
		<th style="text-align: center;">TOTAL PRICE</th>
	</tr>
<?php
    if (mysqli_num_rows($query_res) > 0) 
{
 while($row = mysqli_fetch_array($query_res))
 { 
 	$product_name = $row['product_name'];
    $quantity = $row['quantity'];
    $packing = $row['packing'];
    $expiry_date = $row['expiry_date'];
    $batch_number = $row['batch_number'];
	$price = $row['rate'];
    $total_price = $quantity * $price;
	$grand_total = $grand_total + $total_price;
	?>
    <tr><td style="text-align: center;"> <?php echo " $product_name"; ?></td>
			  <td style="text-align: center;"> <?php echo "$quantity "; ?></td>
				<td style="text-align: center;"> <?php echo "$packing "; ?></td>
				<td style="text-align: center;"> <?php echo "$expiry_date "; ?></td>
				<td style="text-align: center;"> <?php echo " $batch_number"; ?></td>
                <td style="text-align: center;"> <?php echo " $price"; ?></td>
                <td style="text-align: center;"> <?php echo " $total_price"; ?></td>

		<?php
    }

}

?>
</table>
<h4 style="padding-left:89%;"> GRAND TOTAL    &nbsp<?php echo $grand_total ?></h4>
<a href = "dash_expired_medicine.php">BACK</a>
<input type="button" onclick="print1()" value="PRINT">
</body>

 </html>
<script>
    function print1(){
        window.print();
    }
</script>