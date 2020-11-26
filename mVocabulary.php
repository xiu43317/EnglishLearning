<?php
header("Content-Type:text/html;charest=utf-8");
include("connMysql.php");
if(!@mysqli_select_db($db_link,"vocabulary")) die("資料庫選擇失敗");
$sequence = $_GET["num"];
$sql_db = "SELECT * FROM `detail` ORDER BY `cID` LIMIT ".$sequence.",1";
$result = mysqli_query($db_link,$sql_db);
$row_result=mysqli_fetch_assoc($result);
$data_array_en = [
 "Vocabulary" => $row_result["cVocabulary"],
 "Chinese" => $row_result["cChinese"],
 "Explanation" => $row_result["cExplanation"],
 "Scentence" => $row_result["cScentence"],
 "Answer" => $row_result["cAnswer"]
];
// 先利用urlencode讓陣列中沒有中文
foreach($data_array_en as $key => $value){
 $new_data_array[urlencode($key)] = urlencode($value);
}
// 利用json_encode將資料轉成JSON格式
$data_json_url = json_encode($new_data_array);
// 利用urldecode將資料轉回中文
$data_json = urldecode($data_json_url);
echo $data_json;
?>