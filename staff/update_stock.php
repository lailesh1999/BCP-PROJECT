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
    $stock_id = $_GET['stock_id'];
      $query = " SELECT * from stock_tbl   where stock_id = '$stock_id'";
  $query_res = $link->query($query);
  while($rows = mysqli_fetch_array($query_res))
  
  {
                      
                      $stock_id = $rows['stock_id'];
                      $supplier_id=$rows['supplier_id'];
                      $product_id=$rows['product_id'];
                      $quantity=$rows['quantity'];
                      $batch_number = $rows['batch_number'];
 					  $expiry_date = $rows["expiry_date"];
                      $mrp = $rows['mrp'];
                      $rate = $rows['rate'];
                       


?>
<div style="padding:7%;">
    <div class="card w-75" style="border:2px solid grey;">
    
    <div class="card-body">
        <h1 class="card-title">UPDATE STOCK</h1>
        <form method="POST" action="update_stock_process.php" >
        <input type="hidden" name="stock_id" value="<?php echo $stock_id ?>">
			<div class="form-group">
            <label>SELECT SUPPLIER</label>
        <select class="form-control" name="supplier_id" id="supplier_id" onchange="dispProduct(this.value)">
<?php
            $query = "select * from supplier_tbl where status ='0' and deleted = '0' ";
            $query_result = $link->query($query);
            while($rows = mysqli_fetch_array($query_result))
            {
              $sup_id = $rows['supplier_id'];
              $supplier_name =  $rows['supplier_name'];
              ?>
              <option value="<?php echo $sup_id; ?> " <?php if($supplier_id == $sup_id){ echo "selected" ; }?>> <?php echo $supplier_name; ?> </option>
           
            <?php
            }
?>
        </select><br>
						<label>SELECT MEDICINE NAME</label>
        <select class="form-control" name="product_id" id="product_id">
            
            </select><br>
    				<label>ENTER BATCH NUMBER:</label>
    				<input type="text" value ="<?php echo $batch_number; ?>"class="form-control" name="batch_number" required>
                    <label>ENTER EXPIRY DATE:</label>
                    <input type="date" value ="<?php echo $expiry_date; ?>" class="form-control"  name="expiry_date" required>
                
                    <label>ENTER  QUANTITY:</label>
    				<input type="number" value ="<?php echo $quantity; ?>" class="form-control" id=qty name="quantity" required>
                    
                    <label>ENTER MRP:</label>
    				<input type="number" value ="<?php echo $mrp; ?>"class="form-control" name="mrp" required>
                    <label>ENTER RATE:</label>
    				<input type="number" value ="<?php echo $rate; ?>" class="form-control"  name="rate" required>
                    <br>
    
  	
 					 <button type="submit" name="updatestock" class="btn btn-info">UPDATE STOCK</button>
                     <button type="reset" class="btn btn-danger">RESET</button>
 					 <a href="view_product.php" class="btn btn-secondary">CANCLE</a>
			</div>
		</form>

<?php
}
include('includes/script.php');
?>


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





</script>
</body>
 </html>
