<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">


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
   
$query = "select  p.product_name,p.generic_name,p.packing,c.category_name,c.category_id,p.product_id from category_tbl c,product_tbl p where   p.category_id=c.category_id and c.deleted='0' and p.deleted='0'";
 $query_res = $link->query($query); $query_res = $link->query($query);
 $c =0;
 ?>
 
 	<div style="padding: 5%;">
    <a href="index.php" class='fas fa-arrow-alt-circle-left' style='font-size:48px;color:orange'></a>
  <center><h1 style="color:blue;background-color:orange;color:white"><marquee>TOTAL  MEDICINE</marquee></h1></center>
 	<table  class="table-hover  table-bordered" id="exampl" style="width: 100%;color:white;">
 			<tr class="bg-orange">
				<TH>	SL NO</TH>
                        <th>MEDICINE NAME</th>
                        <th>PACKING</th>
                        <th>GENERIC NAME</th>
                        <th>MEDICINE TYPE</th>
                      
                        
 					</tr>
 			
		 <?php
                if (mysqli_num_rows($query_res) > 0) 
            {
				$c = 0;
 	 			while($rows = mysqli_fetch_array($query_res))
 	 			{
 						
 						$product_name = $rows["product_name"];
                        $packing = $rows['packing'];
                        $generic_name = $rows['generic_name'];
                        $medicine_type = $rows['category_name'];
						$c = $c + 1;
                        
                        
		 ?>
 			    <tr style="color:black;">
				<td><?php echo " $c	"; ?></td>
                 
				<td><?php echo " $product_name"; ?></td>
                 <td><?php echo " $packing"; ?></td>
                 <td><?php echo " $generic_name"; ?></td>
                 <td><?php echo " $medicine_type"; ?></td>
                 
                 

                 
</button>
 				
			</tr>
            
<?php 
 					}
                }
                else{
                    echo " NO RECORDS FOUND";
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
    $('#exampl').DataTable();
} );
</script>
</script>



  
</body>
</html>

