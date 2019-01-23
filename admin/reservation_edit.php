<?php
include_once("php/connect.php");
//待加入对输入值的判断 和非中文的鉴定 重复文件的判断


//获取关键词的页面和网站属性
$sql_getprocess="SELECT process FROM reservation";

$result1=mysqli_query($link, $sql_getprocess);


$i=0;
while ($row=mysqli_fetch_assoc($result1)){
    $quchong[$i]=$row["process"];
    $i++;
}

$i=0;
foreach (array_unique($quchong) as $id => $reservation_process) {
    $newsarr[$i]["reservation_process"] = $reservation_process;
    $i++;
}
$reservation_process_sum=$i;

$reservation_id=$_GET['reservation_id'];

$sql = "SELECT * FROM reservation WHERE id='{$reservation_id}'";
$sqlfinish = mysqli_query($link,$sql);

while($row=mysqli_fetch_array($sqlfinish)){
    $reservation_id=$row["id"];
    $reservation_name=$row["name"];
    $reservation_idnum=$row["idnum"];
    $reservation_phone=$row["phone"];
    $reservation_address=$row["address"];
    $reservation_process=$row["process"];
    $reservation_addtime=$row["addtime"];
    $reservation_roomtype=$row["roomtype"];
    
}


$sql_getroom="SELECT * FROM roomtype";
$result=mysqli_query($link, $sql_getroom);
$i=0;
while($row=mysqli_fetch_array($result)){
    $roomtypeArr[$i]["roomtype"]=$row["room_type"];   
    $roomtypeArr[$i]["empty"]=$row["room_empty"];  
    if($row["room_empty"]==0){
        $roomtypeArr[$i]["disabled"]='disabled=""';
    } else{
        $roomtypeArr[$i]["disabled"]='';
    }
 
    $i++;
    
}
$roomtype_sum=$i;
mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="//res.layui.com/layui/dist/css/layui.css" media="all">
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->

    <script type="text/javascript">
    //js本地图片预览，兼容ie[6-9]、火狐、Chrome17+、Opera11+、Maxthon3
    function PreviewImage(fileObj, imgPreviewId, divPreviewId) {
        var allowExtention = ".jpg,.bmp,.gif,.png"; //允许上传文件的后缀名document.getElementById("hfAllowPicSuffix").value;
        var extention = fileObj.value.substring(fileObj.value.lastIndexOf(".") + 1).toLowerCase();
        var browserVersion = window.navigator.userAgent.toUpperCase();
        if (allowExtention.indexOf(extention) > -1) {
            if (fileObj.files) { //HTML5实现预览，兼容chrome、火狐7+等
                if (window.FileReader) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(imgPreviewId).setAttribute("src", e.target.result);
                    }
                    reader.readAsDataURL(fileObj.files[0]);
                } else if (browserVersion.indexOf("SAFARI") > -1) {
                    alert("不支持Safari6.0以下浏览器的图片预览!");
                }
            } else if (browserVersion.indexOf("MSIE") > -1) {
                if (browserVersion.indexOf("MSIE 6") > -1) { //ie6
                    document.getElementById(imgPreviewId).setAttribute("src", fileObj.value);
                } else { //ie[7-9]
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
                    newPreview.style.filter =
                        "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='" + document.selection
                        .createRange().text + "')";
                    var tempDivPreview = document.getElementById(divPreviewId);
                    tempDivPreview.parentNode.insertBefore(newPreview, tempDivPreview);
                    tempDivPreview.style.display = "none";
                }
            } else if (browserVersion.indexOf("FIREFOX") > -1) { //firefox
                var firefoxVersion = parseFloat(browserVersion.toLowerCase().match(/firefox\/([\d.]+)/)[1]);
                if (firefoxVersion < 7) { //firefox7以下版本
                    document.getElementById(imgPreviewId).setAttribute("src", fileObj.files[0].getAsDataURL());
                } else { //firefox7.0+                    
                    document.getElementById(imgPreviewId).setAttribute("src", window.URL.createObjectURL(fileObj.files[
                        0]));
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
        return fileObj.value; //返回路径
    }

    $(document).ready(function() {

        $("#reservation_process").val("<?php echo $reservation_process;?>"); /* 这句话设置select中value为x的项被选中,例如$("#slt").val(“本科”)就表示<option>本科</option>被选中*/




    });
    </script>


</head>

<body>


    <div class="x-body">
        <form action="reservation_edit_upload.php" method="post" enctype="multipart/form-data">

            <table class="layui-table">
                <tbody>
                    <input type="hidden" value="<?php echo $reservation_id;?>" name="reservation_id">
                    <input type="hidden" value="<?php echo $reservation_roomtype;?>" name="reservation_roomtype_before">
                    <tr>
                        <th width="100" colspan="1">预约姓名</th>
                        <td colspan="1">
                            <div class="layui-input-inline">
                                <input type="text" style="width:400px" name="reservation_name" required="" lay-verify="required"
                                    autocomplete="off" class="layui-input" value="<?php echo $reservation_name;?>">
                            </div>
                        </td>

                        <td colspan="1" width="100">预约状态</td>
                        <td colspan="1" width="200">

                            <select name='reservation_process' id='reservation_process'>
                                <option value="无">请选择预约状态</option>

                                <?php			
if (isset($_GET["reservation_process"])){
    $query_reservation_process=$_GET["reservation_process"];
}
else{
    $query_reservation_process="分类名";
}

for ($i=0;$i<$reservation_process_sum;$i++){    
    if($newsarr[$i]["reservation_process"]==$query_reservation_process){
        echo <<< EOT
        <option selected="selected">{$newsarr[$i]["reservation_process"]}</option>
EOT;
    }
        else {         
            echo <<< EOT
        <option>{$newsarr[$i]["reservation_process"]}</option>
EOT;
        }
    

}
?>
                            </select>
                        </td>
                    </tr>


                    <tr>
                        <th colspan="1">身份证号</th>
                        <td colspan="1" width="400">
                            <div class="layui-input-inline">
                                <input type="text" style="width:400px" name="reservation_idnum" required="" lay-verify="required"
                                    autocomplete="off" class="layui-input" value="<?php echo $reservation_idnum;?>">

                            </div>
                        </td>

                        <td colspan="1" width="100">房间类型</td>
                        <td colspan="1" width="200">

                            <select name='reservation_roomtype' id='reservation_roomtype'>

                                <?php			


for ($i=0;$i<$roomtype_sum;$i++){    
    if($roomtypeArr[$i]["roomtype"]==$reservation_roomtype){
        echo <<< EOT
        <option selected="selected">{$roomtypeArr[$i]["roomtype"]}</option>
EOT;
    }
        else {      
            echo <<< EOT
        <option {$roomtypeArr[$i]["disabled"]}>{$roomtypeArr[$i]["roomtype"]}</option>
EOT;
        }
    

}
?>
                            </select>
                        </td>

                    </tr>

                    <tr>
                        <th colspan="1">手机号</th>
                        <td colspan="3" width="400">
                            <div class="layui-input-inline">
                                <input type="text" style="width:400px" name="reservation_phone" required="" lay-verify="required"
                                    autocomplete="off" class="layui-input" value="<?php echo $reservation_phone;?>">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="1">预约门店</th>
                        <td colspan="3" width="400">
                            <div class="layui-input-inline">
                                <input type="text" style="width:400px" name="reservation_address" required=""
                                    lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo $reservation_address;?>">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="1">预约时间</th>
                        <td colspan="3" width="400">
                            <div class="layui-input-inline">
                                <input type="text" style="width:400px" name="reservation_addtime" required=""
                                    lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo $reservation_addtime;?>">
                            </div>
                        </td>
                    </tr>


                </tbody>
            </table>

            <input class="layui-btn" type="submit" name="传值" value="编辑预约" />




        </form>




    </div>

















</body>

</html>