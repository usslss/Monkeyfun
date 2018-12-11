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
			//搜索
			$(function(){
			 $("#search").click(function(){
			  var cont1 = $("input").serialize();
			  $.ajax({
			   url:'php/reservation/search.php',
			   type:'post',
			   dataType:'text',
			   data:cont1,
			   success:function(result){
				   if (result=="进行搜索"){
				       var a = document.getElementById("phone");
				       var b = document.getElementById("address");
				       window.location.href="reservation_search_result.php?"+"phone="+a.value+"&address="+b.value;
				   }
				   else{
					   alert(result);
				   }          
			}
			  
			  });
			 });  
			});
		</script>
		<style>
        	body{width:100%;height:100%;overflow: hidden;}
        </style>
	</head>

	<body>
		<!--头部-->
		<?php include_once("php/header.php");?>	
	
		<!--预约-->
		<div class="yuyue">
			<div class="yuyue3">
				
				<p><input type="text" placeholder="请填写您的联系方式" name="phone" id="phone"></p>
				<p><input type="text" placeholder="请填写您的预约城市" name="address" id="address"></p>
				<a href="javascript:void(0);" class="tj" id="search">查询预约</a>
				
			</div>
			<a href="reservation_search.php" class="cx">
				<img src="images/chaxun.png">
				<span>查询预约</span>
			</a>
		</div>

		
		
	</body>

</html>

<?php
mysqli_close($link);
?>