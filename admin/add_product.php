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
    
    <div class="card-body" text-center style="width: 100%;">
        <h1 class="card-title">ADD PRODUCT</h1>
        <form method="POST" action="add_product_process.php" enctype="multipart/form-data">
        <div class="card-body">
			<div class="form-group">
				
    				
                <label>SELECT UNIT</label>
        <select name="unit_id" class="custom-select" id="unit_id">
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
        <select name="tax_id" class="custom-select" onchange="dispTaxRate(this.value)">
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
        <select name="tax_id" class="custom-select" id="tax_id">
?>
        </select><br>
 <label>SELECT CATEGORY</label>
        <select name="category_id" class="custom-select">
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
        <label>SELECT SUPPLIER</label>
        <select name="supplier_id" class="custom-select">
        <option value="" >-SELECT SUPPLIER-</option>
<?php
            $query = "select * from supplier_tbl where status ='0' and deleted = '0' ";
            $query_result = $link->query($query);
            while($rows = mysqli_fetch_array($query_result))
            {
              $supplier_id = $rows['supplier_id'];
              $supplier_name =  $rows['supplier_name'];
              ?>
              <option value="<?php echo $supplier_id; ?> " ><?php echo $supplier_name; ?> </option>

           
            <?php
            }
?>
        </select><br>
                    <label>ENTER PRODUCT NAME:</label>
    				<input type="text" class="form-control"  name="product_name" required>
                    <label>ENTER PACKING:</label>
    				<input type="text" class="form-control" name="packing" required>
                    <label>ENTER GENERIC NAME:</label>
    				<input type="text" class="form-control"  name="generic_name" required>
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
