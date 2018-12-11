<?php 
include_once "php/connect.php";
$page="reservation";
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<?php include_once("php/keywords.php");?>
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/banner.js"></script>
		<script type="text/javascript" src="js/wow.min.js"></script>
		<script>
			if(!(/msie [6|7|8|9]/i.test(navigator.userAgent))) {
				new WOW().init();
			};
		</script>
        <style>
        	body{width:100%;height:100%;overflow: hidden;}
        </style>
	</head>

	<body>
		<!-- 头部 -->
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