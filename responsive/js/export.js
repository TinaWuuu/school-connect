document.getElementById('export').onclick = () => {
    $.get("exportExcel.php",function(data,status){
       // alert("数据: " + data + "\n状态: " + status);
    });
}
