<!DOCTYPE html>
 <html>
 <head>
   <title></title> 
<?php

    include('includes/stylesheet.php');
  
     include("dbconnect.php");
     include('secure.php');
     if(isset($_GET["from_date"]))
	{
		  $from_date = $_GET['from_date'];
	    $to_date = $_GET['to_date'];
	}
	else
	{
		  $from_date = date('Y-m-d');
	    $to_date = date('Y-m-d');
	}
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
<div class="container" style="padding:4%;">
		<div class="row">
			<div class="col-md-10 mx-auto">
				<div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
				  <div class="card-header">
				   	<h4>Generate Report</h4>
				  </div>
				  <div class="card-body">
				  	<form method = "POST" action = "view_return_report_process.php">
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">From date</label>
				  			<div class="col-sm-6">
				  				<input type="date"  name="from_date"  class="form-control form-control-sm" id="fdate" >
				  			</div>
				  		</div>
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">To date</label>
				  			<div class="col-sm-6">
				  				<input type="date"  name="to_date" value="<?php echo $to_date; ?>" class="form-control form-control-sm" id="tdate">
				  			</div>
				  		</div>
	  			<label>SELECT SUPPLIER</label>
        <select name="supplier_id"  id="supplier_id" onchange="dispProduct(this.value)">
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
			    	  
			  		<center>
	                      <input type="submit" name="report"  style="width:150px;" class="btn btn-info" value="Display Report">
	                </center> <br/>
	                 </form> 
	             </div>
	        </div>
	     </div> 
	</div>
</div>

<?php
include('includes/script.php');
?>
</div>

</body>
 </html>
