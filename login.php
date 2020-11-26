<?php 
if(isset($_POST['action'])){
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];
    if($username == 'Rock' && $password == "1234"){
        $_SESSION['admin'] = true;
    }
    header("Location:EnglishLearning.php");
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
<body>
	<h1 align="center">英文單字學習系統-登入</h1>
	<p align="center"><a href="javascript:history.back()">回上一頁</a></p>
	<form action="" method="POST" name="formAdd" id="formAdd">
	<table border="1" align="center" cellpadding="4">
	<tr>
		<th>欄位</th><th>資料</th>
	</tr>
	<tr>
		<td>帳號</td><td><input type="text" name="username" id="username"></td>
	</tr>
	<tr>
		<td>密碼</td><td><input type="text" name="password" id="password"></td>
	</tr>	
	<tr>
		<td colspan="2" align="center">
		<input name="action" type="hidden" value="add">
		<input type="submit" name="button" id="button" value="送出">
		<input type="reset" name="button2" id="button2" value="重填">	
		</td>
	</tr>
	</table>
	</form>

</body>
</html>