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
 $query = " SELECT * from supplier_tbl where deleted='0' and status='0' ";
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
								
                                <div class="alert alert-danger alert-dismissible fade show">
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
                                <div class="alert alert-danger alert-dismissible fade show">
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
 	<div style="padding: 2%;">
	<h1 class="card-title">VIEW SUPPIER</h1>
 	<table class="table table-dark table-striped" id="example" style="width: 95%;">
 			<thead><tr><th>SUPPLIER ID</th>
 						<th>SUPPLIER NAME</th>
                        <th>SUPPLIER CONTACT</th>
                        <th>SUPPLIER EMAIL</th>
                        <th>SUPPLIER ADDRESS</th>
                         <th>TAX RATE</th>
 						<th>EDIT</th>
 						<th>DELETE</th>
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
 			<tr><td> <?php echo " $supplier_id"; ?></td>
				<td> <?php echo "$supplier_name "; ?></td>
				<td> <?php echo "$supplier_contact "; ?></td>
				<td> <?php echo "$supplier_email "; ?></td>
				<td> <?php echo " $supplier_address"; ?></td>
				<td> <?php echo " $tax"; ?></td>
 				<td><a  onclick="myEdit(<?php echo "$supplier_id"; ?>)" class="btn btn-primary" style="color:white; ">EDIT</a> </td>
 				<td> <a onclick="myFun(<?php echo "$supplier_id"; ?>)"  class = "btn btn-danger" style="color:white; ">DELETE</a></td>
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