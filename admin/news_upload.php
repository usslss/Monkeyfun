<?php
include("php/connect.php");

$img_source=$website;
if(isset($_POST["news_source"])){
    $news_source=$_POST["news_source"];
}else{
    $news_source="互联网";
}


$news_title=htmlspecialchars($_POST["news_title"]);
$news_summary=htmlspecialchars($_POST["news_summary"]);
$news_class=$_POST["news_class"];

if(isset($_POST["editorValue"])){
    $news_all=$_POST["editorValue"];
}
else{
$news_all=" ";
}


$news_click="0";

$img_class="news";





if($_FILES["file"]["error"])
{
    echo $_FILES["file"]["error"];
   
}
else
{
    //没有出错
    //加限制条件
    //判断上传文件类型为png或jpg且大小不超过1024000B
    if(($_FILES["file"]["type"]=="image/png"||$_FILES["file"]["type"]=="image/jpeg")&&$_FILES["file"]["size"]<2048000)
    {
        //防止文件名重复
        $filename_gbk =date('ymd_his', time())."_".rand(1000, 9999)."_".$_FILES["file"]["name"];
        $file_url = "../upload/".$filename_gbk;
        $img_url = "upload/".$filename_gbk;
                
        //转码，把utf-8转成gb2312,返回转换后的字符串， 或者在失败时返回 FALSE。
        $filename =iconv("UTF-8","gb2312",$file_url);
        //检查文件或目录是否存在
        if(file_exists($filename))
        {
            echo"该文件已存在";
            
        }
        else
        {
            //保存文件,   move_uploaded_file 将上传的文件移动到新位置
            move_uploaded_file($_FILES["file"]["tmp_name"],$filename);//将临时地址移动到指定地址
        }
    }
    else
    {
        echo"文件类型不对";
        
    }
}

// 裁剪图片
if(isset($file_url)){
    include("php/imgcut.php");
    $source = $file_url;
    
    $width = 360; // 裁剪后的宽度
    $height = 413;// 裁剪后的高度
    // 裁剪后的图片存放目录
    $target = $file_url;
    
    image_center_crop($source, $width, $height, $target);
}





if (isset($file_url)){
    $sql_img = "INSERT INTO img (img_name, img_url, img_class ,img_source) VALUES('{$filename_gbk}', '{$img_url}', '{$img_class}', '{$img_source}')";
    $sql_news = "INSERT INTO news (news_title, news_summary, news_img_url, news_all, news_source, news_click, news_class) VALUES('{$news_title}', '{$news_summary}', '{$img_url}', '{$news_all}', '{$news_source}', '{$news_click}', '{$news_class}')";
    $sqlfinish_img = mysqli_query($link,$sql_img);
    $sqlfinish = mysqli_query($link,$sql_news);
}
else {
    $sql_news = "INSERT INTO news (news_title, news_summary, news_all, news_source, news_click, news_class) VALUES('{$news_title}', '{$news_summary}', '{$news_all}', '{$news_source}', '{$news_click}', '{$news_class}')";
    $sqlfinish = mysqli_query($link,$sql_news);
}
    










echo "添加新闻成功";

  
mysqli_close($link);
?>