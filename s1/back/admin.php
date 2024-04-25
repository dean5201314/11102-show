<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">管理者帳號管理</p>
    <!-- 因為被include到back.php，所以action要以back.php位置找edit.php  -->
    <form method="post" action="./api/edit.php">
        <table width="100%" style="text-align: center;">
            <tbody>
                <tr class="yel">
                    <td width="45%">帳號</td>
                    <td width="45%">密碼</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                // 將$DB定義在db.php中，須注意事後$DB被覆蓋是否影響程式流程即可
                // $DB=${ucfirst($do)};
                $rows=$DB->all();
                foreach ($rows as $row) {                    
                ?>
                <tr>
                    <td>
                        <input type="text" name="acc[]" style="width:90%" value="<?=$row['acc'];?>">
                    </td>
                    <td>
                        <input type="password" name="pw[]" value="<?=$row['pw'];?>">
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    </td>
                </tr>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?=$do;?>">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$do?>.php?table=<?=$do?>')" value="新增管理者帳號"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>