<?php
// Create DOM from URL or file
require("simple_html_dom.php");
$html = file_get_html('http://www.yellowpages.com.au/search/listings?clue=Restaurants');
echo $html;
$pages = array();
foreach($html->find('.button-pagination-container') as $element){
	foreach($element->find('a') as $pageLinks){
		$pages[] = $pageLinks->href;
	}
}
var_dump($pages);
