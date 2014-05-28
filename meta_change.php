<?php
include("includes/config.php");

$linkCheck = mysql_query("SELECT ID FROM wp_posts WHERE post_type = 'listing'");
while($row = mysql_fetch_array($linkCheck, MYSQL_ASSOC)){
mysql_query("UPDATE wp_postmeta SET meta_value='pro' WHERE meta_key='geocraft_listing_type' AND post_id = '".$row['ID']."'");

}

echo "done";


?>
