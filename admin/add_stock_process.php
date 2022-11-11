<?php
include('dbconnect.php');
if(isset($_POST['addstock']))
{
	session_start();
	$admin_id = $_SESSION['admin_id'];
    $supplier_id = $_POST['supplier_id'];
    $product_id = $_POST['product_id'];
	$batch_number = $_POST['batch_number'];
    $expiry_date = $_POST['expiry_date'];
    $quantity = $_POST['quantity'];
    $purchase_price = $_POST['purchase_price'];
    $invoice_number = $_POST['invoice_number'];
    $mrp = $_POST['mrp'];
    $price = $_POST['rate'];
    $total_price = $_POST['total_price'];

	  echo $query= " insert into stock_tbl (supplier_id,product_id,batch_number,quantity,expiry_date,mrp,rate,inserted_by_id) values ('$supplier_id','$product_id','$batch_number','$quantity','$expiry_date','$mrp','$price','$admin_id')";
	  $query_res=$link->query($query);
		if($query_res)
		{
		     header('location:view_stock.php?msg=1');

		}
		else
		{
			header('location:view_stock.php?msg=1.1');
		}
       echo  $query1= " insert into purchase_tbl (supplier_id,product_id,invoice_number,quantity,purchase_price,total_price,inserted_by_id) values ('$supplier_id','$product_id','$invoice_number','$quantity','$purchase_price','$total_price','$admin_id')";
        $query_res1=$link->query($query1);
          if($query_res1)
          {
               //header('location:view_stock.php?msg=1');
  
          }
          else
          {
              //header('location:view_stock.php?msg=1.1');
          }
  

}




?>