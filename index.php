<?php
// Create DOM from URL or file
require("simple_html_dom.php");
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
/*
$html = file_get_html('http://www.justdial.com/Bangalore/Movie');
//echo $html;

foreach($html as $ele){
	//echo $ele .'<br><br>';
}

foreach($html->find('a') as $element){
	//echo $element->href .'<br>';
	$linkParentClass = $element->parent->class;
	if($linkParentClass =='jcn'){
		//echo $element->href .'<br>';
		echo $element->innertext.'<br>';
		$html1 = file_get_html($element->href);
		foreach($html1->find('span') as $img){
			if($img->class == 'clogo'){
				$imgSrc = $img->first_child();
				echo '<img src="'.$imgSrc->src.'" />';
			}
		}
		foreach($html1->find('a') as $ele){
			if($ele->class == 'tel'){
				$telephone =  $ele->innertext();
				echo 'Telephone: '.$telephone.'<br>';
			}
		}
		foreach($html1->find('span') as $addr){
			if($addr->class == 'jadd'){
				echo 'Address: '.$addr->next_sibling().'<br><br>';
			}
		}
	}
}
*/

$html = file_get_html('http://www.justdial.com/Bangalore/Computer-Software-Developers-For-PHP/page-2');
//echo $html;


foreach($html->find('section') as $element){
	//echo $element->href .'<br>';
	$sectionClass = $element->class;
	if($sectionClass =='jrcl'){
		//echo $element->href .'<br>';
		foreach($element->find('span') as $details){
			if($details->class == 'jcn'){
				echo $details->first_child()->innertext().'<br>';
			}
			if($details->class == 'jrmob' || $details->class == 'jrc'){
				echo 'Mobile: '.$details->next_sibling()->innertext().'<br>';
			}
			if($details->class == 'jadd'){
				echo 'Address: '.$details->parent()->text().'<br><br>';
			}
		}
	}
}
$pages = array();
foreach($html->find('div') as $paging){
	$divID = $paging->getAttribute("id");
	if($divID == "srchpagination"){
		foreach($paging->find('a') as $nextPage){
			$pages[] = $nextPage->href;			
		}
	}
}
$pages = array_filter(array_unique($pages));
//var_dump($pages);
foreach($pages as $pagination){
	$html1 = file_get_html($pagination);
	foreach($html1->find('section') as $element){
		//echo $element->href .'<br>';
		$sectionClass = $element->class;
		if($sectionClass =='jrcl'){
			//echo $element->href .'<br>';
			foreach($element->find('span') as $details){
				if($details->class == 'jcn'){
					echo $details->first_child()->innertext().'<br>';
				}
				if($details->class == 'jrmob' || $details->class == 'jrc'){
					echo 'Mobile: '.$details->next_sibling()->innertext().'<br>';
				}
				if($details->class == 'jadd'){
					echo 'Address: '.$details->parent()->text().'<br><br>';
				}
			}
		}
	}
}
