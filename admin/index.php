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
 $query_res3 = $link->query($query3); 
 //$query_res = $link->query($query);
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
$date = date('Y-m-d');
$query6 = "SELECT * from invoice_tbl where date(created_date) = '$date' and deleted = '0'";
$query_res6 = $link->query($query6);
$grand =0;
 while($row = mysqli_fetch_array($query_res6))
 {
  $grand_total = $row['grand_total'];
 	$customer_id = $row['customer_id'];
    $invoice_id = $row['invoice_id'];
 	    $query1 = "SELECT * from customer_tbl  where customer_id='$customer_id'";
 		$query_result1 = $link->query($query1);
 		while($r = mysqli_fetch_array($query_result1))
 		{
 			$customer_name =$r['customer_name'];	
 		}
         $query_invoice = " SELECT i.order_no,i.invoice_id,i.created_date,p.product_name,id.quantity,id.price,i.invoice_id,id.invoice_detail_id from invoice_tbl i,product_tbl p,invoice_detail_tbl id where id.product_id = p.product_id and id.invoice_id = i.invoice_id and i.invoice_id = '$invoice_id'";
	    $query_invoice_result = $link->query($query_invoice);
	    $total_quantity = 0;
       
        while($r =mysqli_fetch_array($query_invoice_result))
	{
		//$grand_total = $r['grand_total'];
		$order_no = $row['order_no'];
        $product_name = $r['product_name'];
		$quantity=$r['quantity'];
		$price=$r['price'];
        $date = $row['created_date'];
		$totalq = $quantity * $price;
		$total_quantity = $total_quantity + $quantity;
        $grand = $grand + $totalq;
 }
}
$date = date('Y-m-d');
    $query7 = "SELECT s.supplier_name,p.product_name,pc.quantity,pc.purchase_price,pc.invoice_number,pc.total_price from purchase_tbl pc,supplier_tbl s,product_tbl p where date(pc.created_date) >= '$date'  and pc.deleted = '0' and pc.product_id = p.product_id and pc.supplier_id = s.supplier_id";
 $query_res7 = $link->query($query7);

  $grand_total=0;
  while($row = mysqli_fetch_array($query_res7))
 { 

    $total_price = $row['total_price'];
	$grand_total = $grand_total + $total_price;
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
  <div class="row" style="padding:3%;">
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
            <a href="dash_todays_sale.php">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h4  class="card-title text-uppercase  mb-0" >TODAYS SALES</h4>
                    <p class="mt-3 mb-0 text-sm">
                    <h5><center><b><b>TOTAL SALES:&nbsp&nbsp<?php echo $grand ?>  </b></b></center></h5>
                    <span class="text-nowrap"></span>
                  </p>
                    
                    </div>
                    
                    <div class="col-auto">
                      <div class='fas fa-money-bill' style='font-size:48px;color:blue'>
                        
                      </div>
                      
                    </div>
                  </div>
                 
                </div>
              </div>
            </a>
          </div>
          
                    
            <div class="col-xl-3 col-md-6">
            <a href="dash_total_purchase.php">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5  class="card-title text-uppercase  mb-0" >TODAYS PURCHASE</h5>
                    <p class="mt-3 mb-0 text-sm">
                    <h3><center<b><b>TOTAL:<?php echo $grand_total?>  </b></b></center></h3>
                    <span class="text-nowrap"></span>
                  </p>
                    
                    </div>
                    
                    <div class="col-auto">
                      <div class='fas fa-coins' style='font-size:48px;color:BLACK'>
                        
                      </div>
                      
                    </div>
                  </div>
                 
                </div>
              </div>
            </a>
           </div>
          <div class="col-xl-3 col-md-6">
            <a href="billing.php">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      
                        <div class="col-auto">
                           <div class='fas fa-fax' style='font-size:60px;color:DarkRed;padding-left:35%;'>
                        </div>
                  
                      <p class="mt-3 mb-0 text-sm">
                          <h3><center><i style='color:blue;'>CREATE NEW INVOICE</i></center></h3>
                          <span class="text-nowrap"></span>
                      </p>
                    </div> 
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
            <div class="col-xl-3 col-md-6">
            <a href="add_product.php">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      
                        <div class="col-auto">
                           <div class='fas fa-file-medical' style='font-size:60px;color:red;padding-left:35%;'>
                        </div>
                  
                      <p class="mt-3 mb-0 text-sm">
                          <h3><center><i style='color:blue;'>ADD NEW MEDICINE</i></center></h3>
                          <span class="text-nowrap"></span>
                      </p>
                    </div> 
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
            <div class="col-xl-3 col-md-6">
            <a href="add_stock.php">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      
                        <div class="col-auto">
                           <div class='fas fa-boxes' style='font-size:60px;color:Orange;padding-left:35%;'>
                        </div>
                  
                      <p class="mt-3 mb-0 text-sm">
                          <h3><center><i style='color:blue;'>ADD NEW STOCK</i></center></h3>
                          <span class="text-nowrap"></span>
                      </p>
                    </div> 
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-xl-3 col-md-6">
            <a href="add_supplier.php">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      
                        <div class="col-auto">
                           <div class='fas fa-ambulance' style='font-size:60px;color:Indigo;padding-left:35%;'>
                        </div>
                  
                      <p class="mt-3 mb-0 text-sm">
                          <h3><center><i style='color:blue;'>ADD NEW SUPPLIER</i></center></h3>
                          <span class="text-nowrap"></span>
                      </p>
                    </div> 
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
                    <div class="col-xl-3 col-md-6">
            <a href="view_billing_report.php">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      
                        <div class="col-auto">
                           <div class='fas fa-clipboard-list' style='font-size:60px;color:DarkViolet;padding-left:35%;'>
                        </div>
                  
                      <p class="mt-3 mb-0 text-sm">
                          <h3><center><i style='color:blue;'>VIEW INVOICESES</i></center></h3>
                          <span class="text-nowrap"></span>
                      </p>
                    </div> 
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
                    <div class="col-xl-3 col-md-6">
            <a href="view_sales_report.php">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      
                        <div class="col-auto">
                           <div class='fas fa-chalkboard-teacher' style='font-size:60px;color:FireBrick;padding-left:35%;'>
                        </div>
                  
                      <p class="mt-3 mb-0 text-sm">
                          <h3><center><i style='color:blue;'>SALES REPORT</i></center></h3>
                          <span class="text-nowrap"></span>
                      </p>
                    </div> 
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
                    <div class="col-xl-3 col-md-6">
            <a href="view_supplier_report.php">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      
                        <div class="col-auto">
                           <div class='fas fa-file-alt' style='font-size:60px;color:Indigo;padding-left:35%;'>
                        </div>
                  
                      <p class="mt-3 mb-0 text-sm">
                          <h3><center><i style='color:blue;'>PURCHASE REPORT</i></center></h3>
                          <span class="text-nowrap"></span>
                      </p>
                    </div> 
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
                    <div class="col-xl-3 col-md-6">
            <a href="add_customer.php">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      
                        <div class="col-auto">
                           <div class='fas fa-handshake' style='font-size:60px;color:MediumBlue;padding-left:35%;'>
                        </div>
                  
                      <p class="mt-3 mb-0 text-sm">
                          <h3><center><i style='color:blue;'>ADD NEW CUSTOMER</i></center></h3>
                          <span class="text-nowrap"></span>
                      </p>
                    </div> 
                    </div>
                  </div>
                </div>
              </div>
            </a>
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