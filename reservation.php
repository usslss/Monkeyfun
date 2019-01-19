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
		    //点击给房间赋值
    		window.onload = function(){

            var aLi = $('.xzlx li');
            
            for (var i=0;i<aLi.length;i++){
                    (function(i){
                            aLi[i].onclick = function(){
                                    //alert(this.getAttribute("room_type"));
                                    $("#reservation_roomtype").val(this.getAttribute("room_type"));
                            };
                    })(i);
            }
            };
    
		//预约入住
		$(function(){
		 $("#book").click(function(){
		  var cont1 = $("input").serialize();
		  $.ajax({
		   url:'php/reservation/book.php',
		   type:'post',
		   dataType:'text',
		   data:cont1,
		   success:function(result){
			   if (result=="提交成功"){
				   window.location.href = "reservation_success.php"
			   }
			   else if(result=='已有身份证记录'){
				   window.location.href = "reservation_error.php"
				   }
			   else {
				   alert(result);
			   }          
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
			<img src="images/yuyue-bg.jpg" class="ny-bg" alt="趣猴——外观设计" title="趣猴——外观设计">
			<a href="javascript:void(0)" class="down"><img src="images/down.png" alt="趣猴——创意图" title="趣猴——创意图"></a>
			<div class="wz wow fadeIn" data-wow-delay="1.0s">
				<p>给你一个最有创意的生活空间</p>
				<span>Give you the most creative living space</span>
			</div>
		</div>

		<!--提交-->
		<input type="hidden" id="reservation_roomtype" name="reservation_roomtype" value=""/>
		<div class="tjyy w-1200">
			<div class="r-title"><img src="images/room-title.png"></div>
			<ul class="bd">
				<li>
					<span>姓名</span>
					<input type="text" placeholder="请输入您的姓名" name="name"/>
				</li>
				<li>
					<span>身份证号</span>
					<input type="text" placeholder="请输入您的身份证号" name="idnum"/>
				</li>
				<li>
					<span>手机号</span>
					<input type="text" placeholder="请输入您的手机号码" name="phone"/>
				</li>
				<div class="clearfix"></div>
			</ul>
			
			<ul class="xzlx">
				
				<span>选择房型</span>
				<li room_type="公寓A">
					<a href="javascript:void(0)">公寓A</a>
				</li>
				<li room_type="公寓B">
					<a href="javascript:void(0)">公寓B</a>
				</li>
				<li room_type="公寓C">
					<a href="javascript:void(0)">公寓C</a>
				</li>
				<li room_type="双人间">
					<a href="javascript:void(0)">双人间</a>
				</li>
				<li room_type="三人间">
					<a href="javascript:void(0)">三人间</a>
				</li>
				<li room_type="铺位">
					<a href="javascript:void(0)">铺位</a>
				</li>
				<div class="clearfix"></div>
			</ul>
			<a href="roomtype/" class="ck">返回查看房间类型</a>
			<img src="images/tjyy.png" class="lw">
			<a href="javascript:void(0);" class="tj" id="book">立即预约</a>
			<a href="reservation_search.php" class="cx1">
				<img src="images/chaxun1.png">
				<span>查询预约</span>
			</a>

		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				$(".xzlx li").click(function() {
					$(this).addClass("active");
					$(this).siblings().removeClass("active");
				});
			});
		</script>

		<!--底部-->
		<?php include_once("php/footer.php");?>	

	</body>

</html>

<?php
mysqli_close($link);
?>