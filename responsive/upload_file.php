<!-- 
    Author:武也婷 
    BuildDate:2018-5-20
    Version:1.0
    Function:address book
 -->

<?php
    session_start();
    if($_SESSION["login"]!=1){
    echo "<script>alert('你没有权限访问')</script>";
    echo"<script>window.location.href='login.php'</script>";
    }
    

    $bool=($_FILES["file"]["type"]=="image/gif"  ||
        $_FILES["file"]["type"]=="image/jpg" ||
        $_FILES["file"]["type"]=="image/jpeg" ||
        $_FILES["file"]["type"]=="image/png");
    if(!$bool){
        die("类型不对<a href='javascript:window.history.back();'>返回</a>");
    }  
    $bool=$_FILES["file"]["size"]<100000;
    if(!$bool){
        die("大小不对<a href='javascript:window.history.back();'>返回</a>");
    }

    //文件上传遇错后停止执行
    if($_FILES["file"]["error"]>0){
        die("Return  Code:".$_FILES["file"]["error"]."<br/>");
    }

    //取上传时间为文件名
    $today=date("YmdHis");

    //文件名按照"."分成两部分存到数组
    $fileArray=explode(".",$_FILES["file"]["name"]);

    //重命名上传文件名
    $filename=$today.".".$fileArray[1];

    //移动文件并重命名upload
    move_uploaded_file($_FILES["file"]["tmp_name"],"images/$filename");


    //保存文件路径，跳回到上传页面后可用
    $filePath="images/$filename";

    if($_GET["id"]){
        $iid = $_GET["id"];
        $sql = "update students set image = '$filePath' where user_name = '$iid';"; 
        include('conn.php');
        echo $sql;
        if((mysqli_query($conn,$sql))){
            echo "<script>alert('上传成功');</script>";
        }else{
            echo "<script>alert('上传失败！');</script>";
        }
        echo "<script>window.location='edit.php?id=$iid'</script>";
    }
    else{
        $_SESSION["image"]=$filePath;
        //echo "<script>window.location.href='view_form.php?image=$filePath';<script>";
    }
?>

