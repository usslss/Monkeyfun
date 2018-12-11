<?php

//banner
$sql_banner="SELECT * FROM banner WHERE banner_class='{$page}' AND banner_website='{$website}_{$version}' ";

$result=mysqli_query($link, $sql_banner);
$i=0;

while ($row=mysqli_fetch_assoc($result)){
    
    $bannerArr[$i]["banner_id"] = $row["banner_id"];
    $bannerArr[$i]["banner_title"] = $row["banner_title"];
    $bannerArr[$i]["banner_alt"] = $row["banner_alt"];
    $bannerArr[$i]["banner_img_url"] = $row["banner_img_url"];
    
    $i++;
    
    
}
$banner_sum=$i;


for ($i=0;$i<$banner_sum;$i++){

    echo <<< EOT
				<div class="swiper-slide"><img src="{$bannerArr[$i]["banner_img_url"]}" alt="{$bannerArr[$i]["banner_alt"]}" title="{$bannerArr[$i]["banner_title"]}"></div>
EOT;
}
?>




		
		
		
		
		
		
		
		
		
		
		
		
		
		
		