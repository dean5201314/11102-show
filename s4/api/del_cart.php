<?php
// 此處因為只做刪除session中的id資料，所以不需要include db.php(因為會帶入一整個物件)
session_start();

// 刪除session矩陣變數cart(key1)下的矩陣變數id(key2)，因來源端用$.post()呼叫，故用$_POST['id']
unset($_SESSION['cart'][$_POST['id']]);
