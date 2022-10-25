<?php
include("dbconnect.php");

?>
<select name="tax_id" id="tax_id">
<?php
$tax_id = $_GET['tax_id'];
$query = "select * from tax_tbl where deleted='0' and status='0' and tax_id = '$tax_id'";
$query_result = $link->query($query);
while($rows = mysqli_fetch_array($query_result))
{
	$tax_id = $rows['tax_id'];
	$tax_rate = $rows['tax_rate'];
?>
<option value="<?php echo $tax_id; ?>"><?php echo $tax_rate;?></option>
<?php 
}
?>
</select>



