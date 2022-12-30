<div class="row">
	  <div class="col-sm-2"><b>PRODUCT NAME</b></div>&nbsp;
    <div class="col-sm-2" ><b>GENERIC NAME</b></div>&nbsp;
    <div class="col-sm-1" ><b>BATCH ID</b></div>&nbsp;
    <div class="col-sm-2" ><b>EXPIRY DATE</b></div>&nbsp;
    <div class="col-sm-1" ><b>QTY</b></div>&nbsp;&nbsp;
    <div class="col-sm-1"><b>PRICE</b></div>&nbsp;
    <div class="col-sm-1"><b>TOTAL</b></div>&nbsp;
</div><br>
<div class="row">		
		<div class="col-sm-2"> <input type="text" name="product_name[]" class="form_control" size="14"  onblur="proCode(this.value,'1')" required></div>
		<div class="col-sm-2">	<input type="text" name="generic_name[]" class="form_control"  id="product1"  size="14"></div>
		<div class="col-sm-1">	<input type="text" name="batch_number[]" class="form_control"  id="batch_number"  size="5"  min="0"></div>
		<div class="col-sm-2">	<input type="text" name="expiry_date[]" class="form_control" id="expiry_date" value="" size="14" required></div>
		<div class="col-sm-1">	<input type="number" name="quantity[]" id="quantity" class="form_control" value="" style="width: 5em" ></div>
    <div class="col-sm-1">	<input type="text" name="rate[]" id="rate" class="form_control" value="" size="5" ></div>
    <div class="col-sm-1">	<input type="text" name="total[]" id="total" class="form_control" value="" size="5" ></div>
    <div class="col-sm-1">	<input type="hidden" name="slno[]" id="slno" class="form_control" value="1" size="2" ></div>
</div><br>
</div>