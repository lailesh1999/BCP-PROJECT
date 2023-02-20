<?php

include_once("./database/constants.php");
if (isset($_SESSION["staff_id"])) {
	session_destroy();
	session_abort();
}
header("location:../staff_login.php");

?>