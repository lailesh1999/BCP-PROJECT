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
 $query = " SELECT i.order_no,c.customer_name,c.contact,i.grand_total from customer_tbl c,invoice_tbl i where i.customer_id = c.customer_id and i.deleted='0' and  c.deleted='0' and c.status='0' ";
 $query_res = $link->query($query);
 $c5=0;
 ?>
 	<div style="padding: 5%;">
    <a href="index.php" class='fas fa-arrow-alt-circle-left' style='font-size:48px;color:Tomato'></a>
  <center><h1 style="color:blue;background-color:Tomato;color:white"><marquee> INVOICE</marquee></h1></center>
 	<table  class="table table-hover  table-bordered" id="example1" style="width: 100%;color:white;">
 			<tr style="background-color:Tomato;color:white;">
                        <th>INVOICE NUMBER</th>
 						<th>ORDER NO</th>
                        <th>CUSTOMER NAME</th>
                        <th>CONTACT</th>
                        <th> TOTAL AMOUNT   </th>
                         
 					</tr>
 			</thead>

		 <?php
 	 			while($rows = mysqli_fetch_array($query_res))
 	 			{
                    $c5 = $c5 + 1;
 				//foreach($query_res as $rows )
 					//{
                        //$supplier_id = $rows['supplier_id'];
                        $customer_name = $rows['customer_name'];
                        $contact = $rows['contact'];
                        $order_no=$rows['order_no'];
                        $grand_total=$rows['grand_total'];
                


		 ?>
 			<tr style="color:black;">
				<td> <?php echo "$c5 "; ?></td>
				<td> <?php echo "$order_no "; ?></td>
				<td> <?php echo "$customer_name "; ?></td>
				<td> <?php echo " $contact "; ?></td>
                <td> <?php echo " $grand_total"; ?></td>
				
			</tr>
	
<?php 
 					}
				




?>
</table>



	


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