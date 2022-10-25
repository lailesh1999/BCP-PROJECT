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
    include('dbconnect.php');
?>
<div class="main-content" id="panel">


<?php
  
  include('includes/topnav.php');
  //include('includes/header.php');
?>
<div style="padding:7%;" >
    <div class="card w-75 ">
    
    <div class="card-body" text-center style="width: 180rem;">
        <h1 class="card-title">ADD PRODUCT</h1>
        <form method="POST" action="add_product_process.php" enctype="multipart/form-data">
        <div class="card-body">
			<div class="form-group">
				<label>ENTER CATEGORY NAME</label>
    				
                <label>SELECT UNIT</label>
        <select name="unit_id" id="unit_id">
            <option value="">-SELECT UNIT-</option>
<?php
            
            $query = "select * from unit_tbl where status ='0' and deleted = '0' ";
            $query_result = $link->query($query);
            while($rows = mysqli_fetch_array($query_result))
            {
              $unit_id = $rows['unit_id'];
              $unit_name =  $rows['unit_name'];
              ?>
              <option value="<?php echo $unit_id; ?> "> <?php echo $unit_name; ?> </option>
           
               <?php
            }
            
?>
        </select><br>
        <label>SELECT TAX NAME</label>
        <select name="tax_id"  onchange="dispTaxRate(this.value)">
        <option value="">-SELECT TAX NAME-</option>
<?php
            $query = "select * from tax_tbl where status ='0' and deleted = '0' ";
            $query_result = $link->query($query);
            while($rows = mysqli_fetch_array($query_result))
            {
              $tax_id = $rows['tax_id'];
              $tax_name =  $rows['tax_name'];
              $tax_rate = $rows['tax_rate'];
              ?>
              <option value="<?php echo $tax_id; ?> "> <?php echo $tax_name; ?> </option>

           
            <?php
            }
?>
        </select><br>
         <label>SELECT TAX RATE</label>
        <select name="tax_id" id="tax_id">

?>
        </select><br>
 <label>SELECT CATEGORY</label>
        <select name="category_id">
        <option value="" >-SELECT CATEGORY-</option>
<?php
            $query = "select * from category_tbl where status ='0' and deleted = '0' ";
            $query_result = $link->query($query);
            while($rows = mysqli_fetch_array($query_result))
            {
              $category_id = $rows['category_id'];
              $category_name =  $rows['category_name'];
              ?>
              <option value="<?php echo $category_id; ?> "> <?php echo $category_name; ?> </option>

           
            <?php
            }
?>
        </select><br>
        <label>ENTER PRODUCT NAME:</label>
    				<input type="text" class="form-control" style="width:15%;" name="product_name" required>
                    <label>ENTER PACKING:</label>
    				<input type="text" class="form-control" style="width:15%;" name="packing" required>
                    <label>ENTER GENERIC NAME:</label>
    				<input type="text" class="form-control" style="width:15%;" name="generic_name" required>
                    <label>ENTER EXPIRY DATE:</label>
    				<input type="date" class="form-control" style="width:15%;" name="expiry_date" required>
                    <label>ENTER QUANTITY:</label>
    				<input type="number" class="form-control" style="width:15%;" name="quantity" required>
                    <label>ENTER MRP:</label>
    				<input type="number" class="form-control" style="width:15%;" name="mrp" required>
                    <label>ENTER RATE:</label>
    				<input type="number" class="form-control" style="width:15%;" name="rate" required>
                    <label>ENTER PRODUCT DESCRIPTION:</label>
    				<input type="text" class="form-control" style="width:15%;" name="product_description" required>
                    <label>ENTER PRODUCT CODE:</label>
    				<input type="number" class="form-control" style="width:15%;" name="product_code" required><br>
                    
 					 <button type="submit" name="addproduct" class="btn btn-primary">ADD PRODUCT</button>
           <input type="reset" class="btn btn-primary" />&nbsp<a href="index.php" class="btn btn-secondary">CANCEL</a>
           <br>
           </div>
        
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  function dispTaxRate(val1)
  {
    $.ajax({
        type:'GET',
        url:'ajax_tax_rate.php?tax_id='+val1,
        success:function(result){
            document.getElementById('tax_id').innerHTML=result;
        }
    });
  }
</script>
</body>
 </html>