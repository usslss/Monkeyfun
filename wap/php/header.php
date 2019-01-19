<!-- 移动适配JS脚本 -->

	<script type="text/javascript">
    if(!(/(android|iphone|ipad|PlayBook|BB10)/i).test(window.navigator.userAgent)){
        window.location.href = '../';
    }
</script>
							
		<header>
			<nav>
				<img src="images/nav.png">
			</nav>
			<div class="logo">
				<a href="index.php"><img src="images/logo.png"></a>
			</div>
		</header>
		<div class="xl-nav">
			<ul>
				<li>
					<a href="about.php">品牌介绍</a>
				</li>
				<li>
					<a href="join.php">加盟合作</a>
				</li>
				<li>
					<a href="news.php">最新资讯</a>
				</li>
				<li>
					<a href="roomtype.php">房间类型</a>
				</li>
				<li>
					<a href="reservation.php">预约入住</a>
				</li>
			</ul>
		</div>
		<script type="text/javascript">
			$(function() {

				$("nav").click(function() {

					var flag = $(".xl-nav").is(":hidden");

					if(flag) {
						//show() 方法: 使隐藏的变为显示
						$(".xl-nav").slideDown();
					} else {
						$(".xl-nav").slideUp();
					}
				});
			});
		</script>		