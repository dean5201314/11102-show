<?php
session_start();
// $_GET['ans']:傳給後端的驗證碼
/* 比較正確答案$_SESSION['ans']與傳給後端的驗證碼$_GET['ans']，
   若等於回傳 1，否則回傳 0 */
/*if ($_SESSION['ans']==$_GET['ans']) {
    echo 1;
} else {
    echo 0;
}*/

// 將上述的判斷式，簡化為下述的三元運算式
echo ($_SESSION['ans']==$_GET['ans'])?1:0;

?>