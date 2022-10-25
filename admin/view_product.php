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
 $query = " SELECT * from product_tbl where deleted='0' and status='0' ";
 $query_res = $link->query($query);
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
 	<table class="table table-bordered" id="example" style="width: 40%;">
 			<thead><tr> <th>PRODUCT ID</th>
                        <th>PRODUCT CODE</th>
 						<th>PRODUCT NAME</th>
 						<th>PACKING</th>
                        <th>GENERIC NAME</th>
                        <th>EXPIRY DATE</th>
                        <th>QUANTITY</th>
                        <th>MRP</th>
                        <th>RATE</th>
                        <th>PRODUCT DESCRIPTION</th>
                        <th>STOCK STATUS</th>
                        <th>STATUS</th>
                        <th>CREATED DATE</th>
                        <th>DELETED</th>
                        <th>INSERTED BY ID</th>
                        <th>UPDATED BY ID</th>
                        <th>DELETED BY ID</th>
 					</tr>
 			</thead>
		 <?php
 	 			while($rows = mysqli_fetch_array($query_res))
 	 			{
 						$product_id = $rows['product_id'];
                        $product_code = $rows['product_code'];
 						$product_name = $rows["product_name"];
                        $packing = $rows['packing'];
                        $generic_name = $rows['generic_name'];
                        $expiry_date = $rows['expiry_date'];
                        $quantity = $rows['quantity'];
                        $mrp = $rows['mrp'];
                        $rate = $rows['rate'];
                        $product_description = $rows['product_description'];
                        $stock_status = $rows['stock_status'];
                        $status = $rows['status'];
                        $created_date = $rows['created_date'];
                        $deleted = $rows['deleted'];
                        $inserted_by_id = $rows['inserted_by_id'];
                        $updated_by_id = $rows['updated_by_id'];
                        $deleted_by_id = $rows['deleted_by_id'];

		 ?>
 			    <tr><td> <?php echo " $product_id"; ?></td>
 				<td><?php echo " $product_code"; ?></td>
                 <td><?php echo " $product_name"; ?></td>
                 <td><?php echo "  $packing"; ?></td>
                 <td><?php echo "  $generic_name"; ?></td>
                 <td><?php echo " $expiry_date"; ?></td>
                 <td><?php echo " $quantity"; ?></td>
                 <td><?php echo "  $mrp"; ?></td>
                 <td><?php echo " $rate "; ?></td>
                 <td><?php echo " $product_description"; ?></td>
                 <td><?php echo " $stock_status"; ?></td>
                 <td><?php echo " $status"; ?></td>
                 <td><?php echo " $created_date"; ?></td>
                 <td><?php echo " $deleted"; ?></td>
                 <td><?php echo " $inserted_by_id"; ?></td>
                 <td><?php echo " $updated_by_id"; ?></td>
                 <td><?php echo " $deleted_by_id"; ?></td>
 				<td><a  onclick="myEdit(<?php echo "$product_id"; ?>)" class="btn btn-primary" style="color:white; ">EDIT</a> </td>
 				<td> <a onclick="myFun(<?php echo "$product_id"; ?>)"  class = "btn btn-danger" style="color:white; ">delete</a></td>
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
		
			window.location="view_product.php";
	
		
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
			window.location="delete_product.php?product_id="+pid;
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