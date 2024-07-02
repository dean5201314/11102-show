<?php
include_once "db.php";

/* 模擬測試ajax後php程式執行結果
dd($_POST);
$_POST['table']='s4_mem';
$_POST['acc']='test';
$_POST['pw']='1234';
dd($_POST);
*/

// 將$_POST['table']存入變數$table，以便自動區分資料表來源
$table=$_POST['table'];
// 拿掉$_POST['table']，使$_POST只剩下'acc'及'pw'兩個元素
unset($_POST['table']);
// 依資料表來源產生相關的資料表物件
$db=new DB($table);

/* 模擬測試檢視系統變數$_POST與$_SESSION的變化
dd($_POST);
unset($_SESSION[$table]);
dd($_SESSION);
*/

// 用$_POST(只剩'acc'及'pw')，判斷符合帳號,密碼的資料筆數
$chk=$db->count($_POST);

// dd($_POST);

// 若$chk!=0則布林值為true(php是如此判斷)，$chk=0則布林值為false
if ($chk) {
    // 若布林值為真(true)，則回傳資料筆數並將帳號存在session的資料表名稱變數中
    echo $chk;
    $_SESSION[$table]=$_POST['acc'];
} else {
    // 若布林值為假(false)，則回傳資料筆數(0筆)
    echo $chk;
}

// dd($_SESSION);
