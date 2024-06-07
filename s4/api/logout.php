<?php
session_start();

// 登出:將所有session變數清除(代表移除了登入的身分)，實務上依登入身分逐一登出為宜
unset($_SESSION['s4_mem'],$_SESSION['s4_admin']);
// 用戶身分清除後，應回到首頁
header("location:../index.php");
?>