<?php
include "php/connect.php";

$reservation_id = $_POST["reservation_id"];
$reservation_name = htmlspecialchars($_POST["reservation_name"]);
$reservation_idnum = htmlspecialchars($_POST["reservation_idnum"]);
$reservation_phone = htmlspecialchars($_POST["reservation_phone"]);
$reservation_address = htmlspecialchars($_POST["reservation_address"]);
$reservation_process = htmlspecialchars($_POST["reservation_process"]);
$reservation_addtime = htmlspecialchars($_POST["reservation_addtime"]);
$reservation_roomtype = htmlspecialchars($_POST["reservation_roomtype"]);
$reservation_roomtype_before = htmlspecialchars($_POST["reservation_roomtype_before"]);

$sql_reservation = "UPDATE reservation SET name='{$reservation_name}', idnum='{$reservation_idnum}', phone='{$reservation_phone}', address='{$reservation_address}', process='{$reservation_process}', addtime='{$reservation_addtime}',roomtype='{$reservation_roomtype}' WHERE id='{$reservation_id}'";

$sql_reservation_finish = mysqli_query($link, $sql_reservation);

if ($reservation_roomtype != $reservation_roomtype_before) {

//之前房型数量处理
    $sql_room = "SELECT * FROM roomtype WHERE room_type='{$reservation_roomtype_before}'";
    $result = mysqli_query($link, $sql_room);
    while ($row = mysqli_fetch_assoc($result)) {
        $room_reserved = $row["room_reserved"];
        $room_empty = $row["room_empty"];
    }

    $room_reserved = $room_reserved - 1;
    $room_empty = $room_empty + 1;
    $sql_room = mysqli_query($link, "UPDATE roomtype SET room_reserved='$room_reserved',room_empty='$room_empty' WHERE room_type='$reservation_roomtype_before'");
//新房型数量处理
    $sql_room = "SELECT * FROM roomtype WHERE room_type='{$reservation_roomtype}'";
    $result = mysqli_query($link, $sql_room);
    while ($row = mysqli_fetch_assoc($result)) {
        $room_reserved = $row["room_reserved"];
        $room_empty = $row["room_empty"];
    }

    $room_reserved = $room_reserved + 1;
    $room_empty = $room_empty - 1;
    $sql_room = mysqli_query($link, "UPDATE roomtype SET room_reserved='$room_reserved',room_empty='$room_empty' WHERE room_type='$reservation_roomtype'");
}
echo "修改预约信息成功";

mysqli_close($link);
