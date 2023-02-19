
<?php

session_start();
$admin_id = $_SESSION['admin_id'];




include("dbconnect.php");
    $query = "select p.product_name,p.generic_name,p.packing,s.quantity,s.expiry_date,s.batch_number,s.mrp,s.rate,s.stock_id,rt.return_id,rt.status,rt.deleted,p.product_id,st.supplier_id,st.supplier_name,st.supplier_address,st.supplier_contact,st.supplier_email from product_tbl p,stock_tbl s,supplier_tbl st ,return_stock_tbl rt where rt.supplier_id = st.supplier_id and p.product_id=rt.product_id and rt.stock_id=s.stock_id and p.deleted='0' and st.deleted='0' and s.deleted='0' and rt.deleted ='0'";
 $query_res = $link->query($query);
 while($rows = mysqli_fetch_array($query_res))
                {
                        $supplier_id = $rows['supplier_id'];
                        $supplier_name = $rows['supplier_name'];
                        $contact = $rows['supplier_contact'];
                        $email = $rows['supplier_email'];
                        $address = $rows['supplier_address'];
}
?>
<div style="width:50%;border: 2px solid black;padding-left: 1%;height: auto;"><br>
<b>DEEPTHI MEDICALS</b><br><br>
    <b>NAME:&nbsp&nbsp&nbsp&nbsp<?php echo $supplier_name;?></b><br>
    <b>PHONE NUMNBER:&nbsp&nbsp&nbsp&nbsp<?php echo $contact;?></b><br>
    <b>ADDRESS:&nbsp&nbsp&nbsp&nbsp<?php echo $address;?></b><br>
    <b>EMAIL:&nbsp&nbsp&nbsp&nbsp<?php echo $email;?></b><br>
<?php
    $query1 = "select p.product_name,p.generic_name,p.packing,s.quantity,s.expiry_date,s.batch_number,s.mrp,s.rate,s.stock_id,rt.return_id,rt.status,rt.deleted,p.product_id,st.supplier_id,st.supplier_name,st.supplier_address,st.supplier_contact,st.supplier_email from product_tbl p,stock_tbl s,supplier_tbl st ,return_stock_tbl rt where rt.supplier_id = st.supplier_id and p.product_id=rt.product_id and rt.stock_id=s.stock_id and p.deleted='0' and st.deleted='0' and s.deleted='0' and rt.deleted ='0'";
        $query_res1 = $link->query($query1);
        ?>
<table class="table table-borderless" style="width: 100%;">
            <thead><tr><th>MEDICINE  NAME</th>
                        <th>EXPIRY DATE</th>
                        <th>BATCH NUMBER</th>
                         <th>QUANTITY</th>
                        <th>PRICE</th>
                        <th>TOTAL PRICE</th>
                        <hr>
                        </tr>
    <?php
    $t =0;
    while($r =mysqli_fetch_array($query_res1))
    {
        //$grand_total = $r['grand_total'];
        $product_name = $r['product_name'];
        $quantity=$r['quantity'];
        $price=$r['rate'];
        $stock_id = $r['stock_id'];
        $return_id = $r['return_id'];
        //$grand_total =$r['grand_total'];
        $expiry_date = $r['expiry_date'];
        $batch_number = $r['batch_number'];
        $totalq = $quantity * $price;
        //$total_quantity = $total_quantity + $quantity;
        $t = $t + $totalq;
    ?>
<tr><td style="text-align: center;"> <?php echo " $product_name"; ?></td>
            <td style="text-align: center;"> <?php echo "$expiry_date "; ?></td>
            <td style="text-align: center;"> <?php echo "$batch_number "; ?></td>
                <td style="text-align: center;"> <?php echo "$quantity "; ?></td>
                <td style="text-align: center;"> <?php echo "$price "; ?></td>
                <td style="text-align: center;"> <?php echo " $totalq"; ?></td>
        <?php
        $q = "update stock_tbl set deleted = '1',deleted_by_id = '$admin_id' where stock_id = '$stock_id'";
        $r = $link->query($q);
        $q1 = "update return_stock_tbl set status = '1',deleted_by_id = '$admin_id' where return_id = '$return_id'";
        $r1 = $link->query($q1);
 }
?>
                </tr>
                <td  style="padding-left: 2%;"></td>  <td></td><td colspan="2"> </td><td colspan="2"><b>GRAND-TOTAL:&nbsp</b><?php echo $t; ?></td>

</div></thead></table></div>
<br>

<button onclick="my()">PRINT </button>
<a href="dash_expired_medicine.php">BACK</a>
<script type="text/javascript">
   function my(){
        window.print();
   } 
</script>