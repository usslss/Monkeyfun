<?php 

include_once("connect.php");


$sqlsum = "SELECT count(*) FROM reservation";
$a = mysqli_query($link,$sqlsum);
$b = mysqli_fetch_row($a);
$sum = $b[0];

/*
if (isset($_GET["search"])){
    $sum=$_GET["search"];
}
*/
$page="1";
$list_show="10";
$result="";

$i="1";


if (isset($_GET["page"])){
    $page=$_GET["page"];
}

if (isset($_GET["limit"])){
    $list_show=$_GET["limit"];    
}

$sqlmsg = "SELECT * FROM reservation";
    

$sqlsum = "SELECT count(id) FROM reservation";
$a = mysqli_query($link,$sqlsum);
$b = mysqli_fetch_row($a);
$sum = $b[0];






$list_head=$list_show*($page-1);
$list_bottom=$list_show*$page;




$msglink = $link->query($sqlmsg);

if ($msglink->num_rows > 0) {
    // 输出数据
    while(($row = $msglink->fetch_assoc())!=false) {
        if(($i>$list_head)&($i<=$list_bottom)){                
        $result="{$result}"."{\"reservation_id\":".$row["id"].",\"reservation_name\":\"".$row["name"]."\",".
        "\"reservation_idnum\":\"".$row["idnum"]."\",".
        "\"reservation_phone\":\"".$row["phone"]."\",".
        "\"reservation_address\":\"".$row["address"]."\",".
        "\"reservation_process\":\"".$row["process"]."\",".
        "\"reservation_addtime\":\"".$row["addtime"]."\"},";
        }
        $i=$i+1;
    }
    
    

    
} else {
    //空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理空搜索处理
    echo "0 结果";
}
//关闭数据库链接
mysqli_close($link);
//去掉字符串最后一个逗号
$result=rtrim($result, ",");

echo '{"code":0,"msg":"","count":'.$sum.',"data":['.$result.']}';
?>