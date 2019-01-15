<?php 
include_once "php/connect.php";
$page="roomtype";
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

	</head>

	<body>
		<!-- 头部 -->
		<?php include_once("php/header.php");?>	

		<!-- 内页banner -->
		<div class="ny-banner">
			<img src="images/room-banner.jpg" class="ny-bg" alt="趣猴——外观设计" title="趣猴——外观设计">
			<a href="javascript:void(0)" class="down"><img src="images/down.png" alt="趣猴——创意图" title="趣猴——创意图"></a>
			<div class="wz wow fadeIn" data-wow-delay="1.0s">
				<p>在趣猴生活的房间</p>
				<span>Monkeyfun Living room</span>
			</div>
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