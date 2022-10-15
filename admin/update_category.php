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

    $category_id = $_GET['category_id'];
    $query = "select * from category_tbl where category_id = '$category_id'";
    $query_run = $link->query($query);
    while($rows = mysqli_fetch_array($query_run))
    {
        $category_name = $rows['category_name'];

?>
<div style="padding:7%;">
    <div class="card">
    
    <div class="card-body">
        <h1 class="card-title">UPDATE CATEGORY</h1>
        <form method="POST" action="update_category_process.php" >

        <input type="hidden" name="category_id" value="<?php echo $rows['category_id'] ?>">
			<div class="form-group">
				<label>ENTER CATEGORY NAME</label>
    				<input type="text" class="form-control" style="width:30%;" name="category_name" value="<?php echo $category_name; ?>" size = "10" min="2" max="15" required>
  			</div>
 					 <button type="submit" name="updatecategory" class="btn btn-primary" >UPDATE CATEGORY</button>
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
