<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">

	
	<?php
		include('includes/stylesheet.php');
        include('secure.php');  
	?>
        

</head>
<body >
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

 $query = "select p.product_name,p.generic_name,p.packing,s.quantity,s.expiry_date,s.batch_number,s.mrp,s.rate,s.stock_id,p.product_id,st.supplier_id,st.supplier_name from product_tbl p,stock_tbl s,supplier_tbl st where s.supplier_id = st.supplier_id and p.product_id=s.product_id and st.supplier_id=s.supplier_id and p.deleted='0' and st.deleted='0' and s.deleted='0' and s.quantity < '5'";
 $query_res = $link->query($query);
 $c =0;
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
        <a href="index.php" class='fas fa-arrow-alt-circle-left' style='font-size:48px;color:blue'></a>
  <h1 style="color:red;">MEDICINE GOING TO EXHAUSTED</h1>
 	<table  class="table table-hover  table-bordered" id="example1" style="width: 100%;color:black;">
        <thead>
 			<tr class="bg-danger">
                        <th>MEDICINE NAME</th>
                        <th>PACKING</th>
                        <th>GENERIC NAME</th>
                        <th>BATCH ID</th>
                        <th>EXPIRY DATE</th>
 						<th>SUPPLIER</th>
 						<th>QTY</th>
                       
                        <th>PRICE</th>
                        
 					</tr>
 		</thead>	
		 <?php
                if (mysqli_num_rows($query_res) > 0) 
            {
 	 			while($rows = mysqli_fetch_array($query_res))
 	 			{
 						$stock_id = $rows['stock_id'];
 						$product_name = $rows["product_name"];
                        $packing = $rows['packing'];
                        $generic_name = $rows['generic_name'];
                        $batch_id = $rows['batch_number'];
                        $expiry_date = $rows['expiry_date'];
                        $supplier_name = $rows['supplier_name'];
                        $qty = $rows['quantity'];
                        $mrp = $rows['mrp'];
                        $price = $rows['rate'];
                        
                        $c = $c + 1;
                        $_SESSION['count'] = $c;

		 ?>
 			    <tr>
                 <td><?php echo " $product_name"; ?></td>
                 <td><?php echo " $packing"; ?></td>
                 <td><?php echo " $generic_name"; ?></td>
                 <td><?php echo " $batch_id"; ?></td>
                 <td><?php echo " $expiry_date"; ?></td>
                 <td><?php echo " $supplier_name"; ?></td>
                 <td><?php echo "  $qty"; ?></td>
        
                 <td><?php echo " $price"; ?></td>
                 

                 
</button>
 				
			</tr>
            
<?php 
 					}
                }
                else{
                    echo " NO RECORS FOUND";
                }
			
?>
</table>
</div>

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
	 		window.location="delete_stock.php?stock_id="+sid;
	 	}
		
  }
</script>

<script type="text/javascript">

	function myEdit(sid){
		var edit = confirm("ARE YOU SURE TO EDIT DATA");
		if(edit){
			window.location="update_stock.php?stock_id="+sid;
      
     
		}
		
    }
</script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

<script type="text/javascript" >
$(document).ready( function () {
    $('#example1').DataTable();
} );
</script>