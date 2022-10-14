<?php

include_once("./database/constants.php");
if (isset($_SESSION["admin_id"])) {
	session_destroy();
	session_abort();
}
header("location:../admin_login.php");

?>