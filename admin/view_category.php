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
 $query = " SELECT * from category_tbl where deleted='0' and status='0' ";
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
 	<div style="padding: 2%;">
 	<table class="table table-bordered" id="example" style="width: 40%;">
 			<thead><tr><th>CATEGORY ID</th>
 						<th>CATEGORY NAME</th>
 						<th>EDIT</th>
 						<th>DELETE</th>
 					</tr>
 			</thead>

		 <?php
 	 			while($rows = mysqli_fetch_array($query_res))
 	 			{
 				//foreach($query_res as $rows )
 					//{
 						$category_id = $rows['category_id'];
 						$category_name = $rows["category_name"];

		 ?>
 			<tr><td> <?php echo " $category_id"; ?></td>
 				<td><?php echo " $category_name"; ?></td>
 				<td><a  onclick="myEdit(<?php echo "$category_id"; ?>)" class="btn btn-primary" style="color:white; ">EDIT</a> </td>
 				<td> <a onclick="myFun(<?php echo "$category_id"; ?>)"  class = "btn btn-danger" style="color:white; ">delete</a></td>
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

	function myFun(cid){
		var edit = confirm("ARE YOU SURE TO DELETE DATA");
		if(edit){
			window.location="delete_category.php?category_id="+cid;
		}
		
    }
</script>
<script type="text/javascript">

	function myEdit(cid){
		var edit = confirm("ARE YOU SURE TO EDIT DATA");
		if(edit){
			window.location="update_category.php?category_id="+cid;
		}
		
    }
</script>
  
</body>
</html>

<script type="text/javascript">

    function diss(){
		
			window.location="view_category.php";
	
		
    }

 </script> 