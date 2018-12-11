<?php 
include_once "php/connect.php";
$page="index";
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
		<div class="swiper-container banner">
			<div class="wz">
				<p>来这里邂逅<br>有趣生活</p>
				<a href="reservation.php" class="yuyuec">即刻入住</a>
			</div>
			<div class="swiper-wrapper">
				<?php include_once("php/index/index_banner.php");?>
			</div>
			<a href="javascript:void(0)" class="down"><img src="images/down.png"></a>
		</div>

		<!-- Swiper JS -->
		<script src="js/swiper.min.js"></script>

		<!-- Initialize Swiper -->
		<script>
			var swiper = new Swiper('.banner', {
				spaceBetween: 30,
				centeredSlides: true,
				loop: true,
				autoplay: {
					delay: 5000,
					disableOnInteraction: false,
				},

			});
		</script>
		<!--首页主要内容-->
		<div class="main">
			<div class="index-pro layout">
				<div class="title">给你一个最有创意的生活空间<span>Give you the most creative living space</span></div>
				<h4>大床间</h4>
				<img src="images/index-pro1.jpg">
				<img src="images/index-pro2.jpg">
				<h4>多人间</h4>
				<img src="images/index-pro3.jpg">
				<h4>洗漱间</h4>
				<img src="images/index-pro4.jpg">
				<h5>单人隔间</h5>
				<img src="images/index-pro5.jpg">
				<img src="images/index-pro6.jpg">
				<h5>水吧台/自动售货机</h5>
				<img src="images/index-pro7.jpg">
				<h5>健身/休闲角</h5>
				<img src="images/index-pro8.jpg">
			</div>
			<div class="index-shequ layout">
				<div class="title">趣猴社区<span>QuHou Community</span></div>
				<ul>
					<li>
						<img src="images/icon1.png">
						<p>多房型</p>
					</li>
					<li>
						<img src="images/icon2.png">
						<p>够便利</p>
					</li>
					<li>
						<img src="images/icon3.png">
						<p>可存放</p>
					</li>
					<li>
						<img src="images/icon4.png">
						<p>全功能</p>
					</li>
					<li>
						<img src="images/icon5.png">
						<p>带专人</p>
					</li>
					<li>
						<img src="images/icon6.png">
						<p>玩社交</p>
					</li>
				</ul>
			</div>
			<!--社区新闻 Community News-->
			<?php include_once("php/index/community_news.php");?>
			
			<!--全国布局-->
			<div class="index-pj">
				<div class="title">全国布局<span>national layout</span></div>
				<img src="images/bj.jpg" class="img100">
			</div>
		</div>
		
		<!--底部-->
		<?php include_once("php/footer.php");?>	

	</body>

</html>

<?php
mysqli_close($link);
?>