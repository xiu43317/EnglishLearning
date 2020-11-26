<?php
include("connMysql.php");
if(!@mysqli_select_db($db_link,"vocabulary")) die("資料庫選擇失敗");
$count=0;

$sql_db1 = "SELECT * FROM `detail` WHERE `cID`=".$_POST["cID1"];
$result1 = mysqli_query($db_link,$sql_db1);
$row_result1=mysqli_fetch_assoc($result1);

$sql_db2 = "SELECT * FROM `detail` WHERE `cID`=".$_POST["cID2"];
$result2 = mysqli_query($db_link,$sql_db2);
$row_result2=mysqli_fetch_assoc($result2);

$sql_db3 = "SELECT * FROM `detail` WHERE `cID`=".$_POST["cID3"];
$result3 = mysqli_query($db_link,$sql_db3);
$row_result3=mysqli_fetch_assoc($result3);

$sql_db4 = "SELECT * FROM `detail` WHERE `cID`=".$_POST["cID4"];
$result4 = mysqli_query($db_link,$sql_db4);
$row_result4=mysqli_fetch_assoc($result4);

$sql_db5 = "SELECT * FROM `detail` WHERE `cID`=".$_POST["cID5"];
$result5 = mysqli_query($db_link,$sql_db5);
$row_result5=mysqli_fetch_assoc($result5);

$sql_db6 = "SELECT * FROM `detail` WHERE `cID`=".$_POST["cID6"];
$result6 = mysqli_query($db_link,$sql_db6);
$row_result6=mysqli_fetch_assoc($result6);

$sql_db7 = "SELECT * FROM `detail` WHERE `cID`=".$_POST["cID7"];
$result7 = mysqli_query($db_link,$sql_db7);
$row_result7=mysqli_fetch_assoc($result7);

$sql_db8 = "SELECT * FROM `detail` WHERE `cID`=".$_POST["cID8"];
$result8 = mysqli_query($db_link,$sql_db8);
$row_result8=mysqli_fetch_assoc($result8);

$sql_db9 = "SELECT * FROM `detail` WHERE `cID`=".$_POST["cID9"];
$result9 = mysqli_query($db_link,$sql_db9);
$row_result9=mysqli_fetch_assoc($result9);

$sql_db10 = "SELECT * FROM `detail` WHERE `cID`=".$_POST["cID10"];
$result10 = mysqli_query($db_link,$sql_db10);
$row_result10=mysqli_fetch_assoc($result10);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1 align="center">英文單字測驗解答</h1>
	<p align="center"><a href="javascript:history.back()">回測驗頁面</a></p>
	<table border="1" align="center">
		<tr>
			<th>題號</th>
			<th>單字</th>
			<th>解答</th>
			<th>解釋</th>
			<th>例句</th>
			<th>對或錯</th>
		</tr>
		<tr>
			<td align="center">1</td>
			<td><?php echo $_POST["cVocabulary1"]?></td>
			<td><?php echo $row_result1["cAnswer"];?></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result1["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result1["cScentence"];?></textarea></td>
			<td align="center"><?php if (strcasecmp($_POST["cVocabulary1"],$row_result1["cAnswer"])== 0) {
				echo "✔"; $count++;
			}else{
				echo "✘";
			};?>
			</td>
		</tr>
		<tr>
			<td align="center">2</td>
			<td><?php echo $_POST["cVocabulary2"]?></td>
			<td><?php echo $row_result2["cAnswer"];?></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result2["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result2["cScentence"];?></textarea></td>
			<td align="center"><?php if (strcasecmp($_POST["cVocabulary2"],$row_result2["cAnswer"])== 0) {
				echo "✔"; $count++;
			}else{
				echo "✘";
			};?>
			</td>
		</tr>
		<tr>
			<td align="center">3</td>
			<td><?php echo $_POST["cVocabulary3"]?></td>
			<td><?php echo $row_result3["cAnswer"];?></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result3["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result3["cScentence"];?></textarea></td>
			<td align="center"><?php if (strcasecmp($_POST["cVocabulary3"],$row_result3["cAnswer"])== 0) {
				echo "✔"; $count++;
			}else{
				echo "✘";
			};?>
			</td>
		</tr>
		<tr>
			<td align="center">4</td>
			<td><?php echo $_POST["cVocabulary4"]?></td>
			<td><?php echo $row_result4["cAnswer"];?></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result4["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result4["cScentence"];?></textarea></td>
			<td align="center"><?php if (strcasecmp($_POST["cVocabulary4"],$row_result4["cAnswer"])== 0) {
				echo "✔"; $count++;
			}else{
				echo "✘";
			};?>
			</td>
		</tr>
		<tr>
			<td align="center">5</td>
			<td><?php echo $_POST["cVocabulary5"]?></td>
			<td><?php echo $row_result5["cAnswer"];?></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result5["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result5["cScentence"];?></textarea></td>
			<td align="center"><?php if (strcasecmp($_POST["cVocabulary5"],$row_result5["cAnswer"])== 0) {
				echo "✔"; $count++;
			}else{
				echo "✘";
			};?>
			</td>
		</tr>
		<tr>
			<td align="center">6</td>
			<td><?php echo $_POST["cVocabulary6"]?></td>
			<td><?php echo $row_result6["cAnswer"];?></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result6["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result6["cScentence"];?></textarea></td>
			<td align="center"><?php if (strcasecmp($_POST["cVocabulary6"],$row_result6["cAnswer"])== 0) {
				echo "✔"; $count++;
			}else{
				echo "✘";
			};?>
			</td>
		</tr>
		<tr>
			<td align="center">7</td>
			<td><?php echo $_POST["cVocabulary7"]?></td>
			<td><?php echo $row_result7["cAnswer"];?></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result7["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result7["cScentence"];?></textarea></td>
			<td align="center"><?php if (strcasecmp($_POST["cVocabulary7"],$row_result7["cAnswer"])== 0) {
				echo "✔"; $count++;
			}else{
				echo "✘";
			};?>
			</td>
		</tr>
		<tr>
			<td align="center">8</td>
			<td><?php echo $_POST["cVocabulary8"]?></td>
			<td><?php echo $row_result8["cAnswer"];?></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result8["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result8["cScentence"];?></textarea></td>
			<td align="center"><?php if (strcasecmp($_POST["cVocabulary8"],$row_result8["cAnswer"])== 0) {
				echo "✔"; $count++;
			}else{
				echo "✘";
			};?>
			</td>
		</tr>
		<tr>
			<td align="center">9</td>
			<td><?php echo $_POST["cVocabulary9"]?></td>
			<td><?php echo $row_result9["cAnswer"];?></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result9["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result9["cScentence"];?></textarea></td>
			<td align="center"><?php if (strcasecmp($_POST["cVocabulary9"],$row_result9["cAnswer"])== 0) {
				echo "✔"; $count++;
			}else{
				echo "✘";
			};?>
			</td>
		</tr>
		<tr>
			<td align="center">10</td>
			<td><?php echo $_POST["cVocabulary10"]?></td>
			<td><?php echo $row_result10["cAnswer"];?></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result10["cExplanation"];?></textarea></td>
			<td><textarea cols="50" rows="3" name="cExplanation"><?php echo $row_result10["cScentence"];?></textarea></td>
			<td align="center"><?php if (strcasecmp($_POST["cVocabulary10"],$row_result10["cAnswer"])== 0) {
				echo "✔"; $count++;
			}else{
				echo "✘";
			};?>
			</td>
		</tr>
		<tr>
			<td colspan="5" align="center">答對題目:<?php echo $count;?></td>
		</tr>
	</table>	

</body>
</html>