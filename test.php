<?php
include("connMysql.php");
if(!@mysqli_select_db($db_link,"vocabulary")) die("資料庫選擇失敗");
//未加限制顯示筆數的SQL敘述句
$sql_query="SELECT * FROM detail";
//以未加上限制顯示筆數的SQL敘述句查詢資料到$all_result中
$all_result = mysqli_query($db_link,$sql_query);
//計算總筆數
$total_records = mysqli_num_rows($all_result);
$firstPage = $_GET["first"];
$lastPage = $_GET["last"];
$beginNum = ($firstPage-1)*10+1;
$endNum = $lastPage*10;
$pageRow_records = 10;
if ($lastPage == ceil($total_records/$pageRow_records)) {
	$endNum = $total_records;
}
$numbers = range ($beginNum,$endNum);
//shuffle 將陣列順序隨即打亂
shuffle ($numbers);
//array_slice 取該陣列中的某一段.
$num=10;
if ($total_records < $num) {
	header("Location:EnglishLearning.php");
}
$result = array_slice($numbers,0,$num);
$sql_db1 = "SELECT * FROM `detail` ORDER BY `cID` LIMIT ".($result[0]-1).",1";
$result1 = mysqli_query($db_link,$sql_db1);
$row_result1=mysqli_fetch_assoc($result1);

$sql_db2 = "SELECT * FROM `detail` ORDER BY `cID` LIMIT ".($result[1]-1).",1";
$result2 = mysqli_query($db_link,$sql_db2);
$row_result2=mysqli_fetch_assoc($result2);

$sql_db3 = "SELECT * FROM `detail` ORDER BY `cID` LIMIT ".($result[2]-1).",1";
$result3 = mysqli_query($db_link,$sql_db3);
$row_result3=mysqli_fetch_assoc($result3);

$sql_db4 = "SELECT * FROM `detail` ORDER BY `cID` LIMIT ".($result[3]-1).",1";
$result4 = mysqli_query($db_link,$sql_db4);
$row_result4=mysqli_fetch_assoc($result4);

$sql_db5 = "SELECT * FROM `detail` ORDER BY `cID` LIMIT ".($result[4]-1).",1";
$result5 = mysqli_query($db_link,$sql_db5);
$row_result5=mysqli_fetch_assoc($result5);

$sql_db6 = "SELECT * FROM `detail` ORDER BY `cID` LIMIT ".($result[5]-1).",1";
$result6 = mysqli_query($db_link,$sql_db6);
$row_result6=mysqli_fetch_assoc($result6);

$sql_db7 = "SELECT * FROM `detail` ORDER BY `cID` LIMIT ".($result[6]-1).",1";
$result7 = mysqli_query($db_link,$sql_db7);
$row_result7=mysqli_fetch_assoc($result7);

$sql_db8 = "SELECT * FROM `detail` ORDER BY `cID` LIMIT ".($result[7]-1).",1";
$result8 = mysqli_query($db_link,$sql_db8);
$row_result8=mysqli_fetch_assoc($result8);

$sql_db9 = "SELECT * FROM `detail` ORDER BY `cID` LIMIT ".($result[8]-1).",1";
$result9 = mysqli_query($db_link,$sql_db9);
$row_result9=mysqli_fetch_assoc($result9);

$sql_db10 = "SELECT * FROM `detail` ORDER BY `cID` LIMIT ".($result[9]-1).",1";
$result10 = mysqli_query($db_link,$sql_db10);
$row_result10=mysqli_fetch_assoc($result10);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1 align="center">英文單字測驗</h1>
	<p align="center"><a href="EnglishLearning.php">回主畫面</a></p>
	<p align="center"><a href="javascript:window.location.reload()"><input type="button" name="button3" value="更新題目"></a></p>
	<form action="answer.php" method="POST" name="formAdd" id="formAdd">
		<table border="1" align="center">
		<tr>
			<th>題號</th>
			<th>單字</th>
			<th>解釋</th>
			<th>例句</th>
		</tr>
		<tr>
			<td align="center">1</td>
			<input type="hidden" name="cID1" value="<?php echo $row_result1["cID"];?>">
			<td><input type="text" name="cVocabulary1" id="cVocabulary" autocomplete="off" ></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result1["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cScentence"><?php echo $row_result1["cScentence"];?></textarea></td>
		</tr>
		<tr>
			<td align="center">2</td>
			<input type="hidden" name="cID2" value="<?php echo $row_result2["cID"];?>">
			<td><input type="text" name="cVocabulary2" id="cVocabulary" autocomplete="off"></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result2["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cScentence"><?php echo $row_result2["cScentence"];?></textarea></td>
		</tr>
		<tr>
			<td align="center">3</td>
			<input type="hidden" name="cID3" value="<?php echo $row_result3["cID"];?>">
			<td><input type="text" name="cVocabulary3" id="cVocabulary" autocomplete="off"></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result3["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cScentence"><?php echo $row_result3["cScentence"];?></textarea></td>
		</tr>
		<tr>
			<td align="center">4</td>
			<input type="hidden" name="cID4" value="<?php echo $row_result4["cID"];?>">
			<td><input type="text" name="cVocabulary4" id="cVocabulary" autocomplete="off"></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result4["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cScentence"><?php echo $row_result4["cScentence"];?></textarea></td>
		</tr>
		<tr>
			<td align="center">5</td>
			<input type="hidden" name="cID5" value="<?php echo $row_result5["cID"];?>">
			<td><input type="text" name="cVocabulary5" id="cVocabulary" autocomplete="off"></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result5["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cScentence"><?php echo $row_result5["cScentence"];?></textarea></td>
		</tr>
		<tr>
			<td align="center">6</td>
			<input type="hidden" name="cID6" value="<?php echo $row_result6["cID"];?>">
			<td><input type="text" name="cVocabulary6" id="cVocabulary" autocomplete="off"></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result6["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cScentence"><?php echo $row_result6["cScentence"];?></textarea></td>
		</tr>
		<tr>
			<td align="center">7</td>
			<input type="hidden" name="cID7" value="<?php echo $row_result7["cID"];?>">
			<td><input type="text" name="cVocabulary7" id="cVocabulary" autocomplete="off"></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result7["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cScentence"><?php echo $row_result7["cScentence"];?></textarea></td>
		</tr>
		<tr>
			<td align="center">8</td>
			<input type="hidden" name="cID8" value="<?php echo $row_result8["cID"];?>">
			<td><input type="text" name="cVocabulary8" id="cVocabulary" autocomplete="off"></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result8["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cScentence"><?php echo $row_result8["cScentence"];?></textarea></td>
		</tr>
		<tr>
			<td align="center">9</td>
			<input type="hidden" name="cID9" value="<?php echo $row_result9["cID"];?>">
			<td><input type="text" name="cVocabulary9" id="cVocabulary" autocomplete="off"></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result9["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cScentence"><?php echo $row_result9["cScentence"];?></textarea></td>
		</tr>
		<tr>
			<td align="center">10</td>
			<input type="hidden" name="cID10" value="<?php echo $row_result10["cID"];?>">
			<td><input type="text" name="cVocabulary10" id="cVocabulary" autocomplete="off"></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result10["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cScentence"><?php echo $row_result10["cScentence"];?></textarea></td>
		</tr>
	<tr>
		<td colspan="4" align="center">
		<input name="action" type="hidden" value="update">
		<input type="submit" name="button" id="button" value="送出答案">
		<input type="reset" name="button2" id="button2" value="重新填寫">	
		</td>
	</tr>
	</table>
	</form>

</body>
</html>