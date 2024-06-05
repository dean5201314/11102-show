<?php
include_once "db.php";
/* 因reg.php用 $.post() 呼叫 "./api/reg.php"，所以接收的變數為$_POST，
   配合題意要求，將系統日期設為註冊日期 */
$_POST['regdate']=date("Y-m-d");
// 因$_POST內容與DB資料表結構(及欄位名稱)相同，故直接傳入$_POST到DB的save方法
$Mem->save($_POST);
// 因為是ajax非同步呼叫，若不回傳值(不知帳號建立是否成功)，程式仍會向下執行(實務上不該如此)
?>