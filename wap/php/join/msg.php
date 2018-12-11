<?php 
include_once("../connect.php");

$clickplace="在线留言页面";
$source=$website;

@$name = htmlspecialchars(trim($_POST['name']));
@$phone = htmlspecialchars(trim($_POST['phone']));
@$address = htmlspecialchars(trim($_POST['address']));


$msg="地址:".$address;


//各项数值判断

$checkphone=' /^1\d{10}$/';



if(empty($name)){
    echo "请填写您的姓名!";
    exit;
}

if(empty($phone)){
    echo "请填写您的手机号!";
    exit;
}

if(preg_match($checkphone,$phone)){
} else{
    echo "手机格式错误！";
    exit;
}


$sql=mysqli_query($link,"insert into msg(name,phone,question,source,clickplace)values('$name','$phone','$msg','$source','$clickplace')");
$result="提交成功";
mysqli_close($link);
echo $result;
?>