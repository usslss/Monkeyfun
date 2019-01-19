<?php 
include_once "php/connect.php";
$page="roomtype";
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<meta http-equiv="x-rim-auto-match" content="none" />
		<meta name="format-detection" content="telephone=no" />
		<?php include_once("php/keywords.php");?>	
		<link rel="stylesheet" href="css/swiper.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/phone.js"></script>
		<script type="text/javascript" src="js/swiper.min.js"></script>
	</head>

	<body>
		<!--头部-->
		<?php include_once("php/header.php");?>	

		<!-- banner -->
		<div class="room-banner">
			<div class="wz">
				<p>在趣猴生活的<br>房间</p>

			</div>
			<a href="javascript:void(0)" class="down"><img src="images/down.png"></a>
		</div>

		<!--房间类型-->
		<?php include_once("php/roomtype/roomtype_list.php");?>

		<!--底部-->
		<?php include_once("php/footer.php");?>	

	</body>

</html>

<?php
mysqli_close($link);
?>