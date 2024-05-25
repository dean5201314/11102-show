<?php include_once './api/db.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>卓越科技大學校園資訊系統</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
    <button class="root" style='border-radius: 50%;margin:10px;background-color:greenyellow;font-size:20px;padding:20px;'>
        <a href="../index.html" style='color:brown'>回目錄</a>
    </button>
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>
	<!-- <iframe style="display:none;" name="back" id="back"></iframe> -->
	<div id="main">
		<?php
		$title=$Title->find(['sh'=>1]);
		?>
		<a title="<?=$title['text'];?>" href="./index.php">
			<div class="ti" style="background:url(&#39;./img/<?=$title['img'];?>&#39;); background-size:cover;"></div><!--標題-->
		</a>
		<div id="ms">
			<div id="lf" style="float:left;">
				<div id="menuput" class="dbor">
					<!--主選單放此-->
					<span class="t botli">主選單區</span>
					<?php
					$mainmu=$Menu->all(['sh'=>1,'menu_id'=>0]);
					foreach ($mainmu as $main) {						
					?>
					<div class="mainmu">
						<a href="<?=$main['href'];?>" style="color:#000; font-size:13px; text-decoration:none;">
							<?=$main['text'];?>
						</a>
						<?php
						if ($Menu->count(['menu_id'=>$main['id']])>0) {
							echo "<div class='mw'>";
							$subs=$Menu->all(['menu_id'=>$main['id']]);
							foreach ($subs as $sub) {
								echo "<a href='{$sub['href']}'>";
								echo "<div class='mainmu2'>";
								echo $sub['text'];
								echo "</div>";
								echo "</a>";
							}
							echo "</div>";
						}
						?>
					</div>
					<?php
					}
					?>
				</div>
				<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
					<span class="t">進站總人數 :<?=$Total->find(1)['total'];?></span>
				</div>
			</div>
			<?php
			$do=$_GET['do']??'main';
			$file="./front/{$do}.php";
			if (file_exists($file)) {
				include $file;
			} else {
				include "./front/main.php";
			}
			/*
			switch ($do) {
				case 'login':
					include "./front/login.php";
					break;
				case 'news':
					include "./front/news.php";
					break;
				default:
					include "./front/main.php";
					break;
			}
			*/
			?>
			<!-- 以下部分，與前面的/front/news.php中的程式碼重複(div的id & JQ事件方法)，會蓋掉前面news.php的程式碼造成錯誤，需註解或刪除 -->
			<!-- <div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
			<script>
				$(".sswww").hover(
					function() {
						$("#alt").html("" + $(this).children(".all").html() + "").css({
							"top": $(this).offset().top - 50
						})
						$("#alt").show()
					}
				)
				$(".sswww").mouseout(
					function() {
						$("#alt").hide()
					}
				)
			</script> -->
			<div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
				<!--右邊-->
				<?php
				// 依登入狀態，決定使用者回後台或登入頁面
				if (isset($_SESSION['login'])) {
				?>
				<!-- 若已登入，顯示"返回管理"按鍵，可直接回後台 -->
				<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo(&#39;back.php&#39;)">
				返回管理</button>
				<?php
				} else {
				?>
				<!-- 若尚未登入，顯示"管理登入"按鍵，只能到登入頁面 -->
				<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo(&#39;?do=login&#39;)">
				管理登入</button>
				<?php
				}
				?>
				<div style="width:89%; height:480px;" class="dbor">
					<span class="t botli">校園映象區</span>
					<div class="cent" onclick="pp(1)"><img src="./icon/up.jpg" alt=""></div>
					<?php
					// 從資料表讀取出所有要顯示的校園映象圖片資料
					$imgs=$Image->all(['sh'=>1]);
					foreach ($imgs as $idx => $img) {
					?>
						<!-- 產生要顯示的HTML區塊(含id & class)與圖片，因js上一頁會減一(nowpage--)，故ssaa的id由0開始(避免最後一頁只剩2張圖) -->
						<div id="ssaa<?=$idx;?>" class="im cent">
							<img src="./img/<?=$img['img'];?>" style="width:150px; height: 100px;border: 3px solid orange;margin: 3px;">
						</div>						
					<?php
					}
					?>
					<div class="cent" onclick="pp(2)"><img src="./icon/dn.jpg" alt=""></div>
					<script>
						// num表要顯示的圖片總數，須由0改成從資料表讀出count數 $Image->count(['sh'=>1]);				
						// var nowpage = 0,num = 0;
						var nowpage = 0,num = <?=$Image->count(['sh'=>1]);?>;
						// 因為php會吃掉程式後面的內容，最好留空白行或加;結束符號，比較安全

						// 判斷式中，邏輯運算子前後宜留一格空白，數學運算式最好加括號區分邏輯運算子邊界
						function pp(x) {
							var s, t;
							if (x == 1 && (nowpage - 1) >= 0) {
								nowpage--;
							}
							// if (x == 2 && (nowpage + 1) * 3 <= num * 1 + 3) {
							// 原始碼為上一行，邏輯有錯，要改成下一行程式碼
							if (x == 2 && (nowpage + 1) <= (num * 1 - 3)) {
								nowpage++;
							}
							$(".im").hide()
							for (s = 0; s <= 2; s++) {
								// s * 1是為解決早期js資料型態問題，透過數學運算強迫s & t資料型態保持為數字
								t = s * 1 + nowpage * 1;
								$("#ssaa" + t).show()
							}
						}
						pp(1)
					</script>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
			<span class="t" style="line-height:123px;"><?=$Bottom->find(1)['bottom'];?></span>
		</div>
	</div>

</body>

</html>