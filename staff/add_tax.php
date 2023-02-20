<!DOCTYPE html>
 <html>
 <head>
   <title></title> 
   <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"
/>
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
    <div class="card w-75 " style="border:1px solid blue;color:darkblack">
        <div class="card-body"  style="width: 100%;">
            <h1 class="card-title"><center>ADD TAX</center></h1>
                <form method="POST" action="add_tax_process.php">
			              <div class="form-group">
				                <label>ENTER TAX NAME</label>
    				            <input type="text" class="form-control"  name="tax_name" onkeyup="myVali(this.value)" required>
                                <b id="b1" style="color:red;"></b><br>

                        <label>ENTER TAX RATE</label>
    				<input type="number" class="form-control"  name="tax_rate"  required><br>
 					              <button type="submit" id="submit" name="addtax" class="btn btn-info" disabled>ADD TAX RATE</button>
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

 	<table class="table table-bordered" id="example" style="width: 90%;">
 			<thead  class = "table-dark">
                <tr>
                        <th>TAX ID</th>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

	function myFun(tid){
		//alert(tid);
        $.ajax({
          type:'GET',
          url:'validationAjax/ajax_delete_tax_name_validate.php?tid='+tid,
          success: function(result){
            //alert(result);
            if(result == 1){
                alert("DATA CANNOT BE DELETED");
            }
            else
            {
                var edit = confirm("ARE YOU SURE TO DELETE DATA");
                         if(edit){
                     window.location="delete_tax.php?tax_id="+tid;
                    }
            }
        }})
		
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
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#example').DataTable();
} );
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

function myVali(val1)
{
    var bt = document.getElementById('submit');
  //alert(val1);
  $.ajax({
          type:'GET',
          url:'validationAjax/ajax_tax_name_validate.php?valiRate='+val1,
          success: function(result){
            if(result == 1){
                document.getElementById('b1').innerHTML = "TAX NAME IS ALREADY PRESENT";
                bt.disabled = true;
            }
            else
            {
                bt.disabled = false;
                document.getElementById('b1').innerHTML = " ";
            }
    


             
    }});

}

</script>