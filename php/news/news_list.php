<?php
$news_class="趣猴新闻";

//单页显示的条数 推荐为3的倍数
$news_shownum=6;

//判断跳转的页数

if (isset($_GET["page"])){
    $page_jump=$_GET["page"];
    $news_start=($page_jump-1)*($news_shownum)+1;
} else {
    $page_jump=1;
    $news_start=1;
}


//按照时间顺序搜索 前 $news_shownum 条新闻

$news_shownum++;
$sql_new="SELECT * FROM news WHERE news_class='{$news_class}' ORDER BY news_addtime DESC ";

$result=mysqli_query($link, $sql_new);
$i=0;



while ($row=mysqli_fetch_assoc($result)){
    
    $newsarr[$i]["news_id"] = $row["news_id"];
    $newsarr[$i]["news_title"] = $row["news_title"];
    $newsarr[$i]["news_summary"] = $row["news_summary"];
    $newsarr[$i]["news_addtime_long"] = $row["news_addtime"];
    $newsarr[$i]["news_click"] = $row["news_click"];
    $newsarr[$i]["news_img_url"] = $row["news_img_url"];
    $newsarr[$i]["news_addtime"] = substr($row["news_addtime"],0,10);
    //根据伪静态的定义重写转向url
    $newsarr[$i]["news_url"] = "news/show_".$row["news_id"].".html";
    
    $i++;
    
    
}
$news_sum=$i;






?>
		<div class="news-banner">
			<div class="news-title">
				<p>趣猴资讯</p>
			</div>
		</div>									
<div class="news-list w-1200">
			<ul>

<?php
$news_shownum--;
for ($i=($news_start-1);(($i<($news_start+$news_shownum-1))&($i<$news_sum));){
    //如果对标题的长度有限制
    //$news_title_short=mb_substr($newsarr[$i]["news_title"],0,22,'utf-8');
    echo <<< EOT
				<li>
					<div class="wz">
						<h3><a href="{$newsarr[$i]["news_url"]}">{$newsarr[$i]["news_title"]}</a></h3>
						<p>
							<a href="{$newsarr[$i]["news_url"]}">{$newsarr[$i]["news_summary"]}</a>
						</p>
					</div>
					<div class="bg">
                        <div class="bg1"></div>
						<img src="{$newsarr[$i]["news_img_url"]}">
					</div>
				</li>
EOT;
    $i=$i+1;
}
?>
				
			</ul>
			<div class="clearfix"></div>
			<!-- 分页功能 -->
			<div class="fy">
				<?php 
				//分页 向前向后按钮

				$page_max=ceil($news_sum/$news_shownum);
				
				if($page_jump==1){
				    $page_jump_prev=1;
				    $img_url_prev="images/fy-no-left.png";
				    $href_url_prev="javascript:void(0)";
				    $style_prev="cursor:default;";
				    
				    $page_jump_next=$page_jump+1;
				    $img_url_next="images/fy-right.png";	
				    $href_url_next="news.php?page=".$page_jump_next;
				    $style_next="";
				} else if($page_jump>=$page_max){
				    $page_jump_prev=$page_jump_next=$page_jump-1;
				    $img_url_prev="images/fy-left.png";
				    $href_url_prev="news.php?page=".$page_jump_prev;
				    $style_prev=";";
				    
				    $page_jump_next=$page_max;
				    $img_url_next="images/fy-no-right.png";
				    $href_url_next="javascript:void(0)";
				    $style_next="cursor:default";
				}else {				    
				    $page_jump_prev=$page_jump_next=$page_jump-1;
				    $img_url_prev="images/fy-left.png";
				    $href_url_prev="news.php?page=".$page_jump_prev;
				    $style_prev="";

				    $page_jump_next=$page_jump+1;
				    $img_url_next="images/fy-right.png";
				    $href_url_next="news.php?page=".$page_jump_next;
				    $style_next="";
				}
				//只有一页的时候
				if($page_max==1){
				    $page_jump_prev=1;
				    $img_url_prev="images/fy-no-left.png";
				    $href_url_prev="javascript:void(0)";
				    $style_prev="cursor:default;";
				    
				    $page_jump_next=1;
				    $img_url_next="images/fy-no-right.png";
				    $href_url_next="javascript:void(0)";
				    $style_next="cursor:default;";
				}
				
				
				?>
				
				
				<a href="<?php echo $href_url_prev;?>" style="<?php echo $style_prev;?>" class="fy-l"><img src="<?php echo $img_url_prev;?>"></a>
				<a href="javascript:void(0)" style="cursor:default" class="cc"><?php echo $page_jump;?></a>
				<a href="<?php echo $href_url_next;?>" style="<?php echo $style_next;?>" class="fy-r"><img src="<?php echo $img_url_next;?>"></a>

			</div>
		</div>