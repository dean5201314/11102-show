<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息資料管理</p>
    <!-- 因為被include到back.php，所以action要以back.php位置找edit.php  -->
    <form method="post" action="./api/edit.php">
        <table width="100%" style="text-align: center;">
            <tbody>
                <tr class="yel">
                    <td width="80%">最新消息資料內容</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                $total=$DB->count();    //資料的總筆數
                $div=5;     //每頁顯示的資料筆數
                $pages=ceil($total/$div);   //總頁數
                $now=$_GET['p']??1;     //若未收到頁數，起始頁數預設為1
                $start=($now-1)*$div;   //起始頁的起始資料
                // 將$DB定義在db.php中，須注意事後$DB被覆蓋是否影響程式流程即可
                // $DB=${ucfirst($do)};
                $rows=$DB->all(" limit $start,$div");
                foreach ($rows as $row) {                    
                ?>
                <tr>
                    <td>
                        <!-- textarea的開始與結束標籤中間只能是資料，不可有空白或斷行符號，否則會被寫入資料庫中 -->
                        <textarea type="text" name="text[<?=$row['id'];?>]" 
                        style="width:90%;height:60px"><?=$row['text'];?></textarea>
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" 
                        <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="cent">
            <?php
            if ($now>1) {
                $prev=$now-1;
                echo "<a href='?do=$do&p=$prev'>  <  </a>"; 
                // echo "<a href='?do=news&p=$prev'>  &lt;  </a>";  可以用 &lt; 代替 <
            }
            for ($i=1; $i <= $pages ; $i++) {
                $fontsize=($now==$i)?'24px':'16px';
                echo "<a href='?do=$do&p=$i' style='font-size:$fontsize'>  $i  </a>";         
            }
            if ($now<$pages) {
                $next=$now+1;
                echo "<a href='?do=$do&p=$next'>  >  </a>"; 
                // echo "<a href='?do=news&p=$next'>  &gt;  </a>";  可以用 &gt; 代替 >
            }
            ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?=$do;?>">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$do?>.php?table=<?=$do?>')" value="新增最新消息資料"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>