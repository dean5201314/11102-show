<h2 class="ct">會員管理</h2>
<!-- table.all>tr*2>td.tt.ct*3 -->
<table class="all">
    <tr>
        <th class="tt ct">姓名</th>
        <th class="tt ct">會員帳號</th>
        <th class="tt ct">註冊日期</th>
        <th class="tt ct">操作</th>
    </tr>
    <?php
    $rows=$Mem->all();
    foreach ($rows as $row) {
    ?>
    <tr>
        <td class="pp ct"><?=$row['name'];?></td>
        <td class="pp ct"><?=$row['acc'];?></td>
        <td class="pp ct"><?=$row['regdate'];?></td>
        <td class="pp ct">
        <?php
            // 因location.href=後的參數要放引號中，但此時 雙引號" 及單引號' 都已經使用，故改用內碼方式輸入&#39;(代表單引號')
            echo "<button onclick='location.href=&#39;?do=edit_mem&id={$row['id']}&#39;'>修改</button>";
            echo "<button onclick='del(&#39;s4_mem&#39;,{$row['id']})'>刪除</button>";
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
