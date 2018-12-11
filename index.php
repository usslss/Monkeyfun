<?php 
include_once "php/connect.php";
$page="index";
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
		<!-- banner -->
		<div class="banner">
			<ul>
				<li><img src="images/banner1.jpg"></li>
				<li><img src="images/banner2.jpg"></li>
			</ul>
			<div class="wz wow fadeIn" data-wow-delay="1.0s">
				<p>来这里邂逅有趣生活</p>
				<a href="reservation.php">即刻入住</a>
			</div>
			<a href="javascript:void(0)" class="down"><img src="images/down.png"></a>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.banner').imgtransition({
					speed: 5000, //图片切换时间
					animate: 3000 //图片切换过渡时间
				});
			});
		</script>

		<!--mian-->
		<div class="mian">
			<div class="index-pro">
				<div class="title">给你一个最有创意的生活空间<span>/Give you the most creative living space</span></div>
				<div class="zb floatL">
					<p class="en1 text-r">apartment</p>
					<p class="cn1 text-r">公寓</p>
					<p class="cn2 text-r">大床间</p>
					<p class="en2 text-r">Big bed room</p>
					<div class="pro-img1 floatR"><img src="images/index-pro1.jpg" class="img-hv"></div>
					<p class="en1 ">apartment</p>
					<p class="cn1 ml365">公寓</p>
					<p class="cn2 ml365">多人间</p>
					<p class="en2 ml365">More human</p>
					<div class="pro-img2 floatR"><img src="images/index-pro2.jpg" class=" img-hv"></div>
					<p class="en1 ">Dormitory</p>
					<p class="cn1 ml365">宿舍</p>
					<p class="cn2 ml365">单人隔间</p>
					<p class="en2 ml365">single room</p>
					<div class="pro-img3 floatR"><img src="images/index-pro3.jpg" class="img-hv"></div>
				</div>
				<div class="yb floatR">
					<div class="pro-img4 floatL"><img src="images/index-pro4.jpg" class="img-hv"></div>
					<div class="pro-img5 floatL"><img src="images/index-pro5.jpg" class="img-hv"></div>
					<p class="en1 text-r">apartment</p>
					<p class="cn1 mr235 text-r">公寓</p>
					<p class="cn2 mr235 text-r">大床间</p>
					<p class="en2 mr235 text-r">Big bed room</p>
					<div class="pro-img6 floatL"><img src="images/index-pro6.jpg" class="img-hv"></div>
					<div class="pro-img7 floatL"><img src="images/index-pro7.jpg" class="img-hv"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="index-pro1">
				<div class="title1">水吧台/自动售货机<span>Water bar / vending machine</span></div>
				<div class="imgc">
					<img src="images/index-pro8.jpg">
				</div>
				<div class="title1">健身/休闲角<span>Fitness / leisure corner</span></div>
				<div class="imgc">
					<img src="images/index-pro9.jpg">
				</div>
			</div>
			<div class="shequ w-1200">
				<div class="title">趣猴社区<span>/QuHou Community</span></div>
				<ul>
					<li>
						<img src="images/icon1.png">
						<h3>多房型</h3>
						<p>多种房型满足不同<br>人群所需</p>
					</li>
					<li>
						<img src="images/icon2.png">
						<h3>够便利</h3>
						<p>多业态服务内容：便利店<br>与水吧满足日常生活所需</p>
					</li>
					<li>
						<img src="images/icon3.png">
						<h3>可存放</h3>
						<p>为房客提供专属<br>存放空间</p>
					</li>
					<li>
						<img src="images/icon4.png">
						<h3>带专人</h3>
						<p>管家服务为住客提供<br>贴心管理，让居住<br>更省心</p>
					</li>
					<li>
						<img src="images/icon5.png">
						<h3>全功能</h3>
						<p>公共区域设置娱乐<br>健身中心等，让生活<br>更精彩</p>
					</li>
					<li>
						<img src="images/icon6.png">
						<h3>玩社交</h3>
						<p>定期组织社区主题活动<br>住客交流情感，活跃<br>居住气氛</p>
					</li>
					<div class="clearfix"></div>
				</ul>
			</div>
			<!--社区新闻 Community News-->
			<?php include_once("php/index/community_news.php");?>
			<script type="text/javascript">
				$('.index-news li').hover(
					function() {
						$(this).addClass('active')
					},
					function() {
						$(this).removeClass('active')
					}
				)
			</script>

			<div class="index-bj w-1200">
				<div class="title">全国布局<span>/national layout</span></div>
				<img src="images/bj.jpg">
			</div>
		</div>

		<!--底部-->
		<?php include_once("php/footer.php");?>	

	</body>

</html>

<?php
mysqli_close($link);
?>