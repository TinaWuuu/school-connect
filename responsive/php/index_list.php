<?php
  if($_SESSION["login"]!=1){
    echo "<script>alert('你没有权限访问')</script>";
    echo"<script>window.location.href='login.php'</script>";
  }
?>

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
    //显示每个人的信息
    lis();
  ?>
</table>

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