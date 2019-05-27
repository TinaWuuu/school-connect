<!-- 
    Author:武也婷 
    BuildDate:2018-5-15
    Version:1.0
    Function:address book
 -->
 
<?php
session_start();
echo "<script>location.href='login.php';</script>";	
unset($_SESSION['login']);
?>