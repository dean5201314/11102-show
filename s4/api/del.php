<?php
include_once "db.php";

/* 設定資料表變數$db，再依資料表變數$db做刪除的動作 */
// $table=$_POST['table'];
// $db=new DB($table);
// 可將上述兩行程式碼合併簡化成單行程式碼
$db=new DB($_POST['table']);

// 利用資料表變數$db，快速刪除相應的資料(實務上可再檢查資料是否存在?應否刪除?)
$db->del($_POST['id']);
