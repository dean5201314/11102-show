<?php
include_once "db.php";

// 依傳入的sh,id更新s4_goods商品資料表內容，請參閱 class DB 中 save() 方法
$Goods->save($_POST);

/* 傳入$_POST參數:$_POST['sh'] & $_POST['id'];用以完成下列sql指令: 
update s4_goods set sh=$_POST['sh'] where id=$_POST['id']; */
?>