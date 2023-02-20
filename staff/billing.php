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
<?php
include('includes/script.php');
?>
</div>
<h1><center>INVOICE</center>     </h1>
<form method="POST" action="bill_process.php">
<div class="form_control" style="padding-left: 20%;padding-top:5%;">
<?php
$order_no = rand(1000000,10000000); 
?>


<b>RECIPT NO:</b><input type="text" name="order_no" class="form_control" value="<?php echo $order_no; ?>">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <?php 
$month = date('m');
$day = date('d');
$year = date('Y');

 $today = $year . '-' . $month . '-' . $day;
?> 
<b>DATE:</b><input type="date" name="date"  id="date" class="form_control" value="<?php echo $today; ?>" disabled>
<?php
date_default_timezone_set("Asia/Kolkata");
$time = date("h:i:sa");
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<b>TIME:</b><input type="text" name="time" class="form_control" value="<?php echo $time; ?>" disabled><br><br>

<b>CUSTOMER NAME </b>
<input type="text" name="customer_name" class="form_control" onchange="dispContact(this.value)" required>

<input type="hidden" name="customer_id" id="customer_id"  class="form_control"  required>

<!--
<select name="user_id" id="customer_id" onchange="dispContact(this.value)">
	<option value="">-CUSTOMER NAME-</option>
    
<!-- <?php
$query = "SELECT * from customer_tbl where deleted='0' and status='0'";
$query_run = $link->query($query);
while($rows = mysqli_fetch_array($query_run))
{
	$customer_name = $rows['customer_name'];
	$user_id = $rows['user_id'];

?>
<option name="user_id" value="<?php echo $user_id; ?>"><?php echo $customer_name; ?></option>

<?php
}
?> -->

	
</select >

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>CONTACT:</b><input type="text" name="" class="form_control"  id="contact"  required>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="add_customer.php" class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >ADD CUSTOMER</a><br><br>
<a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong">CHECK STOCK</a>
<p id ="error"></p>

<?php
include("dbconnect.php");

$query = "select p.product_name,p.generic_name,p.packing,s.quantity,s.expiry_date,s.batch_number,s.mrp,s.rate,s.stock_id,p.product_id,st.supplier_id,st.supplier_name from product_tbl p,stock_tbl s,supplier_tbl st where s.supplier_id = st.supplier_id and p.product_id=s.product_id and st.supplier_id=s.supplier_id and p.deleted='0' and st.deleted='0' and s.deleted='0'";
 $query_res = $link->query($query);
?>




<div class="modal fade bd-example-modal-lg"   id="exampleModalLong" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
      <table class="table " id="example" style="width:100%;">
      <thead class="table-dark    "><tr>
                        <th>MEDICINE NAME</th>
                        <th>PACKING</th>
                        <th>GENERIC NAME</th>
                        <th>EXPIRY DATE</th>
                        <th>QTY</th>
                        <th>PRICE</th>
          </tr>
      </thead>
     <?php
        while($rows = mysqli_fetch_array($query_res))
        {
            $stock_id = $rows['stock_id'];
            $product_name = $rows["product_name"];
                        $packing = $rows['packing'];
                        $generic_name = $rows['generic_name'];
                        $batch_id = $rows['batch_number'];
                        $expiry_date = $rows['expiry_date'];
                        $supplier_name = $rows['supplier_name'];
                        $qty = $rows['quantity'];
                        $price = $rows['rate'];
                    if($qty < 5){
                    
                       ?>
                <tr style="background-color: red;color:white;">
                 <td style="color:black;"><?php echo " $product_name"; ?></td>
                 <td><?php echo " $packing"; ?></td>
                 <td><?php echo " $generic_name"; ?></td>
                 <td><?php echo " $expiry_date"; ?></td>
                 <td><?php echo "  $qty"; ?></td>
                 <td><?php echo " $price"; ?></td>


<?php

                    }
                    else
                    {

     ?>
          <tr style="color:black;background-color: white;">
                 <td ><?php echo " $product_name"; ?></td>
                 <td><?php echo " $packing"; ?></td>
                 <td><?php echo " $generic_name"; ?></td>
                 <td><?php echo " $expiry_date"; ?></td>
                 <td><?php echo "  $qty"; ?></td>
                 <td><?php echo " $price"; ?></td>
                 
</button>

      </tr>
            
<?php 
          }
        }
  ?>
</tr></table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




























<br><br>
<div id="dataTable">
<div class="row" style="width:100%;">
	  <div class="col-sm-2"><b>PRODUCT NAME</b></div>&nbsp;
    <div class="col-sm-2" ><b>GENERIC NAME</b></div>&nbsp;
    <div class="col-sm-2" ><b>BATCH ID</b></div>&nbsp;
    <div class="col-sm-2" ><b>EXPIRY DATE</b></div>&nbsp;
    <div class="col-sm-1" ><b>QTY</b></div>&nbsp;&nbsp;
    <div class="col-sm-1"><b>PRICE</b></div>&nbsp;
    <div class="col-sm-1"><b>TOTAL</b></div>&nbsp;
</div><br>
<div class="row" style="width:100%;">		
		<div class="col-sm-2"> <input type="text" name="product_name[]" class="form_control" size="14"  onblur="proCode(this.value,'1')" required></div>
		<div class="col-sm-2" >	<input type="text" name="generic_name[]" class="form_control"  id="generic_name1"  size="14" required></div>
		<div class="col-sm-2">	<input type="text" name="batch_number[]" class="form_control"  id="batch_number1"  size="5"  min="0" required></div>
		<div class="col-sm-2">	<input type="text" name="expiry_date[]" class="form_control" id="expiry_date1" value="" size="14" required></div>
		<div class="col-sm-1">	<input type="number" name="quantity[]" min ="1"  value="1" id="quantity1" onclick="qtyCost(this.value,'1')"class="form_control" value="" style="width: 5em" required></div>
    <div class="col-sm-1">	<input type="text" name="rate[]" id="rate1" class="form_control" value="" size="5" required></div>
    <div class="col-sm-1">	<input type="text" name="total[]" id="total1" class="form_control" value="" size="5" required></div>
    <div class="col-sm-1">	<input type="hidden" name="slno[]" id="slno" class="form_control" value="1" size="2" required></div>
</div><br>
<div id="addedRows" style="width:98%;"></div>
</div>
	<b style="padding-left: 75%;">GRAND TOTAL:<input type="text" name="grand_total" id="gtotal1" class="form_control" value="" size="9" ></b><br><br>
	<button type="button"   name="rows" class="btn btn-primary" onclick="addRow('dataTable')" style="cursor: pointer;">ADD ROWS</button>
</div>
<center><input type="submit" name="bill" value="bill" class="btn btn-success"><input type="reset" class="btn btn-primary" /></center>
</form>









<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD CUSTOMER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1 class="card-title">ADD CUSTOMER</h1>
        <form method="POST" action="add_customer_process.php" enctype="multipart/form-data">
        <div class="card-body">
      <div class="form-group">
                    <label>ENTER CUSTOMER NAME</label>
                <input type="text"  class="form-control"  name="customer_name" required>
                    <label>ENTER  CUSTOMER CONTACT</label>
                    <input type="text"     class="form-control" id="supplier_contact" name="contact" onblur="contactVali(this.value)" required>
                    <div id="phone" style="color:red;"></div>
                <label>ENTER CUSTOMER GMAIL</label>
                    <input type="text"  class="form-control" id="supplier_email"  name="email" onblur="emailVali(this.value)" required>
                    <div id="email1" style="color:red;"></div><div id="email2" style="color:green;"></div>
                    <label>ENTER CUSTOMER ADDRESS</label>
                    <textarea   class="form-control"name="address" placeholder="ENTER ADDRESS" id="floatingTextarea2" style="height: 100px"></textarea><br>
                    <button type="submit" name="addcustomer" id="submit" class="btn btn-primary" disabled>ADD CUSTOMER</button>
                    <input type="reset" class="btn btn-primary" />&nbsp
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         </div>
             </form>
    </div>
        
      
    </div>
  </div>
</div>
















</body>
 </html>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
 function dispContact(val1)
{
  $.ajax({
   
          type:'GET',
          url:'ajax_contact.php?cust_name='+val1,
          success: function(result){
            var res =result.split(" ");
            document.getElementById("contact").value = res[0];
            document.getElementById("customer_id").value = res[1]; 
    }});

}


</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
	var rowCount = 1;
	function addRow(dataTable1) {
	//alert(dataTable1);
	rowCount ++;
	var recRow= '<div  id="row'+rowCount+'"><div class="row"><div class="col-sm-2"><input type="text" name="product_name[]" class="form_control"  size="14" onblur="proCode(this.value,'+rowCount+')" required></div><div class="col-sm-2"><input type="text" name="generic_name[]" class="form_control"  id="generic_name'+rowCount+'"  size="14" ></div> <div class="col-sm-2"><input type="text" name="batch_number[]" class="form_control"  id="batch_number'+rowCount+'"  size="5" ></div> <div class="col-sm-2"><input type="text" name="expiry_date[]" class="form_control"  id="expiry_date'+rowCount+'"  size="14" ></div> <div class="col-sm-1"> <input type="number"style="width: 5em" name="quantity[]" class="form_control" value="1" id="quantity'+rowCount+'" onclick="qtyCost (this.value,'+rowCount+')" size="5" min="0" ></div> <div class="col-sm-1"><input type="text" name="rate[]" class="form_control" id="rate'+rowCount+'" value="" size="5" required></div><div class="col-sm-1"><input type="text" name="total[]" id="total'+rowCount+'" class="form_control" value="" size="5" ></div><input type="hidden" name="slno[]" id="slno" class="form_control" value='+rowCount+' size="2" ><p><div class="col-sm-1"> <button type="button" class="btn btn-danger" name="name" onclick="removeRow('+rowCount+');">Delete </button></div> </p></div></div><br>';
jQuery('#addedRows').append(recRow);
}
function removeRow(rCount) {

	//alert(rCount);
//jQuery('#rowCount'+removeNum).remove();
document.getElementById("row"+rCount).remove();
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

function proCode(val1,rCount)
{
  //alert(val1);
  $.ajax({
        //alert(val1);
          type:'GET',
          url:'ajax_billing.php?proname='+val1,
          success: function(result){
            //alert(result);
            var res =result.split("~");
            //alert(res[0]);
           document.getElementById("generic_name"+rCount).value = res[0];
           document.getElementById("batch_number"+rCount).value = res[1];
           document.getElementById("expiry_date"+rCount).value = res[2];
           document.getElementById("rate"+rCount).value = res[3];

           var numVal1 = Number(document.getElementById("rate"+rCount).value);
           var numVal2 = Number(document.getElementById("quantity"+rCount).value);
             

           var totalCost = (numVal2)  * (numVal1);
            //alert(totalCost);
             document.getElementById("total"+rCount).value = totalCost;

             var totalCost = document.getElementsByName('total[]');
              var grandTotal = 0;
              for (var i = 0; i < totalCost.length; i++){
                var a = totalCost[i];
                //alert(a.value); 
               var grandTotal = parseInt(grandTotal) + parseInt(a.value);  
			
         }
         //alert(grandTotal);
         document.getElementById("gtotal1").value = Number(grandTotal);
             
    }});

}
function qtyCost(val1,rCount)
{
           var numVal1 = Number(document.getElementById("rate"+rCount).value);
            var numVal2 = Number(document.getElementById("quantity"+rCount).value);
            var totalCost = (numVal2)  * (numVal1);
             document.getElementById("total"+rCount).value = totalCost;
            /* var grandTotal = 0;
             var grandTotal = (grandTotal) + (totalCost);
             document.getElementById("gtotal1").value = grandTotal;*/
             var totalCost = document.getElementsByName('total[]');
			var grandTotal = 0;
			for (var i = 0; i < totalCost.length; i++){
				var a = totalCost[i];
				//alert(a.value); 
			var grandTotal = parseInt(grandTotal) + parseInt(a.value);
			
         }
         //alert(grandTotal);
         document.getElementById("gtotal1").value = Number(grandTotal);
        
}
</script>
<script type="text/javascript">
    function contactVali(val1) {
        //alert(val1);
        var bt = document.getElementById("submit");
        var phoneno = /^\d{10}$/;
        if(val1.match(phoneno))
        {
            //return true;
            var b = "VALID MOBILE NUMBER";
            document.getElementById('phone').innerHTML = b;
            bt.disabled = false;
        }
        else
        {
            var b = "please enter 10 digit phone number";
            document.getElementById('phone').innerHTML = b;
            //return false;
            bt.disabled = true;
        }
    }

    function emailVali(val){
        var bt = document.getElementById('submit');
        var email = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if(val.match(email))
        {
            bt.disabled = false;
            var b = " VALID EMAIL ADRESS";
            document.getElementById('email1').innerHTML = b;
        }
        else
        {
            var b = "PLEASE ENTER VALID EMAIL ADRESS";
            document.getElementById('email1').innerHTML = b;
            //return false;
            bt.disabled = true;
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"
></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script type="text/javascript" >
$(function() {
$("#example").dataTable();
});
</script>