<?php
include_once "db.php";

/* 因為會上傳圖片，若$_FILES['img']['tmp_name']存在，表示檔案上傳成功 */
if (!empty($_FILES['img']['tmp_name'])) {
    $_POST['img']=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/{$_FILES['img']['name']}");
}

// 若非編輯模式(表新增的狀態)，才產生商品編號及預設為上架
if (!isset($_POST['id'])) {
    /* 用隨機亂數產生商品編號，實務上存檔前應先確認新商品編號在資料表中不重複，
    才寫入資料表(可用while功能檢查是否重複) */
    $_POST['no']=rand(100000,999999);
    // 設定預設為顯示(sh=1)
    $_POST['sh']=1;
}

$Goods->save($_POST);
to("../back.php?do=th");

?>