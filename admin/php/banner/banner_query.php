<?php

include_once("../connect.php");

$result="";
$sqlbanner = "SELECT * FROM banner";

//数量
$sqlsum = "SELECT count(*) FROM banner";
$a = mysqli_query($link,$sqlsum);
$xx = mysqli_fetch_row($a);
$sum = $xx[0];


$bannerlink = $link->query($sqlbanner);

if ($bannerlink->num_rows > 0) {
    // 输出数据
    while(($row = $bannerlink->fetch_assoc())!=false) {
            $result="{$result}"."{\"banner_id\":".$row["banner_id"].",\"banner_title\":\"".$row["banner_title"]."\",".
                "\"banner_alt\":\"".$row["banner_alt"]."\",".
                "\"banner_img_url\":\"".$row["banner_img_url"]."\",".
                "\"banner_class\":\"".$row["banner_class"]."\",".
                "\"banner_website\":\"".$row["banner_website"]."\"},";
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