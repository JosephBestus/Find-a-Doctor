<?php
require("includes/config.php");
$result = mysql_query("SELECT id,link FROM item_page_links where status = 1 limit 0,50000");
while($row = mysql_fetch_array($result)){
	//echo $row['link'];
	$html = file_get_html($row['link']);
	$site = 'http://www.yell.com';
	$itemID = $row['id'];
	if($html){
		switch($site){
			case 'http://www.yell.com':
				$title = $html->find(".m-business-card--name");
				if($title){
					$location = '';
					$pincode = '';
					$description = '';
					$addres ='';
					$itemTitle ='';
					$descr = $html->find("#aboutus");
					if($descr[0]){
						$description = $descr[0]->innertext();
						$description = mysql_real_escape_string(preg_replace('/[^(\x20-\x7F)]*/','',strip_tags_content($description,"<div>")));
					}
					$sql = "UPDATE item_page_links SET description='".trim($description)."' WHERE id = '".$itemID."' ";
					//echo $sql.'<br>';
					mysql_query($sql);
					//echo $itemTitle.' <br> Address: '.$addres.'<br> Location: '.$location.'<br> Telephone: '.$telephone.'<br>Website: '.$websiteURL.'<br>Description: '.$description.'<br><br>';
				}
				break;
		}
	}
}
echo $itemID;
