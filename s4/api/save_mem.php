<?php
include_once "db.php";

// 因$_POST內容與DB資料表結構(及欄位名稱)相同，故直接傳入$_POST到DB的save方法
$Mem->save($_POST);

/* 結束後重新導向回到"../back.php?do=mem"原畫面 */
to("../back.php?do=mem");
