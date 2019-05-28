<!-- 
    Author:武也婷 
    BuildDate:2018-5-15
    Version:1.0
    Function:address book
 -->

 <?php
  if($_SESSION["login"]!=1){
    echo "<script>alert('你没有权限访问')</script>";
    echo"<script>window.location.href='login.php'</script>";
  }
?>

<!DOCTYPE html>
<html lang="zh-CN">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
        <table class="table table-striped table-bordered table-hover">
            <tr  class='text-center'>
                <td>序号</td>
                <td>姓名</td>
                <td>身份证号</td>
                <td>入学年月</td>
                <td>班级</td>
                <td>手机</td>
                <td>操作</td>
            </tr>
            <?php
        		 //1、显示每个人的信息
             lis();
        		?>
        </table>
  </body>
  <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
	<script src="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>


<?php
  function lis(){
  include("conn.php");
  $sql="select real_name,card_no,enter_year,class_name,mobile,students.isuse,user_name
        from students,classes
        where students.class_id=classes.id";
  $res=mysqli_query($conn,$sql);
  $cot=1;
  while($arr=mysqli_fetch_row($res)){
    echo "<tr class='text-center'>";
    if($arr[5]!='0'){
      echo "<td>$cot</td>";
      $cot++;
    for($i=0;$i<5;$i++){
    //foreach ($arr as $str) {
      //单元格的形式输出每部分信息
      echo "<td>$arr[$i]</td>";
    }
    
    echo "<td>
    <a href='view.php'><i class='fa fa-file-o'></i></a>
    <a href='edit.php?id=$arr[6]'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
    <a href='#' onclick='del($arr[6])'><i class='fa fa-trash' aria-hidden='true'></i></a>
    </td>";
    }
    echo "</tr>";
  }
  mysqli_free_result($res);// 释放查询资源结果集
  mysqli_close($conn);//关闭数据库连接
  }
?>

<script type="text/javascript">
    function del(id){
      //console.log(1);
        if (confirm('是否删除?')) {
            window.location.href = 'delete.php?id='+id;
        }
        else{
            return 0;
        }
    }
</script>