<?php
header("Content-Type:text/html;charest=utf-8");
include("connMysql.php");
$seldb = @mysqli_select_db($db_link,"vocabulary");
if(!$seldb) die("資料庫選擇失敗");
$sql_query="SELECT * FROM detail";
$result = mysqli_query($db_link,$sql_query);

if (mysqli_num_rows($result) > 0) { 
// looping through all results 
// items node 
$response["items"] = array(); 
while ($row = mysqli_fetch_array($result)) { 
// temp user array 
$items = array(); 
$items["vocabulary"] = $row["cVocabulary"];
$items["chinese"] = $row["cChinese"];  
// push single items into final response array 
array_push($response["items"], $items); 
} 
// success 
$response["success"] = 1; 
// echoing JSON response 
echo json_encode($response,JSON_UNESCAPED_UNICODE); 
} else { 
// no items found 
$response["success"] = 0; 
$response["message"] = "No items found"; 
// echo JSON 
echo json_encode($response,JSON_UNESCAPED_UNICODE); 
} 
?>