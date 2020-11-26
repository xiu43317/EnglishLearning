<?php
if (isset($_POST["action"])&&($_POST["action"]=="add")) {
	include("connMysql.php");
	if(!@mysqli_select_db($db_link,"carservice")) die("資料庫選擇失敗");
	$sql_query = "INSERT INTO `cardetail` (`cRego`,`cName`,`cPhone`,`cMileage`,`cNextService`,`cDate`,`cDetail`) VALUE(";
	$sql_query .= "'".$_POST["cRego"]."',";
	$sql_query .= "'".$_POST["cName"]."',";
	$sql_query .= "'".$_POST["cPhone"]."',";
	$sql_query .= "'".$_POST["cMileage"]."',";
	$sql_query .= "'".$_POST["cNextService"]."',";
	$sql_query .= "'".$_POST["cDate"]."',";
	$sql_query .= "'".$_POST["cDetail"]."')";
	mysqli_query($db_link,$sql_query);
	//重新導回主畫面
	header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
	<title>CarServiceManagementSystem</title>
</head>
<body>
	<h1 align="center">CarServiceManagementSystem-New</h1>
	<p align="center"><a href="index.php">Back</a></p>
	<form action="" method="POST" name="formAdd" id="formAdd">
	<table border="1" align="center" cellpadding="4">
	<tr>
		<th>欄位</th><th>資料</th>
	</tr>
	<tr>
		<td>Rego</td><td><input type="text" name="cRego" id="cRego"></td>
	</tr>
	<tr>
		<td>Name</td><td><input type="text" name="cName" id="cName"></td>
	</tr>
	<tr>
		<td>Phone</td><td><input type="text" name="cPhone" id="cPhone"></td>
	</tr>
	<tr>
		<td>Mileage</td><td><input type="text" name="cMileage" id="cMileage"></td>
	</tr>
	<tr>
		<td>NextService</td><td><input type="text" name="cNextService" id="cNextService"></td>
	</tr>
	<tr>
		<td>Date</td><td><input type="text" name="cDate" id="cDate"></td>
	</tr>
	<tr>
		<td>Detail</td><td><input type="text" name="cDetail" id="cDetail" size="40"></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
		<input name="action" type="hidden" value="add">
		<input type="submit" name="button" id="button" value="ADD">
		<input type="reset" name="button2" id="button2" value="REDO">	
		</td>
	</tr>
	</table>
	</form>
</body>
</html>