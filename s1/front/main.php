<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!-- 切出marquee區塊,並在login.php,main.php,news.php用include加上跑馬燈功能 -->
    <?php include "marquee.php";?>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <!-- 將動畫的HTML區塊遷移到java script之前，這樣在執行java script時，才有可以執行的對象 -->
    <div style="width:100%; padding:2px; height:290px;">
        <div id="mwww" loop="true" style="width:100%; height:100%;">
            <div style="width:99%; height:100%; position:relative;" class="cent">
            沒有資料
            </div>
        </div>
    </div>

    <script>
        var lin = new Array();
        <?php
        /* 將動畫檔名存入陣列的三種彈性化的方法：
        1.只將動畫檔名存為陣列個別元素
        2.將動畫檔名與陣列格式儲存為完整陣列
        3.用push函數儲存為完整陣列 
        */
        // 從資料表讀取出所有要顯示的動畫檔名'img'        
        $lins=$Mvim->all(['sh'=>1]);
        // 方法1 & 方法2：宣告$linarr[]空陣列
        // $linarr=[];
        // 從資料集dataset變數$lins中，逐一取出資料列datarow，放入資料列變數$lin
        foreach ($lins as $lin) {
            // 方法1：將檔名欄位'img'的值，前後加上單引號(字串化)，放入$linarr[]陣列中
            // $linarr[]="'".$lin['img']."'";
            // 方法2：將檔名欄位'img'的值，放入$linarr[]陣列中
            // $linarr[]=$lin['img'];
            echo "lin.push('{$lin['img']}');";
        }

        // 方法1：將$linarr[]陣列中元素，用，連接起來，放入字串變數$linstr中
        // $linstr=join(",",$linarr);
        // 方法2：將$linarr陣列中元素(純檔名)，用join轉成字串變數，加上陣列格式轉存為完整陣列
        // $linstr="['".join("','",$linarr)."']";
        ?>

        // 方法1：將字串變數$linstr內容放入空陣列lin中，組成完整的陣列宣告語法
        /* lin=[<?php //echo $linstr;?>]; */
        // 方法2：將字串變數加上陣列格式的完整陣列，存入js的lin變數
        // lin=<?php //echo $linstr;?>;

        var now = 0;
        ww();
        // 若動畫檔名陣列中有元素(長度>1)，則定時呼叫ww()函數顯示動畫
        if (lin.length > 1) {
            // 3000c毫秒後，每隔3000c毫秒，執行ww()函數一次
            setInterval("ww()", 3000);
            // 設定顯示動畫的陣列指標為1
            now = 1;
        }

        // 宣告ww()函數內容
        function ww() {
            // 將顯示動畫的指令崁入HTML指令中
            $("#mwww").html("<embed loop=true src='./img/" + lin[now] + "' style='width:99%; height:100%;'></embed>")
            //$("#mwww").attr("src",lin[now])

            // 將顯示動畫的陣列指標加1
            now++;
            // 若顯示動畫的陣列指標超過動畫檔名陣列長度
            if (now >= lin.length)
                // 將顯示動畫的陣列指標歸零
                now = 0;
        }
    </script>
    <div style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
        <span class="t botli">最新消息區
            <?php
            // 若所有要顯示的最新消息超過5筆，則顯示More...的超連結
            if ($News->count(['sh'=>1])>5) {
                echo "<a href='?do=news' style='float: right;'>More...</a>";
            }
            ?>
        </span>
        <ul class="ssaa" style="list-style-type:decimal;">

        <?php
        // 從資料表讀取出所有要顯示的最新消息        
        $news=$News->all(['sh'=>1],' limit 5');
        foreach ($news as $n) {
            // 在ul標籤下放入li標籤內的html內容
            echo "<li>";
            // 只取出每筆資料的前20個字(用mb_substr函數處理雙字元的字串資料)
            echo mb_substr($n['text'],0,20);            
            // 在li標籤下放入class為all的子容器div區塊內的最新消息全部內容
            echo "<div class='all' style='display:none'>";
            echo $n['text'];                
            echo "</div>";
            echo "...</li>";
        }

        ?>

        </ul>
        <div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">

        </div>
        <script>
            $(".ssaa li").hover(
                function() {
                    // 此處的$(this)，是指hover時，滑鼠滑過的元件(被hover的容器)，children(".all")指class=all的子容器，
                    // html()指取出子容器內的所有html內容
                    // 以下是將被hover的元件下class為all的子容器內所有html()內容，前後加pre標籤後，放回#altt標簽下html()的位置
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