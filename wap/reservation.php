<?php 
include_once "php/connect.php";
$page="reservation";
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
		<script>
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
		<!--头部-->
		<?php include_once("php/header.php");?>	

		<!-- banner -->
		<div class="yuyuec-banner">
			<div class="wz">
				<p>给你一个最有<br>创意的生活空间</p>

			</div>
			<a href="javascript:void(0)" class="down"><img src="images/down.png"></a>
		</div>
		
		<!--提交-->
		<input type="hidden" id="reservation_roomtype" name="reservation_roomtype" value=""/>
		<div class="tjyy layout">
			<div class="r-title"><img src="images/room-title.png"></div>
			<img src="images/tjyy.png" class="lw">
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
				<div class="clear"></div>
			</ul>
			<a href="roomtype.php" class="ck">返回查看房间类型</a>
			<a href="javascript:void(0);" class="tj" id="book">立即预约</a>
			<a href="" class="cx1">
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