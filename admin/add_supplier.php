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
    <div class="card w-75" style="border:4px solid grey;">
    
    <div class="card-body" text-center style="width: 90%;">
        <h1 class="card-title" style="text-align: center;">ADD SUPPLIER</h1>
        <form method="POST" action="add_supplier_process.php" enctype="multipart/form-data">
        <div class="card-body">
			<div class="form-group">
                    <label>ENTER SUPPLIER NAME</label>
    		        <input type="text" onkeyup="myVali(this.value)" class="form-control"  name="supplier_name" required>
                    <b id="b1" style="color:red;"></b><br>
                    <label>ENTER SUPPLIER CONTACT</label>
                    <input type="text"     class="form-control" id="supplier_contact" name="supplier_contact" onblur="contactVali(this.value)" required>
                    <div id="phone" style="color:red;"></div>
  			        <label>ENTER SUPPLIER GMAIL</label>
                    <input type="text"  class="form-control" id="supplier_email"  name="supplier_email" onblur="emailVali(this.value)" required>
                    <div id="email1" style="color:red;"></div><div id="email2" style="color:green;"></div>
                    <label>ENTER SUPPLIER ADDRESS</label>
                    <textarea   class="form-control"name="supplier_address" placeholder="ENTER ADDRESS" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label>ENTER TAX</label>
                    <input type="text"  class="form-control"  name="tax"  required><br>
                    <button type="submit" name="addsupplier" id="submit" class="btn btn-info" disabled>ADD SUPPLIER</button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <script type="text/javascript">

function myVali(val1)
{
    var bt = document.getElementById('submit');
  //alert(val1);
  $.ajax({
          type:'GET',
          url:'validationAjax/ajax_sup_name_validate.php?valiNam='+val1,
          success: function(result){
            //alert(result);
            if(result == 1){
                document.getElementById('b1').innerHTML = "SUPPLIER NAME IS ALREADY PRESENT";
                bt.disabled = true;
            }
            else
            {
                bt.disabled = false;
                document.getElementById('b1').innerHTML = " ";
            }       
    }});

}
function myVali(val1)
{
    var bt = document.getElementById('submit');
  //alert(val1);
  $.ajax({
          type:'GET',
          url:'validationAjax/ajax_sup_name_validate.php?valiNam='+val1,
          success: function(result){
            //alert(result);
            if(result == 1){
                document.getElementById('b1').innerHTML = "SUPPLIER NAME IS ALREADY PRESENT";
                bt.disabled = true;
            }
            else
            {
                bt.disabled = false;
                document.getElementById('b1').innerHTML = " ";
            }       
    }});

}
</script>
</body>
 </html>
