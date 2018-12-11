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
		
		
        <style>
        	body{width:100%;height:100%;overflow: hidden;}
        </style>
	</head>

	<body>
		<!-- 头部 -->
		<?php include_once("php/header.php");?>
		
		<!--预约-->
		<div class="yuyue">
			<div class="yuyue1">
				<p><input type="text" placeholder="请填写您的姓名" name="name"></p>
				<p><input type="text" placeholder="请填写您的身份证号" name="idnum"></p>
				<p><input type="text" placeholder="请填写您的联系方式" name="phone"></p>
				<p><input style="color:#757575" type="text" value="趣猴杭州良渚店"disabled></p>
				<input style="display:none; "type="text" value="趣猴杭州良渚店" name="address" >
				<a href="javascript:void(0);" class="tj" id="book">提交</a>
				
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