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

    $unit_id = $_GET['unit_id'];
    $query = "select * from unit_tbl where unit_id = '$unit_id'";
    $query_run = $link->query($query);
    while($rows = mysqli_fetch_array($query_run))
    {
        $unit_name = $rows['unit_name'];

?>
<div style="padding:7%;">
    <div class="card w-75" style="border:4px solid grey;">
    
    <div class="card-body">
        <h1 class="card-title">ADD UNITS</h1>
        <form method="POST" action="update_unit_process.php" enctype="multipart/form-data">

        <input type="hidden" name="unit_id" value="<?php echo $rows['unit_id'] ?>">
			<div class="form-group">
				<label>ENTER UNIT NAME</label>
    				<input type="text" class="form-control" id="" name="unit_name" value="<?php echo $unit_name; ?>" size = "10" min="2" max="4" required>
  			</div>
 					 <button type="submit" name="updateunit" class="btn btn-success" >UPDATE UNIT</button>
           <input type="reset" class="btn btn-primary" />&nbsp<a href="view_unit.php" class="btn btn-secondary">CANCEL</a>
           <br>
        </div>
	</div>	</div>
</form>
    </div>
    </div>
</div>
<?php
    }
include('includes/script.php');
?>
</div>
</script>
</body>
 </html>
