<?php
include_once("../connect.php");

@$name = htmlspecialchars(trim($_POST['name']));
@$idnum = htmlspecialchars(trim($_POST['idnum']));



//各项数值判断                加入一个人重复订阅的判断加入一个人重复订阅的判断加入一个人重复订阅的判断加入一个人重复订阅的判断加入一个人重复订阅的判断加入一个人重复订阅的判断

$checkidnum='/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$|^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/';

if(empty($name)){
    echo "请填写您的姓名!";
    exit;
}

if(empty($idnum)){
    echo "请填写您的身份证号!";
    exit;
}

if(preg_match($checkidnum,$idnum)){
} else{
    echo "身份证格式错误！";
    exit;
}



//$sql=mysqli_query($link,"insert into reservation(name,idnum,phone,address,process)values('$name','$idnum','$phone','$address','$process')");
$result="进行搜索";
mysqli_close($link);
echo $result;
?>