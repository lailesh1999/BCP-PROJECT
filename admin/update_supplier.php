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
  include('dbconnect.php');
		$supplier_id = $_GET['supplier_id'];
		


	$query = " select * from supplier_tbl where supplier_id = '$supplier_id'";
	$query_res = $link->query($query);
	while($rows = mysqli_fetch_array($query_res))
	{
		$supplier_id = $rows['supplier_id'];
                        $supplier_name = $rows['supplier_name'];
                        $supplier_contact = $rows['supplier_contact'];
                        $supplier_email=$rows['supplier_email'];
                        $supplier_address=$rows['supplier_address'];
                        $tax=$rows['tax'];
?>
<div style="padding:7%;" >
    <div class="card w-75 ">
    
    <div class="card-body" text-center style="width: 180rem;">
        <h1 class="card-title">UPDATE SUPPLIER</h1>
        <form method="POST" action="update_supplier_process.php">
  		<div class="card-body">
			<div class="form-group">
            <input type="hidden" name="supplier_id" value="<?php echo $rows['supplier_id'] ?>">
            <label>ENTER SUPPLIER NAME</label>
    		        <input type="text" style="width:15%;" value="<?php echo $rows['supplier_name'] ?>" class="form-control"  name="supplier_name" required>
                    <label>ENTER SUPPLIER CONTACT</label>
                    <input type="text"   style="width:15%;" value="<?php echo $rows['supplier_contact'] ?>" class="form-control" id="supplier_contact" name="supplier_contact" onblur="contactVali(this.value)" required>
                    <div id="phone" style="color:red;"></div>
  			        <label>ENTER SUPPLIER GMAIL</label>
                    <input type="text" style="width:15%;" value="<?php echo $rows['supplier_email'] ?>" class="form-control" id="supplier_email"  name="supplier_email" onblur="emailVali(this.value)" required>
                    <div id="email1" style="color:red;"></div><div id="email2" style="color:green;"></div>
                    <label>ENTER SUPPLIER ADDRESS</label>
                    <input type="text"  style="width:15%;" value="<?php echo $rows['supplier_address'] ?>" class="form-control"name="supplier_address"  id="floatingTextarea2" style="height: 100px"></input>
                    <label>ENTER TAX</label>
                    <input type="text" value="<?php echo $rows['tax'] ?>" style="width:15%;" class="form-control"  name="tax"  required><br>
                    <button type="submit" name="updatesupplier" id="submit" class="btn btn-primary" disabled>UPDATE SUPPLIER</button>
                    <input type="reset" class="btn btn-primary" />&nbsp<a href="index.php" class="btn btn-secondary">CANCEL</a>                                                                                                                        
                    <br>
 					 </div>
		</div>
	</div>
</form></div>
    
</div>
<?php
    }
include('includes/script.php');
?>
</div>
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
</script></body>
 </html>
