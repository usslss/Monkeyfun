<?php

//检索房间列表
$sql_roomtype = "SELECT * FROM roomtype";
$result = mysqli_query($link, $sql_roomtype);
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $roomTypeArr[$i]["room_type"] = $row["room_type"];
    $roomTypeArr[$i]["room_empty"] = $row["room_empty"];
    $roomTypeArr[$i]["room_unit"] = $row["room_unit"];
    $roomTypeArr[$i]["room_rent"] = $row["rent"];
    $i++;
}
$roomtype_sum = $i;

//检索展示的三个页面
$sql_roomshow = "SELECT * FROM roomtype WHERE room_show = 1 ";
$result = mysqli_query($link, $sql_roomshow);
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $roomShowArr[$i]["room_type"] = $row["room_type"];
    $roomShowArr[$i]["room_img_url"] = $row["room_img_url"];
    $roomShowArr[$i]["room_rent"] = $row["rent"];
	$i++;
}
?>
		<div class="room layout">
			<div class="r-title"><img src="images/room-title.png"></div>
			<div class="xz">
				<a href="">房型</a>
				<a href="">可预订</a>
				<a href="">租金</a>
			</div>
			<ul class="jg">
<?php
for ($i = 0; $i < $roomtype_sum; $i++) {
    //如果对标题的长度有限制
    //$news_title_short=mb_substr($roomTypeArr[$i]["news_title"],0,22,'utf-8');
    echo <<< EOT
				<li>
					<span>{$roomTypeArr[$i]["room_type"]}</span>
					<span>{$roomTypeArr[$i]["room_empty"]}{$roomTypeArr[$i]["room_unit"]}</span>
					<span>{$roomTypeArr[$i]["room_rent"]}元/月</span>
				</li>
EOT;
}
?>
			</ul>
			<ul class="lx">
<?php
for ($i = 0; $i < 3; $i++) {
    //如果对标题的长度有限制
    //$news_title_short=mb_substr($roomTypeArr[$i]["news_title"],0,22,'utf-8');
    echo <<< EOT
				<li>
					<div class="img">
						<a href="javascript:void(0)"><img src="{$roomShowArr[$i]["room_img_url"]}"></a>
					</div>
					<div class="word">
						<p>趣猴青年公寓——{$roomShowArr[$i]["room_type"]}</p>
						<span>{$roomShowArr[$i]["room_rent"]}<b>元/月</b></span>
					</div>
				</li>		
EOT;
}
?>			
				<div class="clear"></div>
			</ul>
		</div>		