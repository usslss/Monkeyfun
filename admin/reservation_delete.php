<?php
include_once("php/connect.php");
//待加入对输入值的判断 和非中文的鉴定 重复文件的判断       数据库性死亡

$reservation_id=$_POST["reservation_id"];

$sql = "DELETE FROM reservation WHERE id = {$reservation_id}";


$sqlfinish = mysqli_query($link,$sql);

mysqli_close($link);





?>