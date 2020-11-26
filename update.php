<?php
include("connMysql.php");
if(!@mysqli_select_db($db_link,"vocabulary")) die("資料庫選擇失敗");

$sql_db = "SELECT * FROM `detail` WHERE `cID`=".$_GET["id"];
$result = mysqli_query($db_link,$sql_db);
$row_result = mysqli_fetch_assoc($result);
$sql_query     ="SELECT * FROM detail";
$all_result    = mysqli_query($db_link,$sql_query);
$total_records = mysqli_num_rows($all_result);
for ($i=0; $i < $total_records ; $i++) { 
$sql_db1 = "SELECT * FROM `detail` ORDER BY `cID` LIMIT ".$i.",1";
$result1 = mysqli_query($db_link,$sql_db1);
$row_result1=mysqli_fetch_assoc($result1);
	if ($row_result1["cID"]==$row_result["cID"]) {
		$page = ceil(($i+1)/10);
		break;
	}
}
if (isset($_POST["action"])&&($_POST["action"]=="update")) {
	$sql_query = "UPDATE `detail` SET ";
	$sql_query .= "`cVocabulary`='".$_POST["cVocabulary"]."',";
	$sql_query .= "`cChinese`='".$_POST["cChinese"]."',";
	$sql_query .= "`cExplanation`='".$_POST["cExplanation"]."',";
	$sql_query .= "`cScentence`='".$_POST["cScentence"]."',";
	$sql_query .= "`cAnswer`='".$_POST["cAnswer"]."'";
	$sql_query .= "WHERE `cID`=".$_POST["cID"];
	mysqli_query($db_link,$sql_query);
	//重新導回主畫面
	header("Location:EnglishLearning.php?page=".$page);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
	<title>英文單字學習系統</title>
</head>
<body>
	<h1 align="center">英文單字學習系統-修改資料</h1>
	<p align="center"><a href="javascript:history.back()">回上一頁</a></p>
	<form action="" method="POST" name="formAdd" id="formAdd">
	<table border="1" align="center" cellpadding="4">
	<tr>
		<th>欄位</th><th>資料</th>
	</tr>
	<tr>
		<td>單字</td><td><input type="text" name="cVocabulary" id="cVocabulary" value="<?php echo $row_result["cVocabulary"];?>"></td>
	</tr>
	<tr>
		<td>中文</td><td><input type="text" name="cChinese" id="cChinese" value="<?php echo $row_result["cChinese"];?>"></td>
	</tr>
	<tr>
		<td>解釋</td><td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result["cExplanation"];?></textarea></td>
	</tr>
	<tr>
		<td>例句</td><td><textarea cols="50" rows="3" name="cScentence"><?php echo $row_result["cScentence"];?></textarea></td>
	</tr>
	<tr>
		<td>例句解答</td><td><input type="text" name="cAnswer" id="cAnswer" value="<?php echo $row_result["cAnswer"];?>"></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
		<input type="hidden" name="cID" value="<?php echo $row_result["cID"];?>">
		<input name="action" type="hidden" value="update">
		<input type="submit" name="button" id="button" value="更新資料">
		<input type="reset" name="button2" id="button2" value="重新填寫">	
		</td>
	</tr>
	</table>
	</form>
</body>
</html>