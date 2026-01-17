<?php
session_start();
$_SESSION = array();
session_unset();
session_destroy();
header("location: login.php?message=You have successfully logged out");
exit;
?>
