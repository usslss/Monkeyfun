<?php
include("php/connect.php");

$reservation_id=$_POST["reservation_id"];
$reservation_name=htmlspecialchars($_POST["reservation_name"]);
$reservation_idnum=htmlspecialchars($_POST["reservation_idnum"]);
$reservation_phone=htmlspecialchars($_POST["reservation_phone"]);
$reservation_address=htmlspecialchars($_POST["reservation_address"]);
$reservation_process=htmlspecialchars($_POST["reservation_process"]);
$reservation_addtime=htmlspecialchars($_POST["reservation_addtime"]);





//$reservation_process=$_POST["reservation_process"];

$sql_reservation = "UPDATE reservation SET name='{$reservation_name}', idnum='{$reservation_idnum}', phone='{$reservation_phone}', address='{$reservation_address}', process='{$reservation_process}', addtime='{$reservation_addtime}' WHERE id='{$reservation_id}'";



$sql_reservation_finish = mysqli_query($link,$sql_reservation);
echo "修改预约信息成功";





mysqli_close($link);
?>