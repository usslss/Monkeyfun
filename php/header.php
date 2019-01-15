<?php 
$class_about="";
$class_join="";
$class_news="";
$class_reservation="";
$class_roomtype="";
if ($page=='about'){$class_about="active";};
if ($page=='join'){$class_join="active";};
if ($page=='news'){$class_news="active";};
if ($page=='reservation'){$class_reservation="active";};
if ($page=='roomtype'){$class_roomtype="active";};


?>
<!-- 移动适配JS脚本 -->
<!-- 
	<script type="text/javascript">
    if (window.location.toString().indexOf('pref=padindex') != -1) {
    } else {
        if (/AppleWebKit.*Mobile/i.test(navigator.userAgent) || /\(Android.*Mobile.+\).+Gecko.+Firefox/i.test(navigator.userAgent) || (/MIDP|SymbianOS|NOKIA|SAMSUNG|LG|NEC|TCL|Alcatel|BIRD|DBTEL|Dopod|PHILIPS|HAIER|LENOVO|MOT-|Nokia|SonyEricsson|SIE-|Amoi|ZTE/.test(navigator.userAgent))) {
            if (window.location.href.indexOf("?mobile")<0){
                try {
                    if (/Android|Windows Phone|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
                        window.location.href="/wap/<?php echo $page;?>";
                    } else if (/iPad/i.test(navigator.userAgent)) {
                        //window.location.href="/wap/"
                    } else {
                        window.location.href="/wap/<?php echo $page;?>"
                    }
                } catch (e) {}
            }
        }
    }
</script>
 --> 
<div class="header">
			<div class="w-1200">
				<div class="logo floatL">
					<a href="index.php"><img src="images/logo.png"></a>
				</div>
				<div class="nav floatR">
					<ul>
						<li class="<?php echo $class_about;?>">
							<a href="about.php">品牌介绍</a>
						</li>
						<li class="<?php echo $class_join;?>">
							<a href="join.php">加盟合作</a>
						</li>
						<li class="<?php echo $class_news;?>">
							<a href="news.php">最新资讯</a>
						</li>
						<li class="<?php echo $class_roomtype;?>">
							<a href="roomtype.php">房间类型</a>
						</li>
						<li class="<?php echo $class_reservation;?>">
							<a href="reservation.php">预约入住</a>
						</li>
					</ul>
				</div>
			</div>
		</div>