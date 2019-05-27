<!-- 
    Author:武也婷 
    BuildDate:2018-5-20
    Version:1.0
    Function:address book
 -->

<!DOCTYPE html>
<html lang="zh-CN">
<body>
  <form class="form-inline" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div class="form-group">
      <input type="text" class="form-control" name="query">
    </div>
    <label class="radio-inline">
      <input type="radio" name="option" id="inlineRadio1" checked="checked" value="name"> 姓名
    </label>
    <label class="radio-inline">
      <input type="radio" name="option" id="inlineRadio2" value="year"> 入学年份
    </label>
    <label class="radio-inline">
      <input type="radio" name="option" id="inlineRadio3" value="class"> 班级
    </label>
    <div class="form-group navbar-right">
      <input type="submit" class="form-control"value="搜索">
      <a class="btn btn-primary btn-xs"  href="exportExcel.php" rel="external nofollow" ><i class="fa fa-share-square-o fa-lg"></i> 导出</a>
    </div>
  </form>
</body>
</html>
<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      echo"
    <div class='container'>
    <table  class='table table-striped table-bordered table-hover'>
    <tr>
    <td>姓名</td>
    <td>身份证号</td>
    <td>入学年月</td>
    <td>班级</td>
    <td>手机</td>
    </tr>";
      if($_POST["option"]=="name" ){
          $name=$_POST["query"];
          $sql="select real_name,card_no,enter_year,class_name,mobile,students.isuse
              from students,classes
              where students.class_id=classes.id and real_name='$name'";
      }
      else if($_POST["option"]=="year"){
          $y=$_POST["query"];
          $sql="select real_name,card_no,enter_year,class_name,mobile,students.isuse
              from students,classes
              where students.class_id=classes.id and enter_year='$y'";
      }
      else{
          $c=$_POST["query"];
          $sql="select real_name,card_no,enter_year,class_name,mobile,students.isuse
              from students,classes
              where students.class_id=classes.id and class_name='$c'";
      }
      $data = array();
      $res=mysqli_query($conn,$sql);
      while($arr=mysqli_fetch_row($res)){
          array_push($data,array_slice($arr,0,5));
          echo "<tr>";
          for($i=0;$i<5;$i++){
              //foreach ($arr as $str) {
              if($arr[5]=='0'){
                  break;
              }
              //单元格的形式输出每部分信息
              echo "<td>$arr[$i]</td>";
          }
          echo "</tr>";
      }
      echo"</table> </div>";
      $_SESSION['title'] = array("姓名","身份证号","入学年月","班级","手机");
      $_SESSION['data'] = $data;
      mysqli_free_result($res);// 释放查询资源结果集
      mysqli_close($conn);//关闭数据库连接
  }
?>
