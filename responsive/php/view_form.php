<?php
if($_SESSION["login"] != 1){
    echo "<script>alert('你没有权限访问')</script>";
    echo "<script>window.location.href='login.php'</script>";
}
?>

<fieldset>
  <div class="row">
    <div class="col-md-4 col-md-offset-1">
      <form class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <legend>新增校友</legend>
        <div class="form-group">
          <input type="text" class="form-control" name="user_name" placeholder="请输入用户名">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="user_pwd" placeholder="请输入密码">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="real_name" placeholder="请输入真实姓名">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="mobile" placeholder="请输入手机号码">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="business" placeholder="请输入工作单位">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="card" placeholder="请输入身份证号">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="address" placeholder="请输入通讯地址">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="zipcode" placeholder="请输入邮编">
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
              <option>物联网181</option>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" class="form-control" placeholder="提交">
        </div>
      </form>
    </div>
    <div class="col-md-4 col-md-offset-2">
      <img src="../images/edit.png" alt="images" class="img-thumbnail" id="userImage" style="margin-top: 50px;">
      <iframe src="../html/upload.html" frameborder="0"></iframe>
    </div>
  </div>
</fieldset>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
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
    if(!preg_match("/^[a-zA-z][0-9a-zA-z_].{5,17}$/",$uname)){
        echo"<script>alert('用户名格式不正确');</script>";
    } 
    else if(!preg_match("/^[0-9a-zA-z_].{5,17}$/",$pwd)){
        echo "<script>alert('密码格式不正确');</script>";
    }
    else if(!preg_match('/^((\+\s)?86\s\-\s|((\+\s\-\s)?\s86)?)0?1[34579]\d{9}$/',$mo)){
        echo"<script>alert('手机号码格式不正确');</script>";
    }
    else if(!preg_match("/^[1-9]\d{5}(18|19|20)\d{2}((0[1-9])|(1[0-2]))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/",$card)){
        echo"<script>alert('身份证格式不正确');</script>";
    }
    else if(!preg_match("/^[0-8][0-7]\d{4}$/",$zip)){
        echo"<script>alert('身份证格式不正确');</script>";
    }
    else{
        $check="select user_name from students where user_name='$uname'";
        if(mysqli_num_rows(mysqli_query($conn,$check)) < 1){
            //$sql="insert into students(user_name, real_name, mobile, business,card_no,address,zipcode,enter_year,class,isuse)
                //values('1','1','1','$bu','$card','$address',$zip','$enter','$class',0)";
            $sel="select id 
                from classes
                where class_name='$class'";
            $res=mysqli_query($conn,$sel);
            $arr=mysqli_fetch_row($res);
            $sql= "insert into students(user_name, user_pwd,real_name, mobile, business,card_no,address,zipcode,enter_year,class_id,isuse)
                values('$uname','$pwd','$rname','$mo','$bu','$card','$address','$zip','$enter','$arr[0]',1)";
           
            //插入数据库
            if(!(mysqli_query($conn,$sql))){
                echo "<script>alert('数据插入失败');</script>";
            }else{
                if(isset($_SESSION["image"])){
                  $image=$_SESSION["image"];
                  $sqli="update students 
                  set image='$image'
                  where user_name='$uname'";
                  mysqli_query($conn,$sqli);
                  unset($_SESSION["image"]);
                  }
                echo "<script>alert('新增成功！');</script>";
            }
        }
        else{
            echo "<script>alert('该用户名已存在！');</script>";
        }
    }
}
?>
