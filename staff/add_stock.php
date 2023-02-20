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
    <div class="card w-75 " style="border:2px solid grey;" >
    
    <div class="card-body" text-center style="width: 100%;">
        <h1 class="card-title">ADD STOCK</h1>
        <form method="POST" action="add_stock_process.php" enctype="multipart/form-data">
        <div class="card-body">
			<div class="form-group">
				
        
        <label>SELECT SUPPLIER</label>
        <select name="supplier_id" class="form-control" id="supplier_id" onchange="dispProduct(this.value)">
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
        <label>SELECT MEDICINE NAME</label>
        <select class="form-control" name="product_id" id="product_id">
            
            </select>

        <br>
                    <label>ENTER BATCH NUMBER:</label>
    				<input type="text" class="form-control" name="batch_number" required>
                    <label>ENTER EXPIRY DATE:</label>
                    <input type="date" class="form-control"  name="expiry_date" required>
                
                    <label>ENTER TOTAL QUANTITY:</label>
    				<input type="number" class="form-control" id=qty name="quantity" required>
                    <label>ENTER INDIVIDUAL PRICE:</label>
    				<input type="number" class="form-control" id="itotal" onkeyup="calTotal(this.value)"  name="purchase_price" required>
                    <label>ENTER MRP:</label>
    				<input type="number" class="form-control" name="mrp" required>
                    <label>ENTER RATE:</label>
    				<input type="number" class="form-control" name="rate" required>
                    <label>ENTER INVOICE NUMBER:</label>
    				<input type="number" class="form-control" name="invoice_number" required>
                    <label>TOTAL PRICE:</label>
    			<input type="number" id="total" class="form-control" name="total_price" required><BR>
    
                    <button type="submit" name="addstock" class="btn btn-info">ADD STOCK</button>
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
  function dispProduct(val1)
  {
    $.ajax({
        type:'GET',
        url:'ajax_display_product.php?supplier_id='+val1,
        success:function(result){
            document.getElementById('product_id').innerHTML=result;
        }
    });
  }

  function calTotal(val1)
{
    var num1 = document.getElementById('itotal').value;
    var num2 = document.getElementById('qty').value;
    var total = num1 * num2;
    //alert(total);
    document.getElementById('total').value = total;
}
</script>
</body>
 </html>
