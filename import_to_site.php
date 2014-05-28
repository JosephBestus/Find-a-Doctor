<?php
require("includes/config.php");
function query($sql){
	$con = mysql_connect("localhost",'root','') or die("con't be connected");
	$db_con = mysql_select_db("addyou",$con) or die("Database is not connected");
	$result = mysql_query($sql);
	return $result;
	mysql_close();
}
$result = mysql_query("SELECT a.*,b.site,b.category,b.city FROM item_page_links a, category_page_links b where a.cid = b.id and a.status = 1 limit 0,10");
while($row = mysql_fetch_array($result)){
	$catSQL = "select cat_id from ay_categorydir where name = '".$row['category']."'";
	$category = query($catSQL);
	$categoryResult = mysql_fetch_assoc($category);
	$categoryID = $categoryResult['cat_id'];
	$locSQL = "select id from ay_cities where name = '".$row['location']."'";
	$locationResult = mysql_fetch_assoc(query($locSQL));
	$locationID =  $locationResult['id'];
	$sql =  "INSERT INTO ay_datadir (cid,title,siteurl,address,postal,description,loc,verified,sub,phone,published,pdatetime,ldatetime) VALUES (
	'".$categoryID."','".mysql_real_escape_string($row['title'])."','".mysql_real_escape_string($row['website'])."','".mysql_real_escape_string($row['address'])."',
	'".mysql_real_escape_string($row['pincode'])."','".mysql_real_escape_string($row['description'])."','".mysql_real_escape_string($row['address'])."','1','1',
	'".mysql_real_escape_string($row['number'])."','1','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')";
	//$results = query($sql);
	$id = mysql_insert_id();
	//query("insert into ay_lists_citiesdir (listid,cityid) values('".$id."','".$locationID."')");
}
