<?php
session_start();
echo "<script>location.href='login.php';</script>";	
unset($_SESSION['login']);
?>
