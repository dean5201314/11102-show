<?php
include_once "db.php";

// 若共用reg.php，$_POST['id']不存在時為新增，需設定註冊日期
if (!isset($_POST['id'])) {
   /* 因reg.php新增用ajax以$.post()呼叫"./api/reg.php"，所以接收的變數為$_POST，
      配合題意要求，將系統日期設為註冊日期 */
   $_POST['regdate']=date("Y-m-d");
}
// 因$_POST內容與DB資料表結構(及欄位名稱)相同，故直接傳入$_POST到DB的save方法
$Mem->save($_POST);
// 因為是ajax非同步呼叫，若不回傳值(不知帳號建立是否成功)，程式仍會向下執行(實務上不該如此)
/* 若資料表建立失敗，應請用戶重新輸入資料，帳號建立成功才走後續流程 */

// 若共用reg.php，$_POST['id']存在時為編輯，結束後要回到原畫面
if (isset($_POST['id'])) {
   /* 編輯結束後重新導向回到"../back.php?do=mem"原畫面 */
   to("../back.php?do=mem");
}
?>