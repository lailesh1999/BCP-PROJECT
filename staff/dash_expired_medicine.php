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
    $q = "select * from stock_tbl where date(created_date) = '$date' and status='1' and deleted='0'";
    $r = $link->query($q);
    $c=0;
    while($t = mysqli_fetch_array($r)){
        $c = $c + 1;
    }
   $query = "select p.product_name,p.generic_name,p.packing,s.quantity,s.expiry_date,s.batch_number,s.mrp,s.rate,s.stock_id,s.status,p.product_id,st.supplier_id,st.supplier_name from product_tbl p,stock_tbl s,supplier_tbl st where s.supplier_id = st.supplier_id and p.product_id=s.product_id and st.supplier_id=s.supplier_id and p.deleted='0' and st.deleted='0' and s.deleted='0' and s.expiry_date  < '$date'";
 $query_res = $link->query($query);
 ?>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav" style="padding-left:50%;color:red;">
        
      <a class="nav-item nav-link active" href="view_return_report.php">VIEW RETURN REPORT <span class="sr-only">(current)</span></a><!--
      <a class="nav-item nav-link" href="#">Features</a>
      <a class="nav-item nav-link" href="#">Pricing</a>
      <a class="nav-item nav-link disabled" href="#">Disabled</a>
  -->
      <center><a class="nav-link" href="view_stock_list.php">CART &nbsp<i class="fas fa-file-alt fa-lg  "></i> <span class="badge badge-pill badge-secondary"><?php echo $c;?></span></a>
    </center>        
    </div>
  </div>
</nav>
 	<div style="padding: 5%;">
    <a href="index.php" class='fas fa-arrow-alt-circle-left' style='font-size:48px;color:blue'></a>
  <center><h1 style="color:blue;background-color:blue;color:white">EXPIRED MEDICINE</h1></center>
 	<table  class="table table-hover  table-bordered" id="example" style="width: 100%;color:white;">
        <thead>
 			<tr class="bg-primary">
                        <th>MEDICINE NAME</th>
                        <th>PACKING</th>
                        <th>GENERIC NAME</th>
                        <th>BATCH ID</th>
                        <th>EXPIRY DATE</th>
 						<th>SUPPLIER</th>
 						<th>QTY</th>
                        <th>PRICE</th>
                        <th>RETURN STOCK</th>
                        
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
                        $status = $rows['status'];
                        $c = $c + 1;
                        $_SESSION['count'] = $c;

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
                 <?php
                    if($status == 1){
                ?>
                        <td style="background-color:blue;color:red;"><b>ADDED TO LIST...</b></td>
                <?php
                    }
                    else{
                        ?>
                      <td><a  onclick="myRemove(<?php echo "$stock_id"; ?>)" class="btn btn-sm btn-primary" style="color:white; ">RETURN STOCK</a> </td>
                    <?php
                    }
                 ?>
                 
               
                 

                 
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
		
			window.location="view_stock.php";
	
		
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
			window.location="update_stock.php?stock_id="+sid;
      
     
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