<?php
// 開出新的session
session_start();
// 清除掉現有的 session 變數 login
unset($_SESSION['login']);
// 登出成功不應留在後台，應重新導回前台首頁
header("location:../index.php");

?>