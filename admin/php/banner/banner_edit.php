<?php
include_once("../connect.php");

$banner_id=$_GET['id'];

$sql = "SELECT * FROM banner WHERE banner_id='{$banner_id}'";
$sqlfinish = mysqli_query($link,$sql);

while($row=mysqli_fetch_array($sqlfinish)){
    $banner_title=$row["banner_title"];
    $banner_alt=$row["banner_alt"];
    $banner_website=$row["banner_website"];
    
    
    $cut=explode('_',$banner_website);
    $banner_version=$cut[1];
    if($banner_version=="pc"){
        $banner_img_url=$row["banner_img_url"];
    } else {
        $banner_img_url="wap/".$row["banner_img_url"];
    }

    
}

//echo $news_class,$news_title;

mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>banner_edit</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="//res.layui.com/layui/dist/css/layui.css"  media="all">
    <link rel="stylesheet" href="../../css/font.css">
    <link rel="stylesheet" href="../../css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="../../js/xadmin.js"></script>

  
<script type="text/javascript">
        //js本地图片预览，兼容ie[6-9]、火狐、Chrome17+、Opera11+、Maxthon3
        function PreviewImage(fileObj, imgPreviewId, divPreviewId) {
            var allowExtention = ".jpg,.bmp,.gif,.png"; //允许上传文件的后缀名document.getElementById("hfAllowPicSuffix").value;
            var extention = fileObj.value.substring(fileObj.value.lastIndexOf(".") + 1).toLowerCase();
            var browserVersion = window.navigator.userAgent.toUpperCase();
            if (allowExtention.indexOf(extention) > -1) {
                if (fileObj.files) {//HTML5实现预览，兼容chrome、火狐7+等
                    if (window.FileReader) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            document.getElementById(imgPreviewId).setAttribute("src", e.target.result);
                        }
                        reader.readAsDataURL(fileObj.files[0]);
                    } else if (browserVersion.indexOf("SAFARI") > -1) {
                        alert("不支持Safari6.0以下浏览器的图片预览!");
                    }
                } else if (browserVersion.indexOf("MSIE") > -1) {
                    if (browserVersion.indexOf("MSIE 6") > -1) {//ie6
                        document.getElementById(imgPreviewId).setAttribute("src", fileObj.value);
                    } else {//ie[7-9]
                        fileObj.select();
                        if (browserVersion.indexOf("MSIE 9") > -1)
                            fileObj.blur(); //不加上document.selection.createRange().text在ie9会拒绝访问
                        var newPreview = document.getElementById(divPreviewId + "New");
                        if (newPreview == null) {
                            newPreview = document.createElement("div");
                            newPreview.setAttribute("id", divPreviewId + "New");
                            newPreview.style.width = document.getElementById(imgPreviewId).width + "px";
                            newPreview.style.height = document.getElementById(imgPreviewId).height + "px";
                            newPreview.style.border = "solid 1px #d2e2e2";
                        }
                        newPreview.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='" + document.selection.createRange().text + "')";
                        var tempDivPreview = document.getElementById(divPreviewId);
                        tempDivPreview.parentNode.insertBefore(newPreview, tempDivPreview);
                        tempDivPreview.style.display = "none";
                    }
                } else if (browserVersion.indexOf("FIREFOX") > -1) {//firefox
                    var firefoxVersion = parseFloat(browserVersion.toLowerCase().match(/firefox\/([\d.]+)/)[1]);
                    if (firefoxVersion < 7) {//firefox7以下版本
                        document.getElementById(imgPreviewId).setAttribute("src", fileObj.files[0].getAsDataURL());
                    } else {//firefox7.0+                    
                        document.getElementById(imgPreviewId).setAttribute("src", window.URL.createObjectURL(fileObj.files[0]));
                    }
                } else {
                    document.getElementById(imgPreviewId).setAttribute("src", fileObj.value);
                }
            } else {
                alert("仅支持" + allowExtention + "为后缀名的文件!");
                fileObj.value = ""; //清空选中文件
                if (browserVersion.indexOf("MSIE") > -1) {
                    fileObj.select();
                    document.selection.clear();
                }
                fileObj.outerHTML = fileObj.outerHTML;
            }
            return fileObj.value;    //返回路径
        }
</script>

  
  
</head>
<body>
          
          
  

<div class="x-body">
 <form action="banner_edit_finish.php" method="post" enctype="multipart/form-data">
                
                <table class="layui-table" >
                    <tbody >
                    <input type="hidden" value="<?php echo $banner_id;?>" name="banner_id"></input>
                    <input type="hidden" value="<?php echo $banner_website;?>" name="banner_website"></input>
                    <tr>
                            <th width="100" colspan="1">banner标题</th>
                            <td colspan="3" ><div class="layui-input-inline">
                  <input type="text" style="width:400px" name="banner_title" required="" lay-verify="required"
                  autocomplete="off" class="layui-input" value="<?php echo $banner_title;?>">
                  <textarea id="tt2" style="display:none;"><?php echo $news_all;?></textarea>
              </div></td>
                    
                        <tr>
                            <th colspan="1">图片alt</th>
                            <td colspan="3" width="400"><div class="layui-input-inline">
                  <input type="text" style="width:400px" name="banner_alt" required="" lay-verify="required"
                  autocomplete="off" class="layui-input"  value="<?php echo $banner_alt;?>"></td>
                
                  
                  </tr>  
                        <tr>
                            <th colspan="1" valign="top">摘要配图</th>
                            <td colspan="3"><div class="layui-input-inline">
                            
                                <div id="divPreview">
        <img id="imgHeadPhoto" src="../../../<?php echo $banner_img_url;?>" style="width: 300px; height: 100px; border: solid 1px #d2e2e2;"
            alt="" />
</div>

<!--file定义输入字段和 "浏览"按钮，供文件上传。-->
    <input type="file" name="file" onchange="PreviewImage(this,'imgHeadPhoto','divPreview');" size="20" />



                  
                  </td></tr>                            
                        
                    </tbody>
                </table>
                 
                 <input class="layui-btn" type="submit" name="传值" value="编辑banner" />

 
       

</form>




</div>          
          
          
          
          
          
          
          
          
          








</body>
</html>