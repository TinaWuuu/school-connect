<!-- 
    Author:武也婷 
    BuildDate:2018-5-18
    Version:1.0
    Function:address book
 -->

<?php
  if($_SESSION["login"]!=1 && $_SESSION["login"]!=2){
    echo "<script>alert('你没有权限访问')</script>";
    echo"<script>window.location.href='login.php'</script>";
  }
  $iid = $_GET["id"];
  if($_SESSION["login"]==2){
    $iid = $_SESSION["id"];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/edit_form.css" />

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
  </head>

<?php 
  include('conn.php');
  $sql = "select image from students where user_name = $iid";
  $result = $conn->query($sql);
  if ($row = mysqli_fetch_array($result))
  {
      $imageUrl = $row['image'];
  }
?>

  <body>
    <div class="content">
    <div class="form-group center-block">
        <img src="<?php echo $imageUrl == '' ? 'images/edit.png' : $imageUrl; ?>" alt="images" class="img-thumbnail" id="userImage">
        <form action="upload_file.php?id=<?php echo $iid?>" method="post" enctype="multipart/form-data">
          <input type="file" class="input" name="file">
          <input type="submit" name="submit" value="上传">
        </form>
      </div>
      <div class="for">
          <form class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF?id= $iid"];?>" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="mobile" placeholder="手机">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="business" placeholder="工作单位">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="address" placeholder="通讯地址">
            </div>
            <div class="form-group">
              <input type="submit" class="form-control" placeholder="提交">
            </div>
          </form>
      </div>
    </div>
  </body>
  <script src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //$iid = $_GET['id'];
    // $iid = isset($_SESSION['i']) ? $_SESSION['i'] : '';
    $mo=$_POST["mobile"];
    $bu=$_POST["business"];
    $address=$_POST["address"];
    //  $imag=$_SESSION["userimage"];
    /*if(!preg_match('/^[a-zA-z][0-9a-zA-z_].{5,17}$/',$uname)){
      echo"用户名格式不正确";
    }
    else if(!preg_match('/^((\+\s)?86\s\-\s|((\+\s\-\s)?\s86)?)0?1[34579]\d{9}$/',$mo)){
      echo"手机号码格式不正确";
    }
    else{
    $sql="insert into students(user_name, real_name, mobile, business,card_no,address,zipcode,enter_year,class,isuse)
    values('1','1','1','$bu','$card','$add',$zip','$enter','$class',0)";*/
    //echo "$iid";
    $sql= "update students
        set mobile='$mo',
        business='$bu',
        address='$address'
        where user_name='$iid'";
    //修改数据库
    if(!(mysqli_query($conn,$sql))){
        echo "<script>alert('数据编辑失败');</script>";

    }else{
        echo "<script>alert('编辑成功！');</script>";
    }
    //unset($_SESSION['username']);
}
?>
