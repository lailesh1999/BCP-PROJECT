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
        <h1 class="card-title">ADD CATEGORY</h1>
        <form method="POST" action="add_tax_process.php">

  		<div class="card-body">
			<div class="form-group">
				<label>ENTER TAX NAME</label>
    				<input type="text" class="form-control"  name="tax_name"  style="width:10%" required>
  			</div>
    				<label>ENTER TAX RATE</label>
    				<input type="text" class="form-control"  name="tax_rate" style="width:10%" required><br>
  			
  			
 					 <button type="submit" name="addtax" class="btn btn-primary">ADD TAX RATE</button>
                      <button type="reset"  class="btn btn-danger">RESET</button>

 					 <a href="index.php" class="btn btn-secondary">CANCEL</a>
 					 </div>
		</div>
</center>	</div>
</form></div>
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
