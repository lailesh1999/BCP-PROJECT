<?php
include("dbconnect.php");

?>
<select name="product_id" id="product_id">
<?php
$supplier_id = $_GET['supplier_id'];
$query = "select * from product_tbl where deleted='0' and status='0' and supplier_id = '$supplier_id'";
$query_result = $link->query($query);
while($rows = mysqli_fetch_array($query_result))
{
	$product_id = $rows['product_id'];
	$product_name = $rows['product_name'];
?>
<option value="<?php echo $product_id; ?>"><?php echo $product_name;?></option>
<?php 
}
?>
</select>



