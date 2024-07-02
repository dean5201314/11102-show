<?php
/* 若點選"我要購買"，則到購物車功能，如果尚未登入($_SESSION['s4_mem']未定義)，重新導向到登入頁面 */
if (!isset($_SESSION['s4_mem'])) {
    to("?do=login");
    exit();
}

echo "<h2 class='ct'>{$_SESSION['s4_mem']}的購物車</h2>";

if (!isset($_SESSION['cart'])) {
    echo "<h2 class='ct'>購物車中尚無商品</h2>";
} else {
    if (isset($_GET['id'])) {
        $_SESSION['cart'][$_GET['id']]=$_GET['qt'];
    } 
        
    dd($_SESSION['cart']);

}