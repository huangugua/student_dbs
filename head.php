<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
</head>
<body>
	<div class="sui-container">
		<div class="my-head">学生管理系统 V2.0 <div style="display: inline-block;float:right;"></div></div><br/>
		<p id="welcome" style="font-size: 18px;text-align: right;margin-top: -43px;">欢迎<span style="color:#e00;"><?php echo $_SESSION['usname']; ?></span>登录成功!&nbsp;&nbsp;<a href="logoin.php">退出-></a></p>