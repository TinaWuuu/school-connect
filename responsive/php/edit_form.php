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

<?php 
  include('conn.php');
  $sql = "select image from students where user_name = '$iid';";
  //echo $sql;
  $result = $conn->query($sql);
  if ($row = mysqli_fetch_array($result))
  {
      $imageUrl = $row['image'];
  }
?>

<fieldset>
  <div class="row">
    <div class="col-md-4 col-md-offset-1">
    <form class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF?id= $iid"];?>" method="post">
      <legend>编辑校友</legend>
      <div class="form-group">
        <p id="words"></p>
      </div>
      <div class="form-group text-center">
        <input type="text" class="form-control" name="mobile" placeholder="请输入手机号码" id="mobile">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="business" placeholder="请输入工作单位" id="business">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="address" placeholder="请输入通讯地址" id="address">
      </div>
      <div class="form-group">
        <input type="submit" class="form-control" placeholder="提交">
      </div>
    </form>
  </div>
  <div class="col-md-4  col-md-offset-2">
    <img src="<?php echo $imageUrl == '' ? '../images/edit.png' : "$imageUrl"; ?>" alt="images" class="img-thumbnail" id="userImage" style="margin-top: 50px;">
      <iframe src="../html/upload.html" frameborder="0"></iframe>
    </form>
  </div>
</div>
</fieldset>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //$iid = $_GET['id'];
    // $iid = isset($_SESSION['i']) ? $_SESSION['i'] : '';
    $mo=$_POST["mobile"];
    $bu=$_POST["business"];
    $address=$_POST["address"];
    //  $imag=$_SESSION["userimage"];
    if(!preg_match('/^((\+\s)?86\s\-\s|((\+\s\-\s)?\s86)?)0?1[34579]\d{9}$/',$mo)){
      echo "<script>alert('手机号码格式不正确');</script>";
    }
    else{
    $sql= "update students
        set mobile='$mo',
        business='$bu',
        address='$address'
        where user_name='$iid'";
    //修改数据库
    if(!(mysqli_query($conn,$sql))){
        echo "<script>alert('数据编辑失败');</script>";
    }else{
      if(isset($_SESSION["image"])){
        $image=$_SESSION["image"];
        $sqli="update students 
        set image='$image'
        where user_name='$iid'";
        mysqli_query($conn,$sqli);
        unset($_SESSION["image"]);
        //unset($_SESSION["id"]);
        }
      echo "<script>alert('编辑成功！');</script>";
      if($_SESSION["login"]==1){
        echo "<script>window.location.href='edit.php?id=$iid';</script>";
      }
      else{
        echo "<script>window.location.href='edit_stu.php';</script>";
      }
    }
    //unset($_SESSION['username']);
  }
}
?>
