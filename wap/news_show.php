<?php
include_once "php/connect.php";
$page="news";

if (isset($_POST["news_id"])){
    $news_id=$_POST["news_id"];
}

if (isset($_GET["news_id"])){
    $news_id=$_GET["news_id"];
}


//本条新闻内容
$sql_hot="SELECT * FROM news WHERE news_id='{$news_id}'";
$result=mysqli_query($link, $sql_hot);

while ($row=mysqli_fetch_assoc($result)){
    $show_news_class=$row["news_class"];
    $show_news_title=$row["news_title"];
    $show_news_summary=$row["news_summary"];
    $show_news_source=$row["news_source"];
    $show_news_click=$row["news_click"];
    $arr_news_label=explode('_',$row["news_label"]);
    $show_news_all=$row["news_all"];
    $show_news_img_url=$row["news_img_url"];
    $show_news_addtime=substr($row["news_addtime"],0,20);
    
}

//标签label
$show_news_label="";
foreach ($arr_news_label as $label) {
    $show_news_label = $show_news_label."&lt;".$label."&gt;";
}

//关键词 标题 description
$sql_key="SELECT * FROM page WHERE page_class='{$page}_{$website}'";

$result=mysqli_query($link, $sql_key);

while ($row=mysqli_fetch_assoc($result)){
    $page_title=$row["page_title"];
    $page_keywords=$row["page_keywords"];
    $page_description=$row["page_description"];
}

$show_news_click=$show_news_click+1;
$sql_click="UPDATE news SET news_click={$show_news_click} WHERE news_id='{$news_id}'";

$result=mysqli_query($link, $sql_click);



//上一条新闻
$sql_prev="SELECT * FROM news WHERE news_id<{$news_id} AND news_class='{$show_news_class}' ORDER BY news_id DESC LIMIT 1";
$result=mysqli_query($link, $sql_prev);
while ($row=mysqli_fetch_assoc($result)){
    $prev_news_id=$row["news_id"];
    //$prev_news_url="news_show_".$row["news_id"].".html";
    $prev_news_url="news_show.php?news_id=".$row["news_id"];
    $prev_news_title="<span>&lt;</span>".mb_substr($row["news_title"],0,20,"utf-8");
}
if ((isset($prev_news_id)==false)){
    $prev_news_id="无内容";
    $prev_news_url="#";
    $prev_news_title="没有了";
}


//下一条新闻
$sql_next="SELECT * FROM news WHERE news_id>{$news_id} AND news_class='{$show_news_class}' ORDER BY news_id ASC LIMIT 1";
$result=mysqli_query($link, $sql_next);
while ($row=mysqli_fetch_assoc($result)){
    $next_news_id=$row["news_id"];
    //$next_news_url="news_show_".$row["news_id"].".html";
    $next_news_url="news_show.php?news_id=".$row["news_id"];
    $next_news_title=mb_substr($row["news_title"],0,20,"utf-8")."<span>&gt;</span>";
}

if ((isset($next_news_id)==false)){
    $next_news_id="无内容";
    $next_news_url="#";
    $next_news_title="没有了";
}

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
		<title><?php echo $page_title;?> - <?php echo $show_news_title;?></title>
		<meta name="keywords" content="<?php echo $page_keywords;?>" />
		<meta name="description" content="<?php echo $page_description;?>">
		<link rel="stylesheet" href="css/swiper.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/phone.js"></script>
		<script type="text/javascript" src="js/swiper.min.js"></script>
	</head>

	<body>
		<!--头部-->
		<?php include_once("php/header.php");?>	
	
		<!--新闻banner-->
		<div class="news-banner">
			<div class="news-title">
				<p>趣猴资讯</p>
			</div>
		</div>
		
		<div class="news-show layout">
			<div class="news-show-title"><h1><?php echo $show_news_title;?></h1></div>
			<div class="show-cd">
				<ul>
					<li>新闻媒体：<?php echo $show_news_source;?></li>
					<li>浏览<?php echo $show_news_click;?>次</li>
					<li><?php echo $show_news_addtime;?></li>
					<div class="clear"></div>
				</ul>
			</div>
			<div class="news-show-d">
				<?php echo $show_news_all;?> 
			</div>
			<!--  待定设计 
			<div class="wz-bq">
				文章标签：<?php echo $show_news_label;?>
			</div>
			-->
			<div class="wz-bq">
				分享地址：<a href="">http://www.miaocafe.net/info/detail-405.html</a>
			</div>
			<div class="next">
				<a href="<?php echo $prev_news_url;?>"><?php echo $prev_news_title;?></a>
				<a href="<?php echo $next_news_url;?>"><?php echo $next_news_title;?></a>
				<div class="clearfix"></div>
			</div>
		</div>

		
		<!--底部-->
		<?php include_once("php/footer.php");?>	
		
	</body>

</html>

<?php
mysqli_close($link);
?>