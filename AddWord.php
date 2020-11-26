<?php
if (isset($_POST["action"])&&($_POST["action"]=="add")) {
	include("connMysql.php");
	if(!@mysqli_select_db($db_link,"vocabulary")) die("資料庫選擇失敗");
	$sql_query = "INSERT INTO `detail` (`cVocabulary`,`cChinese`,`cExplanation`,`cScentence`,`cAnswer`) VALUE(";
	$sql_query .= "'".$_POST["cVocabulary"]."',";
	$sql_query .= "'".$_POST["cChinese"]."',";
	$sql_query .= "'".$_POST["cExplanation"]."',";
	$sql_query .= "'".$_POST["cScentence"]."',";
	$sql_query .= "'".$_POST["cAnswer"]."')";
	mysqli_query($db_link,$sql_query);
	$sql_query     ="SELECT * FROM detail";
	$all_result    = mysqli_query($db_link,$sql_query);
	$total_records = mysqli_num_rows($all_result);
	$page=ceil($total_records/10);
	//重新導回主畫面
	header("Location:EnglishLearning.php?page=".$page);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
<body>
	<h1 align="center">英文單字學習系統-新增單字</h1>
	<p align="center"><a href="javascript:history.back()">回上一頁</a></p>
	<form action="" method="POST" name="formAdd" id="formAdd">
	<table border="1" align="center" cellpadding="4">
	<tr>
		<th>欄位</th><th>資料</th>
	</tr>
	<tr>
		<td>單字</td><td><input type="text" name="cVocabulary" id="cVocabulary"></td>
	</tr>
	<tr>
		<td>中文</td><td><input type="text" name="cChinese" id="cChinese"></td>
	</tr>	
	<tr>
		<td>解釋</td><td><textarea cols="50" rows="3" name="cExplanation"></textarea></td>
	</tr>
	<tr>
		<td>例句</td><td><textarea cols="50" rows="5" name="cScentence"></textarea></td>
	</tr>
	<tr>
		<td>例句解答</td><td><textarea cols="50" rows="1" name="cAnswer"></textarea></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
		<input name="action" type="hidden" value="add">
		<input type="submit" name="button" id="button" value="新增">
		<input type="reset" name="button2" id="button2" value="重填">	
		</td>
	</tr>
	</table>
	</form>

</body>
</html>