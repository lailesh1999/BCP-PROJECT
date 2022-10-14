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
<div style="padding:7%;" >
    <div class="card w-75 ">
    
    <div class="card-body" text-center style="width: 180rem;">
        <h1 class="card-title">ADD UNITS</h1>
        <form method="POST" action="add_unit_process.php" enctype="multipart/form-data">
	
			<div class="form-group">
				<label>ENTER UNIT NAME</label>
    				<input type="text" class="form-control" maxlength="4" id="" name="unit_name" style="width: 357px;" min="2" max="4" required>
  			</div>
 					 <button type="submit" name="addunit" class="btn btn-primary" >ADD UNIT</button>
           <input type="reset" class="btn btn-primary" />&nbsp<a href="index.php" class="btn btn-secondary">CANCEL</a>
           <br>
        </div>
	</div>	</div>
</form>
    </div>
    </div>
</div>
<?php
include('includes/script.php');
?>
</div>
</script>
</body>
 </html>
