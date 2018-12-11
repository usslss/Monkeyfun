<?php 
include_once "php/connect.php";
$page="reservation";

$search_phone=$_GET["phone"];
$search_address=$_GET["address"];

//搜索
$sql_search="SELECT * FROM reservation WHERE phone='{$search_phone}' AND address='{$search_address}'";
$result=mysqli_query($link, $sql_search);

$i=0;

while (($row=mysqli_fetch_assoc($result))!=false){
    
    $res_arr[$i]["id"] = $row["id"];
    $res_arr[$i]["name"] = $row["name"];
    $res_arr[$i]["idnum"] = $row["idnum"];
    $res_arr[$i]["phone"] = $row["phone"];
    $res_arr[$i]["address"] = $row["address"];
    $res_arr[$i]["process"] = $row["process"];
    $res_arr[$i]["addtime"] = $row["addtime"];
    
    $i++;
    
}
$search_sum=$i;

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
		<style>
        	body{width:100%;height:100%;overflow: hidden;}
        </style>
	</head>

	<body>
		<!--头部-->
		<?php include_once("php/header.php");?>	
				
		<!--预约-->
		<div class="yuyue">
			<div class="yuyue4">
				<div class="yuyue4-1">
					<ul>
<?php
if($search_sum==0){
echo <<< EOT
						<li>							
							<p>无搜索结果</p>
						</li>
EOT;
    
} else 
    
{
for ($i=0;($i<$search_sum);){
    //按要求修改一哈时间显示的格式
    $search_addtime=date('Y/m/d',strtotime($res_arr[$i]["addtime"]));
echo <<< EOT
						<li>
							<span>姓名</span>
							<p>{$res_arr[$i]["name"]}</p>
						</li>
						<li>
							<span>身份证号</span>
							<p>{$res_arr[$i]["idnum"]}</p>
						</li>
						<li>
							<span>手机号</span>
							<p>{$res_arr[$i]["phone"]}</p>
						</li>
						<li>
							<span>预约时间</span>
							<p>{$search_addtime}</p>
						</li>
						<li>
							<span>预约状态</span>
							<p>{$res_arr[$i]["process"]}</p>
						</li>
						<li>
							<span>预约门店</span>
							<p>{$res_arr[$i]["address"]}</p>
						</li>
EOT;
    $i=$i+1;
}

}
?>



					</ul>
					
				</div>
			</div>


<!-- 	 分页栏??????		
			<div class="fy">
				<a href="" class="fy-l"><img src="images/yuyue-left.png"></a>
				<a href="" class="cc">1</a>
				<a href="" class="fy-r"><img src="images/yuyue-right.png"></a>
			</div>
 -->			
		</div>

		
		
	</body>

</html>

<?php
mysqli_close($link);
?>