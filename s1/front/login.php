<?php
if (isset($_GET['error'])) {
	/* 因alert是js語法，不能由php直接用，需用echo方式顯示於網頁上，
	alert括號內須為字串(前後加上引號)，否則部會觸發alert的彈出視窗*/
	echo "<script>alert('{$_GET['error']}')</script>";
}
?>

<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<!-- 切出marquee區塊,並在login.php,main.php,news.php用include加上跑馬燈功能 -->
	<?php include "marquee.php";?>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<!-- form的action不再用?do變數來include當前頁(index.php)php檔案執行，改重新導向api程式執行 -->
	<!-- <form method="post" action="?do=check" target="back"> -->
	<form method="post" action="./api/check.php">
		<p class="t botli">管理員登入區</p>
		<p class="cent">帳號 ： <input name="acc" autofocus="" type="text"></p>
		<p class="cent">密碼 ： <input name="pw" type="password"></p>
		<p class="cent"><input value="送出" type="submit"><input type="reset" value="清除"></p>
	</form>
</div>