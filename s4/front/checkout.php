<h2 class="ct">填寫資料</h2>
<?php
$row=$Mem->find(['acc'=>$_SESSION['s4_mem']]);
?>

<!-- 因為要精簡程式碼，故在此設計為使用form表單並共用"./api/reg.php"程式 -->
<form action="./api/order.php" method="post">
<!-- 若不想共用"./api/reg.php"程式，form表單action可改用"./api/save_mem.php"
<form action="./api/save_mem.php" method="post"> -->

<!-- 複製"edit_mem.php"畫面來修改，縮短時間，用margin: 0 auto;消除表格上下間隙縫" -->
<!-- table.all>tr*6>td.tt.ct+td.pp>input:text -->
<table class="all" style="margin: 0 auto;">
    <tr>

        <td class="tt ct">登入帳號</td>
        <td class="pp">
            <?=$row['acc'];?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" value="<?=$row['name'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" value="<?=$row['email'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><input type="text" name="addr" value="<?=$row['addr'];?>"></td>
    </tr>   
    <tr>
        <td class="tt ct">聯絡電話</td>
        <td class="pp"><input type="text" name="tel" value="<?=$row['tel'];?>"></td>
    </tr>
</table>
<!-- 複製"buycart.php"商品資料畫面來修改，縮短時間，用margin: 0 auto;消除表格上下間隙縫" -->
<!-- table.all>tr.ct.tt*2 -->
<table class="all" style="margin: 0 auto;">
    <tr class="ct tt">
        <!-- td*7 -->
            <td>商品名稱</td>
            <td>編號</td>
            <!-- 此處數量是指購物車中輸入的數量 -->
            <td>數量</td>
            <td>單價</td>
            <!-- 此處小計是指商品單價 * 購物車中輸入的數量 -->
            <td>小計</td>
    </tr>
<?php
    $sum=0; //總計初始值預設為 0
    // 用編號讀取商品資料表，顯示購物車中的商品資料及選購數量
    foreach ($_SESSION['cart'] as $id => $qt) {
        $goods=$Goods->find($id);
?>
        <!-- 顯示表格表身商品資料列 -->
        <tr class="ct pp">
            <!-- td*7 -->
                <td><?=$goods['name'];?></td>
                <td><?=$goods['no'];?></td>
                <td><?=$qt;?></td>
                <td><?=$goods['price'];?></td>
                <td><?=$goods['price'] * $qt;?></td>
        </tr>
<?php
        $sum+=$goods['price'] * $qt;
    }
?>
</table>
<!-- 新增總價區塊顯示總價金額，用.all調整寬度，用margin: 0 auto;消除表格上下間隙縫" -->
<div class="all tt ct" style="margin: 0 auto;">總價:<?=$sum;?>元</div>

<!-- .ct>btn*2 -->
<div class="ct">
    <input type="hidden" name="id" value="<?=$row['id'];?>">
    <input type="submit" value="確定送出">
    <!-- 按"返回修改訂單"，重新定向到購物車頁面 -->
    <input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'">
</div>

</form>
