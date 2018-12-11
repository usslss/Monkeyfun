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
				       var a = document.getElementById("name");
				       var b = document.getElementById("idnum");
				       window.location.href="reservation_search_result.php?"+"name="+a.value+"&idnum="+b.value;
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
		<!-- 头部 -->
		<?php include_once("php/header.php");?>
		
		<!--预约-->
		<div class="yuyue">
			<div class="yuyue3">
				
				<p><input type="text" placeholder="请填写您的姓名" name="name" id="name"></p>
				<p><input type="text" placeholder="请填写您的身份证号" name="idnum" id="idnum"></p>
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