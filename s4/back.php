<?php include_once './api/db.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0057)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>┌精品電子商務網站」</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<!-- 因下一行中js.js已用到jq程式碼，故需在js.js之前先引入"jquery-3.4.1.min.js" -->
	<script src="./js/jquery-3.4.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
	<iframe name="back" style="display:none;"></iframe>
	<div id="main">
		<div id="top">
			<!-- 點選網站banner，由原始的回到後台當前頁改成回到前台首頁 -->
			<!-- <a href="?"> -->
			<a href="index.php">
				<img src="./icon/0416.jpg">
			</a>
			<img src="./icon/0417.jpg">
		</div>
		<div id="left" class="ct">
			<div style="min-height:400px;">
				<a href="?do=admin">管理權限設置</a>
				<a href="?do=th">商品分類與管理</a>
				<a href="?do=order">訂單管理</a>
				<a href="?do=mem">會員管理</a>
				<a href="?do=bot">頁尾版權管理</a>
				<a href="?do=news">最新消息管理</a>
				<!-- 登出:直接呼叫"./api/logout.php"程式，將session的管理員變數清除 -->
				<!-- <a href="?do=logout" style="color:#f00;">登出</a> -->
				<a href="./api/logout.php" style="color:#f00;">登出</a>
			</div>
		</div>
		<div id="right">
			<?php
			$do = $_GET['do'] ?? 'admin';
			$file = "./back/{$do}.php";
			if (isset($file)) {
				include $file;
			} else {
				include "./back/admin.php";
			}
			?>
		</div>
		<div id="bottom" style="line-height:70px; color:#FFF; background:url(./icon/bot.png);" class="ct">
			<?= $Bottom->find(1)['bottom']; ?>
		</div>
	</div>
	<!-- 原先因bootstrap建議而放最後面，但因先前已用到js或jq程式碼，最後才引入會有問題，故需向上移 -->
	<!-- <script src="./js/jquery-3.4.1.min.js"></script> -->
</body>

</html>