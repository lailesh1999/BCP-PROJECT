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
<div style="padding:6%;" >
    <div class="card w-75 " style="border:4px solid grey;">
    
    <div class="card-body" text-center style="width: 100%;">
        <h1 class="card-title">ADD UNITS</h1>
        <form method="POST" action="add_unit_process.php" enctype="multipart/form-data">
	
			<div class="form-group">
				<label>ENTER UNIT NAME</label>
    				<input type="text" onkeyup="myVali(this.value)" class="form-control" maxlength="4" id="" name="unit_name"  min="2" max="10" required>
                    <b id="b1" style="color:red;"></b>
  			</div>
 					 <button type="submit" name="addunit" id="submit" class="btn btn-info" disabled>ADD UNIT</button>
           <input type="reset" class="btn btn-primary" />&nbsp<a href="index.php" class="btn btn-secondary">CANCEL</a>
           <br>
        </div>
	</div>	</div>
</form>
    </div>
    </div>
</div>
<?php
include("dbconnect.php");
 $query = " SELECT * from unit_tbl where deleted='0' and status='0' ";
 $query_res = $link->query($query);
 if(isset($_GET['msg']))
 {
    if($_GET['msg']== 1)
    {
        ?>

                            <div class="container" style="padding-left: 9%;">
								
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

                            <div class="container"  style="padding-left: 6%;">
								
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
<div style="padding-left: 20%;">

 	<table class="table table-hover" id="example" style="width: 95%;">
   <thead class="table-success"><tr><th >UNIT ID</th>
 						<th>UNIT NAME</th>
 						<th>EDIT</th>
 						<th>DELETE</th>
 					</tr>
 			</thead>

		 <?php
 	 			while($rows = mysqli_fetch_array($query_res))
 	 			{
 				//foreach($query_res as $rows )
 					//{
 						$unit_id = $rows['unit_id'];
 						$unit_name = $rows["unit_name"];

		 ?>
 			<tr><td> <?php echo " $unit_id"; ?></td>
 				<td><?php echo " $unit_name"; ?></td>
 				<td><a  onclick="myEdit(<?php echo "$unit_id"; ?>)" class="btn btn-primary" style="color:white; ">EDIT</a> </td>
 				<td> <a onclick="myFun(<?php echo "$unit_id"; ?>)"  class = "btn btn-danger" style="color:white; ">DELETE</a></td>
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
 <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script type="text/javascript">

	function myFun(uid){
		$.ajax({
          type:'GET',
          url:'validationAjax/ajax_delete_unit_name_validate.php?uid='+uid,
          success: function(result){
            //alert(result);
            if(result == 1){
                alert("DATA CANNOT BE DELETED");
            }
            else
            {
                var edit = confirm("ARE YOU SURE TO DELETE DATA");
        if(edit){
            window.location="delete_unit.php?unit_id="+uid;
        }
            }
        }})
		
    }
</script>
<script type="text/javascript">

	function myEdit(uid){
		var edit = confirm("ARE YOU SURE TO EDIT DATA");
		if(edit){
			window.location="update_unit.php?unit_id="+uid;
		}
		
    }
</script>
  
</body>
</html>

<script type="text/javascript">

    function diss(){
		
			window.location="add_units.php";
	
		
    }

 </script> 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <script type="text/javascript">

function myVali(val1)
{
    var bt = document.getElementById('submit');
  //alert(val1);
  $.ajax({
          type:'GET',
          url:'validationAjax/ajax_unit_name_validate.php?valiUnit='+val1,
          success: function(result){
           // alert(result);
            if(result == 1){
                document.getElementById('b1').innerHTML = "UNIT NAME IS ALREADY PRESENT";
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