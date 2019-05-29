<?php
    include("conn.php");
    $i= isset($_GET['id']) ? $_GET['id'] : '';
    $sql= "update students
    set isuse='0'
    where user_name='$i'";
    //修改数据库
    if(!(mysqli_query($conn,$sql))){
    echo "<script>alert('删除失败');</script>";
    }else{
    echo "<script>alert('删除成功！');</script>";
    }
?>