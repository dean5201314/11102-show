<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<!-- 切出marquee區塊,並在login.php,main.php,news.php用include加上跑馬燈功能 -->
	<?php include "marquee.php"; ?>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<h3>更多最新消息顯示區</h3>
	<hr>
	<?php
	// 從資料表讀取出所有要顯示的最新消息的資料總筆數
	$total = $DB->count(['sh' => 1]);    //資料的總筆數
	$div = 5;     //每頁顯示的資料筆數
	$pages = ceil($total / $div);   //總頁數
	$now = $_GET['p'] ?? 1;     //若未收到頁數，起始頁數預設為1
	$start = ($now - 1) * $div;   //起始頁的起始資料
	// 依分頁參數的要求，從資料表讀取出所有要顯示的最新消息        
	$news = $News->all(['sh' => 1], "  limit $start,$div");
	?>
	<!-- 此處會用到$start變數，所以php程式碼要移到上面，HTML才會讀得到$start變數 -->
	<ol start='<?= $start + 1; ?>'>
		<?php
		foreach ($news as $n) {
			// 在ul標籤下放入li標籤內的html內容
			echo "<li class='sswww'>";
			// 只取出每筆資料的前20個字(用mb_substr函數處理雙字元的字串資料)
			echo mb_substr($n['text'], 0, 20);
			// 在li標籤下放入class為all的子容器div區塊內的最新消息全部內容
			echo "<div class='all' style='display:none'>";
			echo $n['text'];
			echo "</div>";
			echo "...</li>";
		}
		?>
	</ol>

	<div class="cent">
		<?php
		if ($now > 1) {
			$prev = $now - 1;
			echo "<a href='?do=$do&p=$prev'>  <  </a>";
			// echo "<a href='?do=news&p=$prev'>  &lt;  </a>";  可以用 &lt; 代替 <
		}
		for ($i = 1; $i <= $pages; $i++) {
			$fontsize = ($now == $i) ? '24px' : '16px';
			echo "<a href='?do=$do&p=$i' style='font-size:$fontsize'>  $i  </a>";
		}
		if ($now < $pages) {
			$next = $now + 1;
			echo "<a href='?do=$do&p=$next'>  >  </a>";
			// echo "<a href='?do=news&p=$next'>  &gt;  </a>";  可以用 &gt; 代替 >
		}
		?>
	</div>
</div>

<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
</div>
<script>
	$(".sswww").hover(
		function() {
			// console.log("<pre>" + $(this).children(".all").html() + "</pre>")
			
			// 此處的$(this)，是指hover時，滑鼠滑過的元件(被hover的容器)，children(".all")指class=all的子容器，
			// html()指取出子容器內的所有html內容，css({"top": $(this).offset().top - 50})，修改彈出視窗的偏移位置
			// 以下是將被hover的元件下class為all的子容器內所有html()內容，前後加pre標籤後，放回#alt標簽下html()的位置，
			// 並用css設定修改彈出視窗的偏移位置
			$("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
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
</script>