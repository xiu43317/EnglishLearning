<?php
include("connMysql.php");
if(!@mysqli_select_db($db_link,"vocabulary")) die("資料庫選擇失敗");
if (!$_POST["vocabulary"]) {
	header("Location:EnglishLearning.php");
}
$sql_db = "SELECT * FROM `detail` WHERE `cVocabulary`="."'".$_POST["vocabulary"]."'";
if (isset($sql_db)) {
	$result = mysqli_query($db_link,$sql_db);
}else{
	header("Location:EnglishLearning.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>
	<meta charset="UTF-8">
	<title>英文單字學習系統</title>
</head>
<body>

	<h1 align="center">英文單字查詢結果</h1>
	<p align="center"><a href="javascript:history.back()">回上一頁</a></p>
	<table border="1" align="center">
		<tr>
			<th>單字</th>
			<th>中文</th>
			<th>解釋</th>
			<th>例句</th>
			<th>例句解答</th>
			<th>功能</th>
		</tr>
			<?php
			while($row_result=mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>".$row_result["cVocabulary"]."</td>";
				echo "<td>".$row_result["cChinese"]."</td>";
				echo "<td><textarea cols=\"50\" rows=\"3\">".$row_result["cExplanation"]."</textarea></td>";
				echo "<td><textarea cols=\"50\" rows=\"3\">".$row_result["cScentence"]."</textarea></td>";
				echo "<td>".$row_result["cAnswer"]."</td>";
				echo "<td><a href='update.php?id=".$row_result["cID"]."'>修改</a> ";
				echo "<a href='delete.php?id=".$row_result["cID"]."'>刪除</a></td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>