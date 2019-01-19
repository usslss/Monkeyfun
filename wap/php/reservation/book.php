<?php
include_once("../connect.php");

$process="预约中";
$address="趣猴杭州良渚店";
@$name = htmlspecialchars(trim($_POST['name']));
@$idnum = htmlspecialchars(trim($_POST['idnum']));
@$phone = htmlspecialchars(trim($_POST['phone']));
@$reservation_roomtype = htmlspecialchars(trim($_POST['reservation_roomtype']));



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


if (empty($reservation_roomtype)) {
    echo "请选择您的房型!";
    exit;
}

//指定房型信息

$sql_room = "SELECT * FROM roomtype WHERE room_type='{$reservation_roomtype}'";
$result = mysqli_query($link, $sql_room);

while ($row = mysqli_fetch_assoc($result)) {

    $room_type = $row["room_type"];
    $room_reserved = $row["room_reserved"];
    $room_checked = $row["room_checked"];
    $room_empty = $row["room_empty"];
    $room_all = $row["room_all"];

}

if ($room_empty == 0) {
    echo "该房型已满,请选择其他房型!";
    exit;
}

$sqlRepeatIdnumCheck=mysqli_query($link,"select count(*) from reservation WHERE idnum='{$idnum}'");
$RepeatIdnumCheck=mysqli_fetch_array($sqlRepeatIdnumCheck);
if($RepeatIdnumCheck[0]!=0){
    echo "已有身份证记录";
    exit;
}

$room_reserved = $room_reserved + 1;
$room_empty = $room_empty - 1;

$sql_room = mysqli_query($link, "UPDATE roomtype SET room_reserved='$room_reserved',room_empty='$room_empty' WHERE room_type='$room_type'");
$sql=mysqli_query($link,"insert into reservation(name,idnum,phone,address,process,roomtype)values('$name','$idnum','$phone','$address','$process','$room_type')");
$result="提交成功";
mysqli_close($link);
echo $result;
?>