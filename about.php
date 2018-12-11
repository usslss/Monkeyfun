<?php 
include_once "php/connect.php";
$page="about";
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
			<img src="images/about-banner.jpg" class="ny-bg">
			<a href="javascript:void(0)" class="down"><img src="images/down.png"></a>
			<div class="wz wow fadeIn" data-wow-delay="1.0s">
				<p>了解趣猴的缘起/介绍</p>
				<span>Know the origin/introduction of monkeyfun</span>
			</div>
		</div>
		<!--关于我们-->
		<div class="about w-1200">
			<div class="about-z floatL">
				<h3>年轻人的第一套租赁公寓/宿所</h3>
				<span>Be the first rental apartment/accommo dation for young people</span>
				<p>从这个命题出发,<br> 凌睿集团走访与研究了国内外多
					<br> 个青年公寓品牌产品，采访了百
					<br> 名应届毕业生，聆听他们的心声
					<br> 与需求，尝试了近三十种室内
					<br> 设计方案。最终决定做
					<br> 趣猴这一品牌产品.
				</p>
				<div class="about-img1">
					<img src="images/about2.jpg">
				</div>
			</div>
			<div class="about-y floatR">
				<div class="about-img2">
					<img src="images/about1.jpg">
					<div class="clearfix"></div>
				</div>
				<h3>新青年灵感生活社区</h3>
				<span>New youth inspiration living community</span>
				<p>面向都市新青年,个性居住<br> 空间租赁服务的连锁公寓产品
					<br> 满足单人+多人中长期具备
					<br> 性价比的居住需求.以实
					<br> 惠的租金设计、丰富的
					<br> 个性房型、体贴的管家
					<br> 服务、有趣的空间陈
					<br> 列、完善的公共配套.
				</p>
			</div>
			<div class="clearfix"></div>
			<div class="about-img3">
				<img src="images/about3.jpg">
			</div>
			<img src="images/about4.jpg" style="width:870px;height:56px;margin:40px auto;display:block;">
		</div>
		<!--底部-->
		<?php include_once("php/footer.php");?>
		
	</body>

</html>

<?php
mysqli_close($link);
?>