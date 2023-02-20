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
 $query = " SELECT * from customer_tbl where deleted='0' and status='0' ";
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
	<h1 class="card-title" style="text-align:center;">VIEW CUSTOMER</h1>
 	<table class="table table-hover" id="example" style="width: 95%;">
 			<thead class="table-danger"><tr><th>SUPPLIER ID</th>
 						<th>CUSTOMER NAME</th>
                        <th>CONTACT</th>
                        <th>SEMAIL</th>
                        <th>ADDRESS</th>
 						<th>EDIT</th>
 						<th>DELETE</th>
 					</tr>
 			</thead>

		 <?php
 	 			while($rows = mysqli_fetch_array($query_res))
 	 			{
 				//foreach($query_res as $rows )
 					//{
                        $customer_id = $rows['customer_id'];
                        $customer_name = $rows['customer_name'];
                        $contact = $rows['contact'];
                        $email=$rows['email'];
                        $address=$rows['address'];
		 ?>
 			<tr><td> <?php echo " $customer_id"; ?></td>
				<td> <?php echo "$customer_name "; ?></td>
				<td> <?php echo "$contact "; ?></td>
				<td> <?php echo "$email "; ?></td>
				<td> <?php echo " $address"; ?></td>
 				<td><a  onclick="myEdit(<?php echo "$customer_id"; ?>)" class="btn btn-primary" style="color:white; ">EDIT</a> </td>
 				<td> <a onclick="myFun(<?php echo "$customer_id"; ?>)"  class = "btn btn-danger" style="color:white; ">DELETE</a></td>
			</tr>
	
<?php 
 					}
				




?>
</table>
<a href="add_customer.php" class="btn btn-danger">CANCEL</a></div>



	


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
		$.ajax({
          type:'GET',
          url:'validationAjax/ajax_delete_cust_name_validate.php?cid='+cid,
          success: function(result){
            //alert(result);
            if(result == 1){
                alert("DATA CANNOT BE DELETED");
            }
            else
            {
		                        var edit = confirm("ARE YOU SURE TO DELETE DATA");
				if(edit){
					window.location="delete_customer.php?cid="+cid;
				}
            }
        }})
		
		
    }
</script>
<script type="text/javascript">

	function myEdit(cid){
		var edit = confirm("ARE YOU SURE TO EDIT DATA");
		if(edit){
			window.location="update_customer.php?customer_id="+cid;
		}
		
    }
</script>
  
</body>
</html>

<script type="text/javascript">

    function diss(){
		
			window.location="view_customer.php";
	
		
    }

 </script> 