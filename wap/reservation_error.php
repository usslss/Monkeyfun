<?php 
include_once "php/connect.php";
$page="reservation";
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
		<style>
        	body{width:100%;height:100%;overflow: hidden;}
        </style>
	</head>

	<body>
		<!--头部-->
		<?php include_once("php/header.php");?>
			
		<!--预约-->
		<div class="yuyue">
            <div class="yuyue2">
				<img src="images/reservation_error.png">
				<p>您的身份证信息已有预约记录，<br>请耐心等待趣猴管家的处理！</p>
			</div>

			<a href="reservation_search.php" class="cx">
				<img src="images/chaxun.png">
				<span>查询预约</span>
			</a>
		</div>

		
		
	</body>

</html>

<?php
mysqli_close($link);
?>