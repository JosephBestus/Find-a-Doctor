<?php
//
//$ch = curl_init("http://www.flipkart.com");
//curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_POST, 1);
//$result  = curl_exec($ch);
//var_dump($result);
//curl_close($ch);
// create curl resource
$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, "http://www.sulekha.com");

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);

// close curl resource to free up system resources
curl_close($ch);      
//print_r($output);
echo $output;
//$dom = new DOMDocument();
//@$dom->loadHTML($output);
//
//$finder = new DomXPath($dom);
//$nodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), 'question')]");
//print_r($nodes);
//$innerHTML = '';
//$tmp_dom = new DOMDocument(); 
//foreach ($nodes as $node) 
//    {
//    $tmp_dom->appendChild($tmp_dom->importNode($node,true));
//    }
//  $innerHTML.=trim($tmp_dom->saveHTML()); 
//
//  $buffdom = new DOMDocument();
//  @$buffdom->loadHTML($innerHTML);
//    # Iterate over all the <a> tags
//    foreach($buffdom->getElementsByTagName('a') as $link) {
//        # Show the <a href>
//        echo $link->nodeValue, PHP_EOL;
//    echo "<br />";
//    }
?>
