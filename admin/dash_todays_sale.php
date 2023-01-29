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
$query = "SELECT * from invoice_tbl where date(created_date) = '$date' and deleted = '0'";
 $query_res = $link->query($query);
 $c5=0;
  $grand =0;
 ?>
 	<div style="padding: 5%;">
    <a href="index.php" class='fas fa-arrow-alt-circle-left' style='font-size:48px;color:blue'></a>
  <center><h1 style="color:blue;background-color:blue;color:white"><marquee> TODAYS SALES</marquee></h1></center>
 	<table  class="table table-hover  table-bordered" id="example1" style="width: 100%;color:white;">
 			<tr style="background-color:blue;color:white;">
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
    <tr style="color:black;"><td style="text-align: center;"> <?php echo " $date"; ?></td>
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
else
{
    echo"no recors found";
}
?>
</table>
<h4 style="padding-left:89%;"> TOTAL SALES   &nbsp<?php echo $grand;?></h4>


	


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