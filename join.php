<?php 
include_once "php/connect.php";
$page="join";
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<?php include_once("php/keywords.php");?>
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="css/swiper.min.css">
		<link rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/banner.js"></script>
		<script type="text/javascript" src="js/wow.min.js"></script>
		<script>
			if(!(/msie [6|7|8|9]/i.test(navigator.userAgent))) {
				new WOW().init();
			};

		//底部留言框
		$(function(){
		 $("#msg").click(function(){
		  var cont1 = $("input").serialize();
		  $.ajax({
		   url:'php/join/msg.php',
		   type:'post',
		   dataType:'text',
		   data:cont1,
		   success:function(result){
		       alert(result);           
		}
		  
		  });
		 });  
		});
		</script>

	</head>

	<body>
		<!-- 头部 -->
		<?php include_once("php/header.php");?>	
		<!-- 内页banner -->
		<div class="ny-banner">
			<img src="images/join-banner.jpg" class="ny-bg">
			<a href="javascript:void(0)" class="down"><img src="images/down.png"></a>
			<div class="wz wow fadeIn" data-wow-delay="1.0s">
				<p>成为趣猴的加盟合作伙伴</p>
				<span>Become a partner in monkeyfun</span>
			</div>
		</div>
		<!--加盟-->
		<div class="join-adv w-1200">
			<div class="join-title">
				<h3>加盟优势</h3>
				<p>Join the advantage</p>
			</div>
			<ul>
				<li>
					<img src="images/join-icon1.png">
					<p>多业态支持</p>
					<span>输出自动收货机、水吧台、存放柜机、洗衣房等<br>多种业态运营方式</span>
				</li>
				<li>
					<img src="images/join-icon2.png">
					<p>标准化输出</p>
					<span>从效果图—施工图—工程监理—物资采购，<br>实现标准化输出与管理</span>
				</li>
				<li>
					<img src="images/join-icon3.png">
					<p>社群管理支持</p>
					<span>定期输出青年社群管理经验与心得，大型营销活动<br>联动宣发，青年社群</span>
				</li>
				<li>
					<img src="images/join-icon4.png">
					<p>最大化价值</p>
					<span>结合物业条件合理规划公寓与宿所得设计配比，<br>确保每一寸空间都物尽其用</span>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		
		<div class="join-lc">
			<div class="join-title">
				<h3>加盟合作流程</h3>
				<p>Franchisee cooperation process</p>
			</div>
			
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="bg">
							<img src="images/join-lc1.jpg">
						</div>
						<div class="wz">
							<h4><span>1.</span>加盟者提出加盟意向</h4>
							<p>通过公众号、加盟热线或者加盟代理等多种渠道</p>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="bg">
							<img src="images/join-lc2.jpg">
						</div>
						<div class="wz">
							<h4><span>2.</span>团队与加盟者接洽</h4>
							<p>了解加盟者自身情况与对应项目物业条件</p>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="bg">
							<img src="images/join-lc3.jpg">
						</div>
						<div class="wz">
							<h4><span>3.</span>加盟可行性分析</h4>
							<p>团队分析加盟者项目条件，并出具加盟报告和实施方案</p>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="bg">
							<img src="images/join-lc4.jpg">
						</div>
						<div class="wz">
							<h4><span>4.</span>项目决策审核通过</h4>
							<p>项目可行性中和评估通过</p>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="bg">
							<img src="images/join-lc5.jpg">
						</div>
						<div class="wz">
							<h4><span>5.</span>签订合同缴纳加盟金</h4>
							<p>一次性缴纳合同约定费用</p>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="bg">
							<img src="images/join-lc6.jpg">
						</div>
						<div class="wz">
							<h4><span>6.</span>空间筹备</h4>
							<p>专业工程人员提供专业指导、检查、咨询、督促</p>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="bg">
							<img src="images/join-lc7.jpg">
						</div>
						<div class="wz">
							<h4><span>7.</span>人员培训运营筹备</h4>
							<p>培训相关店长、店员，协助完成开业前各项工作</p>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="bg">
							<img src="images/join-lc8.jpg">
						</div>
						<div class="wz">
							<h4><span>8.</span>开业运营</h4>
							<p>配合加盟商完成开业，以及日常运营事宜</p>
						</div>
					</div>
					
				</div>
				
				<!-- Add Arrows -->
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>

			<!-- Swiper JS -->
			

			<!-- Initialize Swiper -->
			<script>
				var swiper = new Swiper('.swiper-container', {
					slidesPerView: 1,
					spaceBetween: 30,
					loop: true,
					navigation: {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev',
					},
				});
			</script>
		</div>
		
		<div class="join-ly">
			<div class="join-title">
				<h3>填写加盟合作信息</h3>
				<p>Fill in the cooperation information</p>
			</div>
			<div class="ly">
				<input type="text" placeholder="请填写您的姓名" name="name">
				<input type="text" placeholder="请填写您的联系方式" name="phone">
				<input type="text" placeholder="请填写您所在的城市" name="address">
				<a href="javascript:void(0);" class="tj" id="msg">提交</a>
			</div>
		</div>
		<!--底部-->
		<?php include_once("php/footer.php");?>	

	</body>

</html>

<?php
mysqli_close($link);
?>