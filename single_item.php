<?php
require("includes/config.php");
$result = mysql_query("SELECT a.*,b.site,b.category,b.city FROM item_page_links a, category_page_links b where a.cid = b.id and a.status = 0 limit 0,5000");
while($row = mysql_fetch_array($result)){
	//echo $row['link'];
	$html = file_get_html($row['link']);
	$category = $row['category'];
	$site = $row['site'];
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
					$itemTitle = mysql_real_escape_string($title[0]->text());
					foreach($html->find(".address") as $addr){
						$addres =  mysql_real_escape_string($addr->text());
						foreach($addr->find("span") as $loc){
							if($loc->getAttribute("itemprop") == 'addressLocality'){
								$location =  mysql_real_escape_string($loc->text());
							}
							if($loc->getAttribute("itemprop") == 'postalCode'){
								$pincode = mysql_real_escape_string($loc->text());
							}
						}
					}
					$tel = $html->find(".business-telephone");
					if($tel[0]){
						$telephone = mysql_real_escape_string($tel[0]->text());
					}
					else{
						$telephone = '';
					}
					$website = $html->find(".m-business-card--website");
					if($website[0]){
						$websiteURL = mysql_real_escape_string($website[0]->href);
					}
					else{
						$websiteURL = '';
					}
					$descr = $html->find("#aboutus");
					if($descr[0]){
						$description = $descr[0]->innertext();
						$description = mysql_real_escape_string(preg_replace('/[^(\x20-\x7F)]*/','',strip_tags_content($description,"<div>")));
					}
					$sql = "UPDATE item_page_links SET title= '".trim($itemTitle)."',address='".trim($addres)."',number='".trim($telephone)."',location='".trim($location)."',pincode='".trim($pincode)."',website='".trim($websiteURL)."',description='".trim($description)."',status='1' WHERE id = '".$itemID."' ";
					//echo $sql.'<br>';
					mysql_query($sql);
					//echo $itemTitle.' <br> Address: '.$addres.'<br> Location: '.$location.'<br> Telephone: '.$telephone.'<br>Website: '.$websiteURL.'<br>Description: '.$description.'<br><br>';
				}
				break;
		}
	}
}
