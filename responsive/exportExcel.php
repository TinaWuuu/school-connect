<?php
    session_start();
    if($_SESSION["login"]!=1 && $_SESSION["login"] != 2 ){
    echo "<script>alert('你没有权限访问')</script>";
    echo"<script>window.location.href='login.php'</script>";
    return ;
    }
?>

<!-- 
    Author:武也婷 
    BuildDate:2018-5-14
    Version:1.0
    Function:address book
    由于session_start()语句要放到文件的开头，所以我的注释写到了php的下面
 -->

<?php
    function export($filename, $tileArray=[], $dataArray=[]){
        ini_set('memory_limit','512M');
        ini_set('max_execution_time',0);
        ob_end_clean();
        ob_start();
        header("Content-Type: text/csv");
        header("Content-Disposition:filename=".$filename);
        $fp=fopen('php://output','w');
        fwrite($fp, chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($fp,$tileArray);
        $index = 0;
        foreach ($dataArray as $item) {
            if($index==1000){
                $index=0;
                ob_flush();
                flush();
            }
            $index++;
            fputcsv($fp,$item);
        }

        ob_flush();
        flush();
        ob_end_clean();
    }
    $arr1 = array("porsche","BMW","Volvo");
    $arr2 = array($arr1,$arr1);
    export("查询结果.xls", $_SESSION['title'],$_SESSION['data']);
?>
