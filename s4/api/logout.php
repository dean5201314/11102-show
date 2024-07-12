<?php
session_start();

// 登出:將所有session變數清除(代表移除了登入的身分)，實務上依登入身分逐一登出為宜
unset($_SESSION['s4_mem'],$_SESSION['s4_admin']);

/* 登出時，可一併清除購物車變數($_SESSION['cart'])，但實務上也有不清除的考慮:方便客戶重新登入後，繼續購物流程
if (isset($_SESSION['cart'])) {tj/
    unset($_SESSION['cart']);
}
*/

// 用戶身分清除後，應回到首頁
header("location:../index.php");