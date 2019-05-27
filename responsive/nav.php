<!-- 
    Author:武也婷 
    BuildDate:2018-5-19
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
    <link rel="stylesheet" type="text/css" href="css/index.css" />

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <nav class="navbar navbar-default ">
        <ul class="nav navbar-nav faq-tabbable">
            <li class="active list"><a href="index.php">首页</a></li>
            <li class="list"><a href="view.php">新增</a></li>
            <li class="list"><a href="query.php">查询</a></li>
            <li class="list"><a href="quit.php">退出</a></li>
        </ul>
        </nav>
  </body>
  <script src="http://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>

<script src="https://cdn.bootcss.com/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript">
 $('.navbar-nav').find('a').each(function () {
   if (this.href == document.location.href || document.location.href.search(this.href) >= 0) {
      $(this).parent().addClass('active'); // this.className = 'active';
      }
    else{
      $(this).parent().removeClass('active');
        }
  });
/*
var list = document.querySelectorAll('.list');
function accordion(e) {
        for (i = 0; i < list.length; i++) {
                list[i].classList.remove('active');
            }
            //点开的另一个list也要标记为active
            this.classList.add('active');
        }
    //阻止点击事件向下传播
    //e.stopPropagation();
    //如果本节点已激活（active），则移除active

//每个list节点的click点击事件绑定accordion判断事件*/
</script>