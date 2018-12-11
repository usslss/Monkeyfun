<?php 
include_once "php/connect.php";
$page="about";
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
		<div class="about-banner">
			<div class="wz">
				<p>了解趣猴的<br>缘起/介绍</p>
				<span>Know the origin<br>introduction<br>of monkeyfun</span>
			</div>
			<a href="javascript:void(0)" class="down"><img src="images/down.png"></a>
		</div>

		<!--about-->
		<div class="about layout">
			<div class="about-tit">年轻人的第一套租赁公寓宿所</div>
			<dl>
				<dd>
					<p>从这个命题出发凌睿集团<br> 走访与研究了国内外多个
						<br> 青年公寓品牌产品，
						<br> 采访了百名应届毕
						<br> 业生，聆听他们的
						<br> 心声与需求，尝试
						<br> 了近三十种室内设
						<br> 计方案。最终决
						<br> 定做趣猴这一品
						<br> 牌产品.
					</p>
				</dd>
				<dd>
					<img src="images/about1.jpg">
				</dd>
			</dl>
			<div class="about-tit">新青年灵感生活社区</div>
			<dl>
				<dd>
					<img src="images/about2.jpg">
				</dd>
				<dd>
					<p>面向都市新青年,个性居住<br> 空间租赁服务的连锁公
						<br> 寓产品满足单人+多人
						<br> 中长期具备性价比的
						<br> 居住需求。以实惠的
						<br> 租金设计丰富的个性
						<br> 房型、体贴的管家服
						<br> 务、有趣的空间陈列
						<br> 完善的公共配套.
					</p>
				</dd>
			</dl>
			<img src="images/about3.png" class="mt60">
		</div>
		<?php include_once("php/footer.php");?>
		
	</body>

</html>