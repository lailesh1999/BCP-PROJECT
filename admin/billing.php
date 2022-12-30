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
<input type="text" name="customer_name" class="form_control" onchange="dispContact(this.value)">

<input type="text" name="customer_id" id="customer_id"  class="form_control" >

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
-->
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>CONTACT:</b><input type="text" name="" class="form_control"  id="contact" disabled required>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="add_customer.php" class="btn btn-primary">ADD CUSTOMER</a>
<p id ="error"></p>
<br><br>
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
		<div class="col-sm-2">	<input type="text" name="generic_name[]" class="form_control"  id="generic_name1"  size="14"></div>
		<div class="col-sm-2">	<input type="text" name="batch_number[]" class="form_control"  id="batch_number1"  size="5"  min="0"></div>
		<div class="col-sm-2">	<input type="text" name="expiry_date[]" class="form_control" id="expiry_date1" value="" size="14" required></div>
		<div class="col-sm-1">	<input type="number" name="quantity[]" min ="1"  value="1" id="quantity1" onclick="qtyCost(this.value,'1')"class="form_control" value="" style="width: 5em" ></div>
    <div class="col-sm-1">	<input type="text" name="rate[]" id="rate1" class="form_control" value="" size="5" ></div>
    <div class="col-sm-1">	<input type="text" name="total[]" id="total1" class="form_control" value="" size="5" ></div>
    <div class="col-sm-1">	<input type="hidden" name="slno[]" id="slno" class="form_control" value="1" size="2" ></div>
</div><br>
<div id="addedRows" style="width:98%;"></div>
</div>
	<b style="padding-left: 75%;">GRAND TOTAL:<input type="text" name="grand_total" id="gtotal1" class="form_control" value="" size="9" ></b><br><br>
	<button type="button"   name="rows" class="btn btn-primary" onclick="addRow('dataTable')" style="cursor: pointer;">ADD ROWS</button>
</div>
<center><input type="submit" name="bill" value="bill" class="btn btn-success"></center>

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
            alert(res[0]);
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