<?php 
session_start();
$_SESSION['admin'] = false;
header("Location:EnglishLearning.php");
?>