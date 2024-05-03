<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!-- 切出marquee區塊,並在login.php,main.php,news.php用include加上跑馬燈功能 -->
    <?php include "marquee.php";?>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <script>
        var lin = new Array();
        <?php
        // 從資料表讀取出所有要顯示的動畫檔名'img'
        $lins=$Mvim->all(['sh'=>1]);
        $linarr=[];
        // 從資料集dataset變數$lins中，逐一取出資料列datarow，放入資料列變數$lin
        foreach ($lins as $lin) {
            // 將檔名欄位'img'的值，前後加上單引號(字串化)，放入$linarr[]陣列中
            $linarr[]="'".$lin['img']."'";            
        }
        // 將$linarr[]陣列中元素，用，連接起來，放入字串變數$linstr中
        $linstr=join(",",$linarr);
        ?>
        // 將字串變數$linstr內容放入空陣列lin中，組成完整的陣列宣告語法
        lin=[<?=$linstr;?>];
        var now = 0;
        if (lin.length > 1) {
            // 3000c毫秒後，每隔3000c毫秒，執行ww()函數一次
            setInterval("ww()", 3000);
            now = 1;
        }

        // 宣告ww()函數內容
        function ww() {
            $("#mwww").html("<embed loop=true src='./img/" + lin[now] + "' style='width:99%; height:100%;'></embed>")
            //$("#mwww").attr("src",lin[now])
            now++;
            if (now >= lin.length)
                now = 0;
        }
    </script>
    <div style="width:100%; padding:2px; height:290px;">
        <div id="mwww" loop="true" style="width:100%; height:100%;">
            <div style="width:99%; height:100%; position:relative;" class="cent">
            沒有資料
            </div>
        </div>
    </div>
    <div style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
        <span class="t botli">最新消息區
        </span>
        <ul class="ssaa" style="list-style-type:decimal;">
        </ul>
        <div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
        <script>
            $(".ssaa li").hover(
                function() {
                    $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
                    $("#altt").show()
                }
            )
            $(".ssaa li").mouseout(
                function() {
                    $("#altt").hide()
                }
            )
        </script>
    </div>
</div>