<?php
include("../connect.php");
$banner_id=$_POST["banner_id"];
$banner_website=$_POST["banner_website"];
$banner_title=htmlspecialchars($_POST["banner_title"]);
$banner_alt=htmlspecialchars($_POST["banner_alt"]);
//$news_addtime=date("Y-m-d h:i:s");



$cut=explode('_',$banner_website);
$banner_version=$cut[1];
if($banner_version=="pc"){
    $uploadFolder='images';
} else {
    $uploadFolder='wap/images';
}




if($_FILES["file"]["error"])
{
    echo $_FILES["file"]["error"];
    
}
else
{
    //没有出错
    //加限制条件        到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字   到底改不改名字
    //判断上传文件类型为png或jpg且大小不超过1024000B
    if(($_FILES["file"]["type"]=="image/png"||$_FILES["file"]["type"]=="image/jpeg")&&$_FILES["file"]["size"]<1024000)
    {
        //防止文件名重复
        $string = $_FILES["file"]["name"];
        $array = explode('.',$string);
        $filename_pc_random=rand(1000, 9999);
        $filename_pc_gbk =date('ymd_His', time())."_".$filename_pc_random.".".$array[1];
        $file_pc_url = "../../../".$uploadFolder."/banner/".$filename_pc_gbk;
        $img_pc_url = "images/banner/".$filename_pc_gbk;
        //转码，把utf-8转成gb2312,返回转换后的字符串， 或者在失败时返回 FALSE。
        $filename_pc =iconv("UTF-8","gb2312",$file_pc_url);
        //检查文件或目录是否存在
        if(file_exists($filename_pc))
        {
            echo"该文件已存在";
        }
        else
        {
            //保存文件,   move_uploaded_file 将上传的文件移动到新位置
            move_uploaded_file($_FILES["file"]["tmp_name"],$filename_pc);//将临时地址移动到指定地址
        }
    }
    else
    {
        echo"文件类型不对";
        exit;
    }
}







if(isset($file_pc_url))
{
    $sql_banner = "UPDATE banner SET banner_title='{$banner_title}', banner_alt='{$banner_alt}', banner_website='{$banner_website}',banner_img_url='{$img_pc_url}' WHERE banner_id='{$banner_id}'";
}
else{
    
    $sql_banner = "UPDATE banner SET banner_title='{$banner_title}', banner_alt='{$banner_alt}', banner_website='{$banner_website}' WHERE banner_id='{$banner_id}'";
}


$sql_banner_finish = mysqli_query($link,$sql_banner);
echo "修改新闻成功";




  
  mysqli_close($link);
?>