<?php
include("includes/config.php");
$linkCheck = mysql_query("SELECT * FROM  fooddotcom_crawl");

while($row = mysql_fetch_array($linkCheck, MYSQL_ASSOC)) 
{
	$post_content ="";
		$full_description = $row['total_time'] ;
		$full_description .= $row['recipe_Ingredients'] ;
		
		$full_description = mysql_real_escape_string($full_description);
		
		
		echo $full_description;
		
		$post_title =$row['recipe_name'];
		$slug_value = seoUrl($row['recipe_name']);	
		 echo $sql = "INSERT INTO  wp_posts (post_author,post_date,post_date_gmt,post_content,post_title,post_status,comment_status,ping_status,post_name,post_modified,post_modified_gmt,menu_order,post_type,comment_count) VALUES ('1',now(),now(),'$full_description','$post_title','publish','open','open','$slug_value','now()','now()','0','post','0')";  
		
		
     /* echo $sql = "INSERT INTO  wp_posts (post_author,post_date,post_date_gmt,post_content,post_title,post_status,comment_status,ping_status,post_name,post_modified,post_modified_gmt,menu_order,
	 post_type,comment_count) VALUES ('1',now(), now() ,'$full_description','".$row['Collage_name']."','publish','open','open','".seoUrl($row['Collage_name'])."',now(),now(),'0','listing','0')"; */
    	//mysql_query($sql); 
		
		
    
}

  function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}     




?>
