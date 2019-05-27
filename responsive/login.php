<!-- 
    Author:武也婷 
    BuildDate:2018-5-15
    Version:1.0
    Function:address book
 -->

<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="zh-CN">
<!-- 
    Author:武也婷 
    BuildDate:2018-4-17
    Version:1.0
    Function:Bootstrap
 -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/index.css" />

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <?php include("top_login.html");?>

    <div class="container">
        <!--导航条-->

        <?php include("conn.php");?>

        <div class="container login">
          <form class="login" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class="form-group center-block">
              <input type="text" class="form-control" name="username" placeholder="用户名">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="pwd" placeholder="密码">
            </div>
            <div class="checkbox">
              <label class="radio-inline">
                <input type="radio" name="options" id="inlineRadio1" checked="checked" value="admin"> 管理员
              </label>
              <label class="radio-inline">
                <input type="radio" name="options" id="inlineRadio2" value="student"> 校友
              </label>
            </div>
            <div class="form-group">
              <input type="submit" class="form-control" placeholder="登录"> 
            </div>
          </form>

        <!--连接数据库-->
        

        <?php include("footer.html");?>
    </div>
    
  </body>
  <script src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name= $_POST["username"];
    $pwd=$_POST["pwd"];
    if($_POST["options"]=="admin" ){
      $sql="select admin_pwd
      from admins
      where admin_name='$name'";
      include("conn.php");
      $result = $conn->query($sql);
      if ($row = mysqli_fetch_array($result))
      {
      $ppwd = $row['admin_pwd'];
      }
      if($ppwd==$pwd){
        $_SESSION["login"]=1;
        echo"<script>window.location.href='index.php'</script>";
      }
      else{
        echo "<script>alert('登录失败');</script>";
      }
    }
    else{
      $sql="select user_pwd
      from students
      where user_name='$name'";
      include("conn.php");
      $result = $conn->query($sql);
      if ($row = mysqli_fetch_array($result)){
      $ppwd = $row['user_pwd'];
      }
      if($ppwd==$pwd){
        $_SESSION["login"]=2;
        $_SESSION["id"]=$name;
        echo"<script>window.location.href='index_stu.php'</script>";
      }
      else{
        echo "<script>alert('登录失败');</script>";
      }
    }
  }
?>