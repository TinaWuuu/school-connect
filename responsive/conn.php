<!-- 
    Author:武也婷 
    BuildDate:2018-5-15
    Version:1.0
    Function:address book
 -->
<?php
    $host='127.0.0.1';
    $user='root';
    $password='';
    $dbName='list';
    $conn=new mysqli($host,$user,$password,$dbName);
    if ($conn->connect_error){
        die("连接失败：".$conn->connect_error);
    }
    mysqli_set_charset($conn,"utf8") or die("数据库编码集设置失败！");
    /*$sql="select * from admins";
    $res=mysqli_query($conn,$sql);
    $data=var_dump(mysqli_fetch_array($res)); 
    mysqli_free_result($res);// 释放查询资源结果集
    mysqli_close($conn); //关闭数据库连接*/
?>
