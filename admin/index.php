 <!DOCTYPE html>
 <html>
 <head>
  
   <title></title>


   
<?php

    include('includes/stylesheet.php');
  
include("dbconnect.php");
//include('security.php');

 session_start();
if(isset($_SESSION['admin_id']))
{
  $admin_id = $_SESSION['admin_id'];
}
else
{
  header("location:../admin_login.php");
}

include("dbconnect.php");

 $query = "select p.product_name,p.generic_name,p.packing,s.quantity,s.expiry_date,s.batch_number,s.mrp,s.rate,s.stock_id,p.product_id,st.supplier_id,st.supplier_name from product_tbl p,stock_tbl s,supplier_tbl st where s.supplier_id = st.supplier_id and p.product_id=s.product_id and st.supplier_id=s.supplier_id and p.deleted='0' and st.deleted='0' and s.deleted='0' and s.quantity < '5'";
 $query_res = $link->query($query);
 $c =0;
 while($rows = mysqli_fetch_array($query_res))
 	 			{             
            $c = $c + 1;
        }

    $date = date('Y-m-d');
   $query1 = "select p.product_name,p.generic_name,p.packing,s.quantity,s.expiry_date,s.batch_number,s.mrp,s.rate,s.stock_id,p.product_id,st.supplier_id,st.supplier_name from product_tbl p,stock_tbl s,supplier_tbl st where s.supplier_id = st.supplier_id and p.product_id=s.product_id and st.supplier_id=s.supplier_id and p.deleted='0' and st.deleted='0' and s.deleted='0' and s.expiry_date  < '$date'";
 $query_res1 = $link->query($query1);
 $c1 =0;
 while($rows = mysqli_fetch_array($query_res1))
 	 			{             
            $c1 = $c1 + 1;
        }
        $query2 = "select  p.product_name,p.generic_name,p.packing,c.category_name,c.category_id,p.product_id from category_tbl c,product_tbl p where   p.category_id=c.category_id and c.deleted='0' and p.deleted='0'";
 $query_res2 = $link->query($query); $query_res = $link->query($query);
 $c2 =0;
 while($rows = mysqli_fetch_array($query_res2))
 	 			{             
            $c2 = $c2 + 1;
        }
        $query3 = "select  * from customer_tbl where deleted ='0'";
 $query_res3 = $link->query($query); $query_res = $link->query($query);
 $c3 =0;
 while($rows = mysqli_fetch_array($query_res3))
 	 			{             
            $c3 = $c3 + 1;
        }
        $query4 = " SELECT * from supplier_tbl where deleted='0' and status='0' ";
 $query_res4 = $link->query($query4);
 $c4=0;
 while($rows = mysqli_fetch_array($query_res4))
 	 			{             
            $c4 = $c4 + 1;
        }
        $query5 = " SELECT i.order_no,c.customer_name,c.contact,i.grand_total from customer_tbl c,invoice_tbl i where i.customer_id = c.customer_id and i.deleted='0' and  c.deleted='0' and c.status='0' ";
 $query_res5 = $link->query($query5);
 $c5=0;
 while($rows = mysqli_fetch_array($query_res5))
 	 			{             
            $c5 = $c5 + 1;
        }
?>    
 </head>
 <body onload = "functionToCall()">
 
 <?php

    include('includes/sidenav.php');
?>
<div class="main-content" id="panel">
  
<?php
  

  include('includes/topnav.php');
  //include('includes/header.php');
  
?>
<div class="header bg-info pb-6">
<div class="row" style="padding:5%;">
          <div class="col-xl-3 col-md-6">
            <a href="dash_exhausted_medicine.php">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3   class="card-title text-uppercase  mb-0" >OUT OF STOCK</> </h3>
                    <p class="mt-3 mb-0 text-sm">
                    <h3><center><?php echo $c ?></center></h3>
                    <span class="text-nowrap"></span>
                  </p>
                    
                    </div>
                    
                    <div class="col-auto">
                      <div class='fas fa-briefcase-medical' style='font-size:48px;color:blue'>
                        
                      </div>
                      
                    </div>
                  </div>
                 
                </div>
              </div>
            </a>
          </div>
<div class="col-xl-3 col-md-6">
            <a href="dash_expired_medicine.php">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h3   class="card-title text-uppercase  mb-0" >EXPIRED</h3>
                    <p class="mt-3 mb-0 text-sm">
                    <h3><center><?php echo $c1 ?></center></h3>
                    <span class="text-nowrap"></span>
                  </p>
                    
                    </div>
                    
                    <div class="col-auto">
                      <div class='fas fa-capsules' style='font-size:48px;color:red'>
                        
                      </div>
                      
                    </div>
                  </div>
                 
                </div>
              </div>
            </a>
          </div>
            <div class="col-xl-3 col-md-6">
            <a href="dash_total_medicine.php">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h4  class="card-title text-uppercase  mb-0" >TOTAL MEDICINE</h4>
                    <p class="mt-3 mb-0 text-sm">
                    <h3><center><?php echo $c2 ?></center></h3>
                    <span class="text-nowrap"></span>
                  </p>
                    
                    </div>
                    
                    <div class="col-auto">
                      <div class='fas fa-pills' style='font-size:48px;color:orange'>
                        
                      </div>
                      
                    </div>
                  </div>
                 
                </div>
              </div>
            </a>
          </div>
           <div class="col-xl-3 col-md-6">
            <a href="dash_total_customer.php">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5  class="card-title text-uppercase  mb-0" ><b>TOTAL CUSTOMERS</b></h5>
                    <p class="mt-3 mb-0 text-sm">
                    <h3><center><?php echo $c3 ?></center></h3>
                    <span class="text-nowrap"></span>
                  </p>
                    
                    </div>
                    
                    <div class="col-auto">
                      <div class='fas fa-id-badge' style='font-size:48px;color:red'>
                        
                      </div>
                      
                    </div>
                  </div>
                 
                </div>
              </div>
            </a>
          </div>
             <div class="col-xl-3 col-md-6">
            <a href="dash_total_supplier.php">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h4  class="card-title text-uppercase  mb-0" >TOTAL SUPPLIER</h4>
                    <p class="mt-3 mb-0 text-sm">
                    <h3><center><?php echo $c4 ?></center></h3>
                    <span class="text-nowrap"></span>
                  </p>
                    
                    </div>
                    
                    <div class="col-auto">
                      <div class='fas fa-truck' style='font-size:48px;color:MidnightBlue'>
                        
                      </div>
                      
                    </div>
                  </div>
                 
                </div>
              </div>
            </a>
          </div>
            <div class="col-xl-3 col-md-6">
            <a href="dash_total_invoice.php">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h4  class="card-title text-uppercase  mb-0" >TOTAL INVOICE</h4>
                    <p class="mt-3 mb-0 text-sm">
                    <h3><center><?php echo $c5 ?></center></h3>
                    <span class="text-nowrap"></span>
                  </p>
                    
                    </div>
                    
                    <div class="col-auto">
                      <div class='fas fa-money-check-alt' style='font-size:48px;color:DarkRed'>
                        
                      </div>
                      
                    </div>
                  </div>
                 
                </div>
              </div>
            </a>
          </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
</div>

<?php
include('includes/script.php');
?>

</script>
</body>
 </html>
<script type="text/javascript">
      
      function functionToCall() {
         window.location.refresh("admin/dash_exhausted_medicine.php");
        window.location.reload(false);
        
      }
      
   </script>