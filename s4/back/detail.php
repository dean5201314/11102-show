<?php
// 因為呼叫時有傳入 id，以 id 讀出訂單的詳細資料
$row=$Order->find($_GET['id']);
?>
<!-- 只有編號數值部分要顯示紅色，用span標籤做局部顯示 -->
<h2 class="ct">訂單編號<span style="color: red;"><?=$row['no'];?></span>的詳細資料</h2>
<!-- 複製"checkout.php"畫面來修改，用margin: 0 auto;消除表格上下間隙縫" -->
<table class="all" style="margin: 0 auto;">
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp">
            <?=$row['acc'];?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><?=$row['name'];?></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><?=$row['email'];?></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><?=$row['addr'];?></td>
    </tr>   
    <tr>
        <td class="tt ct">聯絡電話</td>
        <td class="pp"><?=$row['tel'];?></td>
    </tr>
</table>
<!-- 複製"buycart.php"商品資料畫面來修改，用margin: 0 auto;消除表格上下間隙縫" -->
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
    // 總計初始值預設為 0
    $sum=0;
    // 將資料庫已經序列化的cart欄位，進行unserialize()反序列化，存放到$cart變數中
    $cart=unserialize($row['cart']);
    // 用編號讀取商品資料表，顯示購物車中的商品資料及選購數量
    foreach ($cart as $id => $qt) {
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
    }
?>
</table>
<!-- 總價金額改採用資料庫讀出的'total'總價欄位來顯示 -->
<div class="all tt ct" style="margin: 0 auto;">總價:<?=$row['total'];?>元</div>

<div class="ct">
    <!-- 因不用form表單功能，故將input改為button標籤，按"返回"按鈕，重新定向到訂單管理頁面 -->
    <button onclick="location.href='?do=order'">返回</button>
</div>