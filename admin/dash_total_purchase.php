<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<?php

		include('includes/stylesheet.php');
        include('secure.php');  
	?>
</head>
<body>
	<?php

		include('includes/sidenav.php');
?>
<div class="main-content" id="panel">
<?php
	

	include('includes/topnav.php');
	//include('includes/header.php');
?>

<?php
include("dbconnect.php");
   $date = date('Y-m-d');
    $query = "SELECT s.supplier_name,p.product_name,pc.quantity,pc.purchase_price,pc.invoice_number,pc.total_price from purchase_tbl pc,supplier_tbl s,product_tbl p where date(pc.created_date) >= '$date'  and pc.deleted = '0' and pc.product_id = p.product_id and pc.supplier_id = s.supplier_id";
 $query_res = $link->query($query);
 $c5=0;
  $grand =0;
  $grand_total=0;
 ?>
 	<div style="padding: 5%;">
    <a href="index.php" class='fas fa-arrow-alt-circle-left' style='font-size:48px;color:blue'></a>
  <center><h1 style="color:blue;background-color:blue;color:white">TODAYS PURCHASE</h1></center>
 	<table  class="table table-hover  table-bordered" id="example1" style="width: 100%;color:white;">
 			<tr style="background-color:blue;color:white;">
            <th style="text-align: center;">SUPPLIER NAME</th>
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
    <tr style="color:black;"><td style="text-align: center;"> <?php echo " $supplier_name"; ?></td>
			  <td style="text-align: center;"> <?php echo "$product_name "; ?></td>
				<td style="text-align: center;"> <?php echo "$quantity "; ?></td>
				<td style="text-align: center;"> <?php echo "$purchase_price "; ?></td>
				<td style="text-align: center;"> <?php echo " $invoice_number"; ?></td>
                <td style="text-align: center;"> <?php echo " $total_price"; ?></td>
		<?php
    }

}
else
{
    echo"<h1 style=color:red;>NO RECORDS FOUND </h1>";
}
?>
</table>
<h4 style="padding-left:89%;"> TOTAL PURCHASE    &nbsp<?php echo $grand_total ?></h4>


	


</div>




<?php
	//include('includes/footer.php');
?>


</div>


<?php
include('includes/script.php');
?>

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script type="text/javascript">

	function myFun(sid){
		var edit = confirm("ARE YOU SURE TO DELETE DATA");
		if(edit){
			window.location="delete_supplier.php?supplier_id="+sid;
		}
		
    }
</script>
<script type="text/javascript">

	function myEdit(sid){
		var edit = confirm("ARE YOU SURE TO EDIT DATA");
		if(edit){
			window.location="update_supplier.php?supplier_id="+sid;
		}
		
    }
</script>
  
</body>
</html>

<script type="text/javascript">

    function diss(){
		
			window.location="view_supplier.php";
	
		
    }

 </script> 