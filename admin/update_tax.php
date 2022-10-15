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
  include('dbconnect.php');
		$tax_id = $_GET['tax_id'];
		


	$query = " select * from tax_tbl where tax_id = '$tax_id'";
	$query_res = $link->query($query);
	while($rows = mysqli_fetch_array($query_res))
	//foreach($query_res as $rows)
	{
		$tax_name = $rows['tax_name'];
		$tax_rate = $rows['tax_rate'];
?>
<div style="padding:7%;" >
    <div class="card w-75 ">
    
    <div class="card-body" text-center style="width: 180rem;">
        <h1 class="card-title">UPDATE TAX</h1>
        <form method="POST" action="update_tax_process.php">

  		<div class="card-body">
			<div class="form-group">
            <input type="hidden" name="tax_id" value="<?php echo $rows['tax_id'] ?>">
				<label>ENTER TAX NAME</label>
    				<input type="text" class="form-control"  name="tax_name" value="<?php echo $rows['tax_name'] ?>" style="width:10%" required>
  			</div>
    				<label>ENTER TAX RATE</label>
    				<input type="text" class="form-control" value="<?php echo $rows['tax_rate'] ?>" name="tax_rate" style="width:10%" required><br>
  			
  			
 					 <button type="submit" name="updatetax" class="btn btn-primary">UPDATE TAX </button>
                      <button type="reset"  class="btn btn-danger">RESET</button>

 					 <a href="index.php" class="btn btn-secondary">CANCEL</a>
 					 </div>
		</div>
	</div>
</form></div>
    
</div>
<?php
    }
include('includes/script.php');
?>
</div>
</script>
</body>
 </html>
