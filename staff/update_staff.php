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
		$staff_id = $_GET['sid'];
		


	$query = " select * from staff_tbl where staff_id = '$staff_id'";
	$query_res = $link->query($query);
	while($rows = mysqli_fetch_array($query_res))
	{
		$staff_id = $rows['staff_id'];
                        $staff_name = $rows['staff_name'];
                        $staff_contact = $rows['staff_contact'];
                        $staff_email=$rows['staff_email'];
                        $staff_address=$rows['staff_address'];
                        $password=$rows['password'];
?>
<div style="padding:7%;" >
    <div class="card w-75 " style="border:4px solid grey;">
    
    <div class="card-body" text-center style="width:100%;">
        <h1 class="card-title">UPDATE STAFF</h1>
        <form method="POST" action="update_staff_process.php">
  		<div class="card-body">
			<div class="form-group">
            <input type="hidden" name="staff_id" value="<?php echo $rows['staff_id'] ?>">
            <label>ENTER STAFF NAME</label>
    		        <input type="text"  value="<?php echo $rows['staff_name'] ?>" class="form-control"  name="staff_name" required>
                    <label>ENTER STAFF CONTACT</label>
                    <input type="text"    value="<?php echo $rows['staff_contact'] ?>" class="form-control" id="staff_contact" name="staff_contact" onblur="contactVali(this.value)" required>
                    <div id="phone" style="color:red;"></div>
  			        <label>ENTER STAFF GMAIL</label>
                    <input type="text"  value="<?php echo $rows['staff_email'] ?>" class="form-control" id="staff_email"  name="staff_email" onblur="emailVali(this.value)" required>
                    <div id="email1" style="color:red;"></div><div id="email2" style="color:green;"></div>
                    <label>ENTER STAFF ADDRESS</label>
                    <input type="text"  value="<?php echo $rows['staff_address'] ?>" class="form-control"name="staff_address"  id="floatingTextarea2" style="height: 100px"></input>
                    <label>ENTER PASSWORD</label>
                    <input type="text" value="<?php echo $rows['password'] ?>" class="form-control"  name="password"  required><br>
                    <button type="submit" name="updatestaff" id="submit" class="btn btn-info" disabled>UPDATE STAFF</button>
                    <input type="reset" class="btn btn-primary" />&nbsp<a href="view_staff.php" class="btn btn-secondary">CANCEL</a>                                                                                                                        
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
