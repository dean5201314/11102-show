<h2 class="ct">訂單管理</h2>
<h2 class="ct">會員管理</h2>
<!-- table.all>tr*2>td.tt.ct*3 -->
<table class="all">
    <tr>
        <th class="tt ct">訂單編號</th>
        <th class="tt ct">金額</th>
        <th class="tt ct">會員帳號</th>
        <th class="tt ct">姓名</th>
        <th class="tt ct">下單時間</th>
        <th class="tt ct">操作</th>
    </tr>
    <?php
    $rows=$Order->all();
    foreach ($rows as $row) {
    ?>
    <tr>
        <td class="pp ct">
            <a href="?do=detail&id=<?=$row['id'];?>">
                <?=$row['no'];?>
            </a>
        </td>
        <td class="pp ct"><?=$row['total'];?></td>
        <td class="pp ct"><?=$row['acc'];?></td>
        <td class="pp ct"><?=$row['name'];?></td>
        <!-- 因'orderdate'為timestamp，故用date()重新格式化符合要求，記得要先用strtotime()將資料轉成timestamp格式 -->
        <td class="pp ct"><?=date("Y/m/d",strtotime($row['orderdate']));?></td>
        <td class="pp ct">
        <?php
            echo "<button onclick='del(&#39;s4_mem&#39;,{$row['id']})'>刪除</button>";
        ?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
