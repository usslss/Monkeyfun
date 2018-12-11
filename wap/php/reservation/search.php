<?php
include_once("../connect.php");

@$phone = htmlspecialchars(trim($_POST['phone']));
@$address = htmlspecialchars(trim($_POST['address']));



//各项数值判断                加入一个人重复订阅的判断加入一个人重复订阅的判断加入一个人重复订阅的判断加入一个人重复订阅的判断加入一个人重复订阅的判断加入一个人重复订阅的判断

$checkphone='/^1\d{10}$/';

if(empty($phone)){
    echo "请填写您的手机号!";
    exit;
}

if(preg_match($checkphone,$phone)){
} else{
    echo "手机格式错误！";
    exit;
}

if(empty($address)){
    echo "请填写您的预约城市!";
    exit;
}


//$sql=mysqli_query($link,"insert into reservation(name,idnum,phone,address,process)values('$name','$idnum','$phone','$address','$process')");
$result="进行搜索";
mysqli_close($link);
echo $result;
?>