<?php 
include_once "php/connect.php";
$page="reservation";

$search_name=$_GET["name"];
$search_idnum=$_GET["idnum"];



//搜索

$sql_search="SELECT * FROM reservation WHERE name='{$search_name}' AND idnum='{$search_idnum}'";
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
        <style>
        	body{width:100%;height:100%;overflow: hidden;}
        </style>
	</head>

	<body>
		<!-- 头部 -->
		<?php include_once("php/header.php");?>
		
		<!--预约-->
		<div class="yuyue">
			<div class="yuyue4 w-1200">
				<dl class="a1">
					<dd>姓名</dd>
					<dd>身份证号</dd>
					<dd>手机号</dd>
					<dd>预约时间</dd>
					<dd>预约状态</dd>
					<dd>预约门店</dd>
				</dl>			

<?php
if($search_sum==0){
echo <<< EOT
				<dl>
					<dd>无搜索结果</dd>
				</dl>
EOT;
    
} else 
    
{
for ($i=0;($i<$search_sum);){
    //按要求修改一哈时间显示的格式
    $search_addtime=date('Y/m/d',strtotime($res_arr[$i]["addtime"]));
echo <<< EOT
                <dl>
                    <dd>{$res_arr[$i]["name"]}</dd>
					<dd>{$res_arr[$i]["idnum"]}</dd>
					<dd>{$res_arr[$i]["phone"]}</dd>
					<dd>{$search_addtime}</dd>
					<dd>{$res_arr[$i]["process"]}</dd>
					<dd>{$res_arr[$i]["address"]}</dd>
				</dl>
EOT;
    $i=$i+1;
}

}
?> 
    
    

				
				
			</div>
			<div class="fy">
				<a href="" class="fy-l"><img src="images/yuyue-left.png"></a>
				<a href="" class="cc">1</a>
				<a href="" class="fy-r"><img src="images/yuyue-right.png"></a>
			</div>
			<a href="reservation_search.php" class="cx1">
				<img src="images/chaxun1.png">
				<span>查询预约</span>
			</a>
		</div>
	</body>

</html>

<?php
mysqli_close($link);
?>