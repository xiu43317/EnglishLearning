<?php
header("Content-Type:text/html;charest=utf-8");
include("connMysql.php");
$seldb = @mysqli_select_db($db_link,"vocabulary");
if(!$seldb) die("資料庫選擇失敗");
session_start();
//預設登入狀態
$state = false;
if( @$_SESSION['admin'] == true){
	$state = true;
}else {
	$state = false;
}
//預設每頁筆數
$pageRow_records = 10;
//預設頁數
$num_pages = 1;
//若有翻頁　將頁數更新
if (isset($_GET['page'])) {
	$num_pages = $_GET['page'];
}
//本頁開始記錄筆數　= (頁數-1)*每頁紀錄筆數
$startRow_records=($num_pages-1)*$pageRow_records;
//未加限制顯示筆數的SQL敘述句
$sql_query="SELECT * FROM detail";
//加上限制顯示筆數的SQL敘述句　由本頁開始紀錄筆數開始
$sql_query_limit=$sql_query." LIMIT ".$startRow_records.", ".$pageRow_records;
//以加上限制顯示筆數的SQL敘述句查詢資料到$result
$result = mysqli_query($db_link,$sql_query_limit);
//以未加上限制顯示筆數的SQL敘述句查詢資料到$all_result中
$all_result = mysqli_query($db_link,$sql_query);
//計算總筆數
$total_records = mysqli_num_rows($all_result);
//計算總頁數=(總筆數/每頁筆數)後無條件進位
$total_pages= ceil($total_records/$pageRow_records);
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<head>
	<meta charset="UTF-8">
	<title>英文單字學習系統</title>
</head>
<body>
	<h1 align="center">英文單字學習系統</h1>
	<form method="POST" action="search.php">
	<p align="center">輸入要查詢單字: <input type="text" name="vocabulary"><input type="submit" value="Search" >
	<?php echo $state == true ? 
	'<button type="button" onclick="javascript:location.href=\'logout.php\'">登出</button>' : 
	'<button type="button" onclick="javascript:location.href=\'login.php\'">登入</button>'
	?>
	</p>
	</form>
	<p align="center">目前資料筆數:<?php echo $total_records;?><br>
	<?php echo $state == true ? 
	'<button onclick="javascript:location.href=\'AddWord.php\'">新增單字</button>' : null
	?>
	<button onclick="myFunction()">進入測驗</button>
	從
	<select id="start">
    <?php
    for ($i=0; $i < $total_pages; $i++) { 
    	echo "<option value='".($i+1)."'".">第".($i+1)."頁</option>";
    }
    ?>
	</select>
	到
	<select id="end">
    <?php
    for ($i=0; $i < $total_pages; $i++) { 
    	echo "<option value='".($i+1)."'".">第".($i+1)."頁</option>";
    }
    ?>
	</select>
	<table border="1" align="center">
		<tr>
			<th>單字</th>
			<th>中文</th>
			<th>解釋</th>
			<th>例句</th>
			<th>例句解答</th>
			<?php 
			if( $state == true){
			echo "<th>操作</th>";
			}			
			?>
		</tr>
			<?php
			while($row_result=mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>".$row_result["cVocabulary"]."</td>";
				echo "<td>".$row_result["cChinese"]."</td>";
				echo "<td><textarea cols=\"50\" rows=\"3\">".$row_result["cExplanation"]."</textarea></td>";
				echo "<td><textarea cols=\"50\" rows=\"3\">".$row_result["cScentence"]."</textarea></td>";
				echo "<td>".$row_result["cAnswer"]."</td>";
				if( $state == true){
				echo "<td><a href='update.php?id=".$row_result["cID"]."'>修改</a> ";
				echo "<a href='delete.php?id=".$row_result["cID"]."'>刪除</a></td>";
				}
				echo "</tr>";
		}
		?>
	</table>
	<table border="0" align="center">
	<tr>
	<?php if ($num_pages>1) { //若不是第一頁則顯示?>
		<td> <a href="EnglishLearning.php?page=1">第一頁</a></td>
		<td><a href="EnglishLearning.php?page=<?php echo $num_pages-1;?>">上一頁</a></td>
	<?php } ?>
	<?php if ($num_pages<$total_pages) { //若不是最後一頁則顯示?>
		<td><a href="EnglishLearning.php?page=<?php echo $num_pages+1;?>">下一頁</a></td>
		<td><a href="EnglishLearning.php?page=<?php echo $total_pages;?>">最後頁</a></td>
	<?php } ?>
	</tr>
	</table>
	<table border="0" align="center">
	<td>	
	<select id ="current" onchange="currentPage()">
		<?php
		for ($i=0; $i < $total_pages; $i++) {
		if (($i+1) == $num_pages) {
		echo "<option value='".($i+1)."'"." SELECTED>第".($i+1)."頁</option>";
		}else{
		echo "<option value='".($i+1)."'".">第".($i+1)."頁</option>";		
	    } 	
	}
	?>
	</select>
	</td>
	</table>
</body>
</html>

<script>
function myFunction() {
	var x = document.getElementById("start").value;
	var y = document.getElementById("end").value;
	if (<?php echo $total_records;?> <10){
		alert("題庫未達10題 無法進入測驗");
		window.location.reload();
	}
	else if (parseInt(x) > parseInt(y)) {
		alert("起始不能大於結尾!");
		window.location.reload();
	}
	else if (x==y && x==<?php echo $total_pages;?> && <?php echo $total_records;?> % 10 !== 0 ) {
		alert("最後一頁資料不足10筆");
		window.location.reload();
	}
	else{
		location.href='test.php?first='+x+'&last='+y;
	} 
}
function currentPage(){
	var z = document.getElementById("current").value;
	location.href='EnglishLearning.php?page='+z;
} 
</script>