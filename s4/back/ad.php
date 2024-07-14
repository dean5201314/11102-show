<h2 class="ct">動態消息管理</h2>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <!-- 因為被include到back.php，所以action要以back.php位置找edit.php  -->
    <form method="post" action="./api/edit.php">
        <table  class="all" width="100%" style="text-align: center;">
            <tbody>
                <tr>
                    <td  class="tt ct" width="80%">動態消息</td>
                    <td  class="tt ct" width="10%">顯示</td>
                    <td  class="tt ct" width="10%">刪除</td>
                </tr>
                <?php
                // 讀取所有的動態消息
                $rows=$Ad->all();
                foreach ($rows as $row) {                    
                ?>
                <tr>
                    <td class="pp ct">
                        <!-- 原先在text名稱欄位矩陣key值存入id，後來配合多資料表改用隱藏欄位傳id -->
                        <input type="text" name="text[]" style="width:90%" value="<?=$row['text'];?>">
                        <!-- 用input:hidden隱藏欄位存入id，傳id給api的edit.php -->
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                    </td>
                    <td class="pp ct">
                        <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" 
                        <?=($row['sh']==1)?'checked':'';?>>
                    </td>
                    <td class="pp ct">
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <!-- 因ad.php在back.php被include(引入)，所以可使用在back.php中引入前產生的 $do 變數 -->
                    <input type="hidden" name="table" value="<?=$do;?>">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$do?>.php?table=<?=$do?>')" value="新增動態消息"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>