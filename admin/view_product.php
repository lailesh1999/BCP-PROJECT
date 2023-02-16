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
$query = "select  p.product_name,p.generic_name,p.created_date,p.packing,c.category_name,t.tax_name,t.tax_rate,u.unit_name,c.category_id,u.unit_id,t.tax_id,p.product_id,s.supplier_id,s.supplier_name from category_tbl c,unit_tbl u,tax_tbl t,product_tbl p,supplier_tbl s where p.supplier_id = s.supplier_id and p.category_id=c.category_id and p.unit_id=u.unit_id and p.tax_id=t.tax_id and c.deleted='0' and p.deleted='0' and u.deleted='0' and t.deleted='0'";
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
    <h1 class="card-title">VIEW MEDICINE</h1>
 	<table class="table " id="example" style="width: 100%;">
 			<thead class="table-info"><tr>
                        <th>TAX NAME</th>
                        <th>TAX RATE</th>
                        <th>UNIT NAME</th>
                        <th>SUPPLIER NAME</th>
                        <th>MEDICINE TYPE</th>
 						<th>MEDICINE  NAME</th>
 						<th>PACKING</th>
                        <th>GENERIC NAME</th>
                        <th>CREATED DATE</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
 					</tr>
 			</thead>
		 <?php
 	 			while($rows = mysqli_fetch_array($query_res))
 	 			{
 						$product_id = $rows['product_id'];
                        $tax_name = $rows['tax_name'];
                        $tax_rate = $rows['tax_rate'];
                        $unit_name = $rows['unit_name'];
                        $supplier_name = $rows['supplier_name'];
                        $category_name = $rows['category_name'];
 						$product_name = $rows["product_name"];
                        $packing = $rows['packing'];
                        $generic_name = $rows['generic_name'];
                        //$status = $rows['status'];
                        $created_date = $rows['created_date'];
                        // $deleted = $rows['deleted'];
                        // $inserted_by_id = $rows['inserted_by_id'];
                        // $updated_by_id = $rows['updated_by_id'];
                        // $deleted_by_id = $rows['deleted_by_id'];
		 ?>
 			    <tr>
                 <td><?php echo " $tax_name"; ?></td>
                 <td><?php echo " $tax_rate"; ?></td>
                 <td><?php echo " $unit_name"; ?></td>
                 <td><?php echo " $supplier_name"; ?></td>
                 <td><?php echo " $category_name"; ?></td>
                 <td><?php echo " $product_name"; ?></td>
                 <td><?php echo "  $packing"; ?></td>
                 <td><?php echo "  $generic_name"; ?></td>
                 <td><?php echo " $created_date"; ?></td>
                
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
		
                $.ajax({
          type:'GET',
          url:'validationAjax/ajax_delete_pro_name_validate.php?pid='+pid,
          success: function(result){
            //alert(result);
            if(result == 1){
                alert("DATA CANNOT BE DELETED");
            }
            else
                    {
                        var edit = confirm("ARE YOU SURE TO DELETE DATA");
                if(edit){
                    window.location="delete_product.php?product_id="+pid;
                }

            }
        }})
		
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