<?php
// Start or resume the session
session_start();  
unset($_SESSION['name']);     // unset the session
header("Location:login.php");

?>
