<?php
session_start();
unset($_SESSION["UserID"]);
unset($_SESSION["FirstName"]);
header("Location:login_Page.php");
?>