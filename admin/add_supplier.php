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
<div style="padding:7%;" >
    <div class="card w-75 ">
    
    <div class="card-body" text-center style="width: 180rem;">
        <h1 class="card-title">ADD SUPPLIER</h1>
        <form method="POST" action="add_supplier_process.php" enctype="multipart/form-data">
        <div class="card-body">
			<div class="form-group">
                    <label>ENTER SUPPLIER NAME</label>
    		        <input type="text" style="width:15%;" class="form-control"  name="supplier_name" required>
                    <label>ENTER SUPPLIER CONTACT</label>
                    <input type="text"   style="width:15%;"  class="form-control" id="supplier_contact" name="supplier_contact" onblur="contactVali(this.value)" required>
                    <div id="phone" style="color:red;"></div>
  			        <label>ENTER SUPPLIER GMAIL</label>
                    <input type="text" style="width:15%;" class="form-control" id="supplier_email"  name="supplier_email" onblur="emailVali(this.value)" required>
                    <div id="email1" style="color:red;"></div><div id="email2" style="color:green;"></div>
                    <label>ENTER SUPPLIER ADDRESS</label>
                    <textarea  style="width:15%;" class="form-control"name="supplier_address" placeholder="ENTER ADDRESS" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label>ENTER TAX</label>
                    <input type="text" style="width:15%;" class="form-control"  name="tax"  required><br>
                    <button type="submit" name="addsupplier" id="submit" class="btn btn-primary" disabled>ADD SUPPLIER</button>
                    <input type="reset" class="btn btn-primary" />&nbsp<a href="index.php" class="btn btn-secondary">CANCEL</a>                                                                                                                        
                    <br>
  			</div>

 					 
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
</body>
 </html>
