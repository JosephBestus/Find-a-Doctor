<?php
require("includes/config.php");
$result = mysql_query("SELECT a.website from item_page_links a where a.website !='' and a.metaStatus = '0' group by a.website order by a.id limit 0,10000");
while($row = mysql_fetch_array($result)){
	$html = file_get_html($row['website']);
	if($html){
		$title = $html->find('title');
		if($title){
			$site_title = $title[0]->innertext;
		}else{
			$site_title = '';
		}
		foreach($html->find('meta') as $meta){
			if($meta){
				if($meta->name == 'description'){
					$meta_desc = $meta->content;
				}
				if($meta->name == 'keywords'){
					$meta_keys = $meta->content;
				}
			}
		}
		mysql_query("update item_page_links set website_title='".mysql_real_escape_string($site_title)."',meta_keys='".mysql_real_escape_string($meta_keys)."',meta_desc='".mysql_real_escape_string($meta_desc)."',metaStatus='1' where website='".$row['website']."' ");
	}
	else{
		mysql_query("update item_page_links set metaStatus='1' where website='".$row['website']."' ");
	}
}
