<?php
include_once "./db.php";
//取得資料表名稱,'table'是$_POST[]陣列中的key(name欄位)，對應存放著form傳來的value(資料表名稱)
$table=$_POST['table'];

//將資料表名稱轉成首字大寫的資料表物件變數
$DB=${ucfirst($table)};

//取得id為1的資料
$data=$DB->find(1);

//將資料中對應的欄位修改為post過來的值
$data[$table]=$_POST[$table];

//使用save更新至資料表
$DB->save($data);

// 因為是在back.php中被呼叫，所以要回到back.php，透過?do=total回到原來的頁面
// header("location:../back.php?do=total");
to("../back.php?do=$table");
?>