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


<?php
include('includes/script.php');
?>

</script>
</body>
 </html>
