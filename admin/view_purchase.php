	<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"
/>
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
$query = "select p.product_name,pt.quantity,pt.purchase_price,pt.invoice_number,pt.total_price,s.supplier_name,p.product_id,pt.created_date,pt.purchase_id,s.supplier_id from product_tbl p,purchase_tbl pt,supplier_tbl s where s.supplier_id = pt.supplier_id and p.product_id=.pt.product_id and s.supplier_id=pt.supplier_id and p.deleted='0' and pt.deleted='0' and s.deleted='0'";
$query_run = $link->query($query);

if(isset($_GET['msg']))
 {
    if($_GET['msg']== 1)
    {
        ?>
                            <div class="container">
								
                                <div class="alert alert-success alert-dismissible fade show">
									<button type="button" onclick="diss()" class="close" data-dismiss="alert">&times;</button>
									<strong>!!!!!DATA HAS BEEN ADDED SUCESSFULLY!!!!!</strong> 
								</div>
							</div>
<?php

 }
}
if(isset($_GET['msg']))
 {
    if($_GET['msg']== 1.1)
    {
        ?>

                            <div class="container">

                                <div class="alert alert-success alert-dismissible fade show">
									<button type="button" onclick="diss()" class="close" data-dismiss="alert">&times;</button>
									<strong>!!!!!DATA HAS NOT BEEN INSERTED!!!!!</strong> 
								</div>
							</div>
<?php

 }
}
 if(isset($_GET['msg']))
 {
    if($_GET['msg']== 2)
    {
        ?>
                            <div class="container">
								
                                <div class="alert alert-success alert-dismissible fade show">
									<button type="button" onclick="diss()" class="close" data-dismiss="alert">&times;</button>
									<strong>!!!!!DATA HAS BEEN DELETED SUCESSFULLY!!!!!</strong> 
								</div>
							</div>
<?php
    }

 }
 if(isset($_GET['msg']))
 {
    if($_GET['msg']== 2.1)
    {
        ?>

                            <div class="container">
								
                                <div class="alert alert-success alert-dismissible fade show">
									<button type="button" onclick="diss()" class="close" data-dismiss="alert">&times;</button>
									<strong>!!!!!DATA HAS NOT BEEN DELETED!!!!!</strong> 
								</div>
							</div>
<?php

 }
}
if(isset($_GET['msg']))
 {
    if($_GET['msg']== 3)
    {
        ?>

                            <div class="container">
								
                                <div class="alert alert-success alert-dismissible fade show">
									<button type="button" onclick="diss()" class="close" data-dismiss="alert">&times;</button>
									<strong>DATA HAS BEEN UPDATED</strong> 
								</div>
							</div>
<?php

 }
}

if(isset($_GET['msg']))
 {
    if($_GET['msg']== 3.1)
    {
        ?>
                            <div class="container">
								
                                <div class="alert alert-success alert-dismissible fade show">
									<button type="button" onclick="diss()" class="close" data-dismiss="alert">&times;</button>
									<strong>DATA HAS NOT UPDATED</strong> 
								</div>
							</div>
<?php
 }
}
 ?>
 	<div style="padding: 5%;">
	<h1>VIEW PURCHASE</h1>
 	<table class="table " id="example" style="width: 100%;">
 			<thead class="table-dark"><tr>
                        <th>SUPPLIER NAME</th>
                        <th>MEDICINE NAME</th>
                        <th>QUANTITY</th>
                        <th>PURCHASE PRICE</th>
                        <th>TOTAL PRICE</th>
 						<th>INVOICE NUMBER</th>
 						<th>CREATED DATE</th>
                        <th>DELETE</th>
 					</tr>
 			</thead>
		 <?php
 	 			while($rows = mysqli_fetch_array($query_run))
 	 			{
 						$purchase_id = $rows['purchase_id'];
 						$product_name = $rows["product_name"];
                        $supplier_name = $rows['supplier_name'];
                        $invoice_number = $rows['invoice_number'];
                        $purchase_price = $rows['purchase_price'];
                        $supplier_name = $rows['supplier_name'];
                        $qty = $rows['quantity'];
                        $total_price = $rows['total_price'];

		 ?>
 			    <tr>
                 <td><?php echo " $supplier_name"; ?></td>
                 <td><?php echo " $product_name"; ?></td>
                 <td><?php echo " $qty"; ?></td>
                 <td><?php echo " $purchase_price"; ?></td>
                 <td><?php echo " $total_price"; ?></td>
                 <td><?php echo " $invoice_number"; ?></td>
                 
                
                  <td><?php echo " $rows[created_date]"; ?></td>

 				<td> <a onclick="myFun(<?php echo "$purchase_id"; ?>)"  class = "btn btn-danger" style="color:white; ">DELETE</a></td>
			</tr>
	
<?php 
 					}
			
?>
</table>
<a href="index.php" class="btn btn-danger">CANCEL</a></div>

</div>
<?php
	//include('includes/footer.php');
?>


</div>


<?php
include('includes/script.php');
?>



  
</body>
</html>

<script type="text/javascript">

    function diss(){
		
			window.location="view_stock.php";
	
		
    }

 </script> 
 <script type="text/javascript">
$(document).ready(function() {
    $('#example11').DataTable();
} );
</script>

<script type="text/javascript">

	function myFun(pid){
		var edit = confirm("ARE YOU SURE TO DELETE DATA");
		if(edit){
			window.location="delete_purchase.php?purchase_id="+pid;
		}
		
    }
</script>
<script type="text/javascript">

	function myEdit(pid){
		var edit = confirm("ARE YOU SURE TO EDIT DATA");
		if(edit){
			window.location="update_product.php?product_id="+pid;
		}
		
    }
</script>

<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"
></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script type="text/javascript" >
$(function() {
$("#example").dataTable();
});
</script>