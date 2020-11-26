<?php
include("connMysql.php");
if(!@mysqli_select_db($db_link,"vocabulary")) die("資料庫選擇失敗");
if (isset($_POST["action"])&&($_POST["action"]=="delete")) {
	$sql_query = "DELETE FROM `detail` WHERE `cID`="."'".$_GET["id"]."'";
	mysqli_query($db_link,$sql_query);
	//重新導回主畫面
	header("Location:EnglishLearning.php");
}
$sql_db = "SELECT * FROM `detail` WHERE `cID`=".$_GET["id"];
$result = mysqli_query($db_link,$sql_db);
$row_result = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
	<title>英文單字學習系統</title>
</head>
<body>
	<h1 align="center">英文單字學習系統</h1>
	<p align="center"><a href="EnglishLearning.php">back</a></p>
	<form action="" method="POST" name="formAdd" id="formAdd">
	<table border="1" align="center" cellpadding="4">
	<tr>
		<th>欄位</th><th>資料</th>
	</tr>
	<tr>
		<td>單字</td><td><?php echo $row_result["cVocabulary"];?></td>
	</tr>
	<tr>
		<td>中文</td><td><?php echo $row_result["cChinese"];?></td>
	</tr>
	<tr>
		<td>解釋</td><td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result["cExplanation"];?></textarea></td>
	</tr>
	<tr>
		<td>例句</td><td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result["cScentence"];?></textarea></td>
	</tr>
	<tr>
		<td>例句解答</td><td><?php echo $row_result["cAnswer"];?></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
		<input type="hidden" name="cVocabulary" value="<?php echo $row_result["cVocabulary"];?>">
		<input name="action" type="hidden" value="delete">
		<input type="submit" name="button" id="button" value="確定要刪除這筆資料嗎?">	
		</td>
	</tr>
	</table>
	</form>
</body>
</html>