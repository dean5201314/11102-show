<div class="ct">
    <button onclick="location.href='?do=add_admin'">新增管理員</button>
</div>

<!-- table.all>tr*2>td.tt.ct*3 -->
<table class="all">
    <tr>
        <th class="tt ct">帳號</th>
        <th class="tt ct">密碼</th>
        <th class="tt ct">管理</th>
    </tr>
    <?php
    $rows=$Admin->all();
    foreach ($rows as $row) {
    ?>
    <tr>
        <td class="pp ct"><?=$row['acc'];?></td>
        <td class="pp ct"><?=str_repeat("*",strlen($row['pw']));?></td>
        <td class="pp ct">
            <?php
            // admin帳號禁止編輯，並顯示"此帳號為最高權限"
            if ($row['acc']=='admin') {
                echo "此帳號為最高權限";
            } else {
                // 因location.href=後的參數要放引號中，但此時 雙引號" 及單引號' 都已經使用，故改用內碼方式輸入&#39;(代表單引號')
                echo "<button onclick='location.href=&#39;?do=edit_admin&id={$row['id']}&#39;'>修改</button>";
                echo "<button onclick='del(&#39;s4_admin&#39;,{$row['id']})'>刪除</button>";
            }            
            ?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div class="ct">
    <button onclick="location.href='index.php'">返回</button>
</div>
