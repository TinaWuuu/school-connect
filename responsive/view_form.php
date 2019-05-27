<!-- 
    Author:武也婷 
    BuildDate:2018-4-17
    Version:1.0
    Function:Bootstrap
 -->
 
<?php
if($_SESSION["login"] != 1){
  echo "<script>alert('你没有权限访问')</script>";
  echo "<script>window.location.href='login.php'</script>";
}
?>
<!-- 
    Author:武也婷 
    BuildDate:2018-5-16
    Version:1.0
    Function:address book
 -->

<!DOCTYPE html>
<html lang="zh-CN">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/view_form.css" />

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <div class="content">
  <div class="for">
  <form class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div class="form-group">
      <input type="text" class="form-control" name="user_name" placeholder="用户名">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" name="user_pwd" placeholder="密码">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="real_name" placeholder="真实姓名">
    </div>
    <div class="form-group">
    <input type="text" class="form-control" name="mobile" placeholder="手机">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="business" placeholder="工作单位">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="card" placeholder="身份证号">
    <div>
    <div class="form-group">
      <input type="text" class="form-control" name="address" placeholder="通讯地址">
    <div>
    <div class="form-group">
      <input type="text" class="form-control" name="zipcode" placeholder="邮编">
    </div>
    <div class="form-group">
      <select class="form-control" name="enter_year">
          <option>2016</option>
          <option>2017</option>
          <option>2018</option>
      </select>
    </div>
    <div class="form-group">
      <select class="form-control" name="class">
          <option>计算机161</option>
          <option>计算机171</option>
          <option>计算机181</option>
      </select>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control" placeholder="提交">
    </div>
  </form>
    </div>
  <div class="imgg">
    <img src="images/edit.png" alt="images" class="img-thumbnail">
  </div>
  </div>
  </body>
  <script src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $message="";
    $uname=$_POST["user_name"];
    $pwd=$_POST["user_pwd"];
    $rname=$_POST["real_name"];
    $mo=$_POST["mobile"];
    $bu=$_POST["business"];
    $card=$_POST["card"];
    $address=$_POST["address"];
    $zip=$_POST["zipcode"];
    $enter=$_POST["enter_year"];
    $class=$_POST["class"];
    /*if(!preg_match('/^[a-zA-z][0-9a-zA-z_].{5,17}$/',$uname)){
      echo"用户名格式不正确";
    }
    else if(!preg_match('/^((\+\s)?86\s\-\s|((\+\s\-\s)?\s86)?)0?1[34579]\d{9}$/',$mo)){
      echo"手机号码格式不正确";
    }
    else{
    $sql="insert into students(user_name, real_name, mobile, business,card_no,address,zipcode,enter_year,class,isuse)
    values('1','1','1','$bu','$card','$add',$zip','$enter','$class',0)";*/
    $sel="select id 
          from classes
          where class_name='$class'";
    $res=mysqli_query($conn,$sel);
    $arr=mysqli_fetch_row($res);
    $sql= "insert into students(user_name, user_pwd,real_name, mobile, business,card_no,address,zipcode,enter_year,class_id,isuse)
    values('$uname','$pwd','$rname','$mo','$bu','$card','$address','$zip','$enter','$arr[0]',0)";
    //插入数据库
    if(!(mysqli_query($conn,$sql))){
      echo "<script>alert('数据插入失败');</script>";
    }else{
      echo "<script>alert('注册成功！');</script>";
    }
  }
?>