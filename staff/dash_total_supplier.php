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

include("dbconnect.php");
 $query = " SELECT * from supplier_tbl where deleted='0' and status='0' ";
 $query_res = $link->query($query);
 $c4=0;
 ?>
 	<div style="padding: 5%;">
    <a href="index.php" class='fas fa-arrow-alt-circle-left' style='font-size:48px;color:Chocolate'></a>
  <center><h1 style="color:blue;background-color:Chocolate;color:white"> SUPPLIER</h1></center>
 	<table  class="table table-hover  table-bordered" id="example1" style="width: 100%;color:white;">
 		<thead>
 			<tr style="background-color:Chocolate;color:white;">
 						<th>SUPPLIER NAME</th>
                        <th>SUPPLIER CONTACT</th>
                        <th>SUPPLIER EMAIL</th>
                        <th>SUPPLIER ADDRESS</th>
                         
 					</tr>
 		</thead>

		 <?php
 	 			while($rows = mysqli_fetch_array($query_res))
 	 			{
 				//foreach($query_res as $rows )
 					//{
                        $supplier_id = $rows['supplier_id'];
                        $supplier_name = $rows['supplier_name'];
                        $supplier_contact = $rows['supplier_contact'];
                        $supplier_email=$rows['supplier_email'];
                        $supplier_address=$rows['supplier_address'];
                        $tax=$rows['tax'];


		 ?>
 			<tr style="color:black;">
				<td> <?php echo "$supplier_name "; ?></td>
				<td> <?php echo "$supplier_contact "; ?></td>
				<td> <?php echo "$supplier_email "; ?></td>
				<td> <?php echo " $supplier_address"; ?></td>
				
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

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example1').DataTable();
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