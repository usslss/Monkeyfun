<?php
include_once("../connect.php");

$process="预约中";

@$name = htmlspecialchars(trim($_POST['name']));
@$idnum = htmlspecialchars(trim($_POST['idnum']));
@$phone = htmlspecialchars(trim($_POST['phone']));
@$address = htmlspecialchars(trim($_POST['address']));



//各项数值判断                加入一个人重复订阅的判断加入一个人重复订阅的判断加入一个人重复订阅的判断加入一个人重复订阅的判断加入一个人重复订阅的判断加入一个人重复订阅的判断

$checkphone='/^1\d{10}$/';
$checkidnum='/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$|^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/';

$checkname='';

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


$sqlRepeatIdnumCheck=mysqli_query($link,"select count(*) from reservation WHERE idnum='{$idnum}'");
$RepeatIdnumCheck=mysqli_fetch_array($sqlRepeatIdnumCheck);
if($RepeatIdnumCheck[0]!=0){
    echo "已有身份证记录";
    exit;
}


$sql=mysqli_query($link,"insert into reservation(name,idnum,phone,address,process)values('$name','$idnum','$phone','$address','$process')");
$result="提交成功";
mysqli_close($link);
echo $result;
?>