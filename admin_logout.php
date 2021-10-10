<?php
session_start();
unset($_SESSION["AdminID"]);
unset($_SESSION["Name"]);
header("Location:admin_login.php");
?>