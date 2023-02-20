<!DOCTYPE html>
<html>
<head>
	<title></title>
    
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
    $date = date('Y-m-d');
    $query = "select p.product_name,p.generic_name,p.packing,s.quantity,s.expiry_date,s.batch_number,s.mrp,s.rate,s.stock_id,rt.return_id,rt.status,rt.deleted,p.product_id,st.supplier_id,st.supplier_name from product_tbl p,stock_tbl s,supplier_tbl st ,return_stock_tbl rt where rt.supplier_id = st.supplier_id and p.product_id=rt.product_id and rt.stock_id=s.stock_id and p.deleted='0' and st.deleted='0' and s.deleted='0' and rt.deleted ='0' and rt.status='0'";
 $query_res = $link->query($query);
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
 ?>
 
 	<div style="padding: 5%;">
    <a href="dash_expired_medicine.php" class='fas fa-arrow-alt-circle-left' style='font-size:48px;color:blue'></a>
  <center><h1 style="color:blue;background-color:blue;color:white">RETURNED EXPIRED MEDICINE LIST</h1></center>
 	<table  class="table table-hover  table-bordered" id="example" style="width: 100%;color:white;">
 			<tr class="bg-primary">
                        <th>MEDICINE NAME</th>
                        <th>PACKING</th>
                        <th>GENERIC NAME</th>
                        <th>BATCH ID</th>
                        <th>EXPIRY DATE</th>
 						<th>SUPPLIER</th>
 						<th>QTY</th>
                        <th>PRICE</th>
                        <th>DELETE</th>
                        
 					</tr>
 			
		 <?php
                if (mysqli_num_rows($query_res) > 0) 
            {
 	 			while($rows = mysqli_fetch_array($query_res))
 	 			{
 						$return_stock_id = $rows['return_id'];
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
                        $status = $rows['status'];

		 ?>
 			    <tr style="color:black;">
                 <td><?php echo " $product_name"; ?></td>
                 <td><?php echo " $packing"; ?></td>
                 <td><?php echo " $generic_name"; ?></td>
                 <td><?php echo " $batch_id"; ?></td>
                 <td><?php echo " $expiry_date"; ?></td>
                 <td><?php echo " $supplier_name"; ?></td>
                 <td><?php echo "  $qty"; ?></td>   
                 <td><?php echo " $price"; ?></td>
                 
                <td> <a onclick="myDelete(<?php echo "$stock_id"; ?>)"  class = "btn btn-sm btn-danger" style="color:white; ">DELETE STOCK</a></td>
                 

                 
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
<center><a href="print_stock.php"  class = "btn btn-lg btn-info" style="color:black; ">PRINT</a></center>
<b id="error"></b>
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
		
			window.location="view_stock_list.php";
	
		
    }

 </script> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

 function myRemove(sid){
		var edit = confirm("ARE YOU SURE TO REMOVE FROM STOCK");
	 	if(edit){
	 	
          $.ajax({
          type:'GET',
          url:'validationAjax/ajax_stock_remove_validate.php?sid='+sid,
          success: function(result){
            window.location.reload();
            //alert(result);
            //document.getElementById('error').innerHTML = result;
            //alert(result);
            // if(result == 1){
            //     document.getElementById('b1').innerHTML = "SUPPLIER NAME IS ALREADY PRESENT";
            //     bt.disabled = true;
            // }
            // else
            // {
            //     bt.disabled = false;
            //     document.getElementById('b1').innerHTML = " ";
            // }       
    }});
		
  }
}
</script>

<script type="text/javascript">

	function myDelete(sid){
		var edit = confirm("ARE YOU SURE TO EDIT DATA");
		if(edit){
			window.location="update_stock_list.php?stock_id="+sid;
      
     
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