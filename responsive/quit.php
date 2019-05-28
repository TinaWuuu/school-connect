<?php
session_start();
echo "<script>location.href='login.php';</script>";	
unset($_SESSION['login']);
?>

<!-- 
    Author:武也婷 
    BuildDate:2018-5-15
    Version:1.0
    Function:address book
    由于session_start()语句要放到文件的开头，所以我的注释写到了php的下面
 -->