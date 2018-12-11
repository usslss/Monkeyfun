<?php 
include_once "php/connect.php";
$page="news";
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

		<!--新闻banner-->
		<?php include_once("php/news/news_list.php");?>
		
		<!--底部-->
		<?php include_once("php/footer.php");?>	
		
	</body>

</html>

<?php
mysqli_close($link);
?>