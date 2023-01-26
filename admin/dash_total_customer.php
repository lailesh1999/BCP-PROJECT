<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"
/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<?php
		include('includes/stylesheet.php');
        include('secure.php');  
	?>
</head>
<body >
    
	<?php
		include('includes/sidenav.php');
?>
<div class="main-content" id="panel">
<?php
	

	include('includes/topnav.php');
	//include('includes/header.php');
?>

<?php
include("dbconnect.php");
   
 $query = "select  * from customer_tbl where deleted ='0'";
 $query_res = $link->query($query); $query_res = $link->query($query);
 $c =0;
 ?>
 
 	<div style="padding: 5%;">
    <a href="index.php" class='fas fa-arrow-alt-circle-left' style='font-size:48px;color:BlueViolet'></a>
  <center><h1 style="color:blue;background-color:BlueViolet;color:white"><marquee>TOTAL  CUSTOMER</marquee></h1></center>
 	<table  class="table table-hover  table-bordered" id="example1" style="width: 100%;color:white;">
 			<tr style="background-color:BlueViolet;color:white;">
                        <th>CUSTOMER NAME</th>
                        <th>CUSTOMER EMAIL</th>
                        <th>CUSTOMER CONTACT</th>
                        <th>CUSTOMER ADDRESS</th>
                      
                        
 					</tr>
 			
		 <?php
                if (mysqli_num_rows($query_res) > 0) 
            {
 	 			while($rows = mysqli_fetch_array($query_res))
 	 			{
 						
 						$customer_name = $rows["customer_name"];
                        $email = $rows['email'];
                        $adsress = $rows['address'];
                        $contact = $rows['contact'];
                        
                        
		 ?>
 			    <tr style="color:black;">
                 <td><?php echo " $customer_name"; ?></td>
                 <td><?php echo " $email"; ?></td>
                 <td><?php echo " $adsress"; ?></td>
                 <td><?php echo " $contact"; ?></td>
                 
                 

                 
</button>
 				
			</tr>
            
<?php 
 					}
                }
                else{
                    echo " NO RECORS FOUND";
                }
			
?>
</table>


</div>
<?php
	//include('includes/footer.php');

  
?>


</div>



<?php
include('includes/script.php');
?>



  
</body>
</html>

<script type="text/javascript">

    function diss(){
		
			window.location="view_stock.php";
	
		
    }

 </script> 
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script type="text/javascript">

 function myFun(sid){
		var edit = confirm("ARE YOU SURE TO DELETE DATA");
	 	if(edit){
	 		window.location="delete_stock.php?stock_id="+sid;
	 	}
		
  }
</script>

<script type="text/javascript">

	function myEdit(sid){
		var edit = confirm("ARE YOU SURE TO EDIT DATA");
		if(edit){
			window.location="update_stock.php?stock_id="+sid;
      
     
		}
		
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"
></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script type="text/javascript" >
$(function() {
$("#example").dataTable();
});
</script>