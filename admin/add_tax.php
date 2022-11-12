<!DOCTYPE html>
 <html>
 <head>
   <title></title> 
<?php

    include('includes/stylesheet.php');
  
     include("dbconnect.php");
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
<div style="padding:2%;padding-left:5%;" >
    <div class="card w-75 ">
        <div class="card-body"  style="width: 100%;">
            <h1 class="card-title"><center>ADD TAX</center></h1>
                <form method="POST" action="add_tax_process.php">
			              <div class="form-group">
				                <label>ENTER TAX NAME</label>
    				            <input type="text" class="form-control"  name="tax_name" required>
                        <label>ENTER TAX RATE</label>
    				            <input type="text" class="form-control"  name="tax_rate"  required><br>
 					              <button type="submit" name="addtax" class="btn btn-primary">ADD TAX RATE</button>
                        <button type="reset"  class="btn btn-danger">RESET</button>
 					              <a href="index.php" class="btn btn-secondary">CANCEL</a>
 					          </div>
                </form>
            </div>
	      </div>
    </div>
  </div>  


<?php
include("dbconnect.php");
 $query = " SELECT * from tax_tbl where deleted='0' and status='0' ";
 $query_res = $link->query($query);
 if(isset($_GET['msg']))
 {
    if($_GET['msg']== 1)
    {
        ?>

                            <div class="container" style="padding-left: 5%;">
								
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

                            <div class="container"style="padding-left: 30%;">
								
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
								
                                <div class="alert alert-danger alert-dismissible fade show">
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
 <hr style="border:2px solid ;"></hr><br>
 
<div style="padding-left: 20%;">

 	<table class="table table-dark table-striped" id="example" style="width: 90%;">
 			<thead  class = "table-dark"><tr><th>TAX ID</th>
 						<th>TAX NAME</th>
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
 						$tax_id = $rows['tax_id'];
 						$tax_name = $rows["tax_name"];
            $tax_rate = $rows["tax_rate"];


		 ?>
 			<tr><td> <?php echo " $tax_id"; ?></td>
 				<td><?php echo " $tax_name"; ?></td>
        <td><?php echo " $tax_rate"; ?></td>
 				<td><a  onclick="myEdit(<?php echo "$tax_id"; ?>)" class="btn btn-primary" style="color:white; ">EDIT</a> </td>
 				<td> <a onclick="myFun(<?php echo "$tax_id"; ?>)"  class = "btn btn-danger" style="color:white; ">DELETE</a></td>
			</tr>
	
<?php 
 					}
?>
</table>
        </div>



<?php
include('includes/script.php');
?>
</div>
</script>
</body>
</html>
<script type="text/javascript">

	function myFun(tid){
		var edit = confirm("ARE YOU SURE TO DELETE DATA");
		if(edit){
			window.location="delete_tax.php?tax_id="+tid;
		}
		
    }
</script>
<script type="text/javascript">

	function myEdit(tid){
		var edit = confirm("ARE YOU SURE TO EDIT DATA");
		if(edit){
			window.location="update_tax.php?tax_id="+tid;
		}
		
    }
</script>
<script type="text/javascript">

    function diss(){
		
			window.location="add_tax.php";
	
		
    }

 </script>
 <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example1').DataTable();
} );
</script>