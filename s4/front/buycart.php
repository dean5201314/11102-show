<?php
/* 因應未登入前點了購物車，改為先將點選結果存入 session中，避免登入後，點選結果因未儲存而消失，
   若有是否收到商品編號，表按下我要購買，就先將商品編號(key)及數量(value)存入購物車矩陣 */
if (isset($_GET['id'])) {
    $_SESSION['cart'][$_GET['id']]=$_GET['qt'];
}

/* 若$_SESSION['s4_mem']不存在，表示尚未登入，重新導向到登入頁面 */
if (!isset($_SESSION['s4_mem'])) {
    // 使用 HTML Meta 標籤重定向，因不涉及設置 HTTP標頭，可以避免標頭已經發送的情況下出現錯誤
    echo '<meta http-equiv="refresh" content="0;url=?do=login">';
    // 以下的to()採用header()方式重新定向網頁，會因輸出前有HTML輸出(含HTML註解)，而出現修改HTTP標頭(header)
    // to("?do=login");
    exit();
}

// 顯示提示訊息：登入者{$_SESSION['s4_mem']}的購物車
echo "<h2 class='ct'>{$_SESSION['s4_mem']}的購物車</h2>";

// 如沒有$_SESSION購物車矩陣變數，顯示提示訊息：購物車中尚無商品
// if (!isset($_SESSION['cart'])) {
// 若session變數cart沒有值，empty()仍會顯示提示訊息，可避免用!isset()發生沒有值而不顯示提示訊息
if (empty($_SESSION['cart'])) {
    echo "<h2 class='ct'>購物車中尚無商品</h2>";
}
// else { dd($_SESSION['cart']); }  使用 dd($_SESSION['cart']); 測試購物車輸入結果
// 如有$_SESSION購物車矩陣變數，顯示購物車中的商品資料及選購數量
else 
{
?>
<!-- 顯示表格標題列 -->
<!-- table.all>tr.ct.tt*2 -->
<table class="all">
    <tr class="ct tt">
        <!-- td*7 -->
            <td>編號</td>
            <td>商品名稱</td>
            <!-- 此處數量是指購物車中輸入的數量 -->
            <td>數量</td>
            <td>庫存量</td>
            <td>單價</td>
            <!-- 此處小計是指商品單價 * 購物車中輸入的數量 -->
            <td>小計</td>
            <td>刪除</td>
    </tr>
<?php
    // 用編號讀取商品資料表，顯示購物車中的商品資料及選購數量
    foreach ($_SESSION['cart'] as $id => $qt) {
        $goods=$Goods->find($id);
?>
        <!-- 顯示表格表身商品資料列 -->
        <tr class="ct pp">
            <!-- td*7 -->
                <td><?=$goods['no'];?></td>
                <td><?=$goods['name'];?></td>
                <td><?=$qt;?></td>
                <td><?=$goods['stock'];?></td>
                <td><?=$goods['price'];?></td>
                <td><?=$goods['price'] * $qt;?></td>
                <td><img src="./icon/0415.jpg" onclick="delcart(<?=$id;?>)"></td>
        </tr>
<?php
    }
?>
</table>
<div class="ct">
    <img src="./icon/0411.jpg">
    <img src="./icon/0412.jpg">
</div>
<script>
function delcart(id){
    $.post("./api/del_cart.php",{id},()=>{
        // 此處不要用reload()，否則刪除最後一筆時，會因為reload()時帶有id變數而在刪除後又建立id資料，重複循環
        // location.reload();
        // 此處用href()，只傳do，不傳其他變數，刪除最後一筆時不會再重複建立id資料，達到預期效果
        location.href="?do=buycart";
    })
}
</script>
<?php
}