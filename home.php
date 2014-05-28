<?php
// Create DOM from URL or file
require("simple_html_dom.php");
/*$html = file_get_html('http://www.healthopinion.net/');
foreach($html as $ele){
	//echo $ele .'<br><br>';
}
// Find all images
foreach($html->find('img') as $element){
       //echo $element->src . '<br>';
}

// Find all links
foreach($html->find('a') as $element){
	//echo $element->href . '<br>';
	if($element->href !='javascript:void(0);' &&
		trim($element->href) != '' &&
		$element->href !='#' &&
		$element->href != 'http://www.healthopinion.net' &&
		$element->href != 'http://www.fomaxtech.com' &&
		$element->href != 'http://www.growfastdigital.com/' &&
		$element->href != 'http://www.facebook.com/HealthOpinion.net' &&
		$element->href != 'javascript: refreshCaptcha();' &&
		$element->href != 'https://twitter.com/healthopinion4u' &&
		$element->href != 'http://pinterest.com/healthopinion/' &&
		$element->href != 'https://plus.google.com/u/0/b/116953863580273538400/116953863580273538400/' &&
		$element->href != 'http://www.linkedin.com/company/health-opinion'
	   ){
		echo '<h1>'.$element->href . '</h1>';
		$html1 = file_get_html('http://www.healthopinion.net/'.$element->href);
		foreach($html1->find('p') as $ele){
			echo $ele.'<br>';
		}
		//echo $element->href .'<br>';
		
	}
}
foreach($html->find('p') as $element){
       //echo $element . '<br>'; 
}*/

/*$html = file_get_html('http://www.stackoverflow.com/');
foreach($html as $ele){
	//echo $ele .'<br><br>';
}
// Find all images
foreach($html->find('img') as $element)
       //echo $element->src . '<br>';

// Find all links
foreach($html->find('a') as $element){
		if($element->class =='question-hyperlink'){
			echo $element->href .'<br>';
			echo $element->innertext.'<br><br><br><br>';
		}
}
foreach($html->find('p') as $element){
       //echo $element . '<br>'; 
}*/

$html = file_get_html('http://www.justdial.com/Bangalore/Orange-Hotel-<near>-Nxt-Innovative-Multiplex-Marathahalli/080PXX80-XX80-110623172353-A5J4_QmFuZ2Fsb3JlIEhvdGVscw==_BZDET');
foreach($html as $ele){
	//echo $ele .'<br><br>';
}

foreach($html->find('span') as $addr){
	if($addr->class == 'item'){
		echo 'Hotel Name:  '.$addr.'<br>';
	}
	if($addr->class == 'jadd'){
		echo 'Address: '.$addr->next_sibling();
	}
	if($addr->class == 'jwb'){
		echo 'WebSite: '.$addr->next_sibling();
	}
}
foreach($html->find('a') as $element){
	//echo $element->href .'<br>';
	if($element->class == 'tel'){
		$telephone =  $element->first_child()->innertext();
		echo 'Telephone: '.$telephone.'<br>';
	}
}

