<?php
include("includes/config.php");
   $linkCheck = mysql_query("SELECT * FROM  fooddotcom_crawl  LIMIT 0 , 30");
$pages[] = array();
$i = 7;
while($row = mysql_fetch_array($linkCheck, MYSQL_ASSOC))
{  
   
	define('DIRECTORY', 'D:\download_images2');
		$image_path = $row['recipe_image'];
		$content = file_get_contents($image_path);
		file_put_contents(DIRECTORY.'/image_'.$i.'.jpg', $content);
	$i++;
    //mysql_query("UPDATE list_details_table SET image_icon='$image_url',college_subtitle='$title_small' WHERE id='".$row['id']."'");
   
 } 





?>
