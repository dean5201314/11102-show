<?php
include_once "db.php";

// 將傳入的 id,qt 以矩陣 key/value 格式存入 session的'cart'矩陣變數中
$_SESSION['cart'][$_POST['id']]=$_POST['qt'];

// 計算並回傳 $_SESSION['cart'] 這個變數中元素的數量
echo count($_SESSION['cart']);
