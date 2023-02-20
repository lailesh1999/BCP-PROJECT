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
		$customer_id = $_GET['customer_id'];
		


	$query = " select * from customer_tbl where customer_id = '$customer_id'";

	$query_res = $link->query($query);
	while($rows = mysqli_fetch_array($query_res))
	{
		$customer_id = $rows['customer_id'];
                        $customer_name = $rows['customer_name'];
                        $contact = $rows['contact'];
                        $email=$rows['email'];
                        $address=$rows['address'];
?>
<div style="padding:7%;" >
    <div class="card w-75 " style="border:4px solid grey;">
    
    <div class="card-body" text-center style="width:100%;">
        <h1 class="card-title">UPDATE CUSTOMER</h1>
        <form method="POST" action="update_customer_process.php">
  		<div class="card-body">
			<div class="form-group">
            <input type="hidden" name="customer_id" value="<?php echo $rows['customer_id'] ?>">
            <label>ENTER  CUSTOMER NAME</label>
    		        <input type="text"  value="<?php echo $rows['customer_name'] ?>" class="form-control"  name="customer_name" required>
                    <label>ENTER  CONTACT</label>
                    <input type="text"    value="<?php echo $rows['contact'] ?>" class="form-control" id="contact" name="contact" onblur="contactVali(this.value)" required>
                    <div id="phone" style="color:red;"></div>
  			        <label>ENTER S GMAIL</label>
                    <input type="text"  value="<?php echo $rows['email'] ?>" class="form-control" id="email"  name="email" onblur="emailVali(this.value)" required>
                    <div id="email1" style="color:red;"></div><div id="email2" style="color:green;"></div>
                    <label>ENTER SUPPLIER ADDRESS</label>
                    <input type="text"  value="<?php echo $rows['address'] ?>" class="form-control"name="address" id="floatingTextarea2" style="height: 100px"></input>
                    
                    <button type="submit" name="updatecustomer" id="submit" class="btn btn-info" disabled>UPDATE CUSTOMER</button>
                    <input type="reset" class="btn btn-primary" />&nbsp<a href="add_supplier.php" class="btn btn-secondary">CANCEL</a>                                                                                                                        
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
