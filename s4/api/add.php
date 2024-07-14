<?php
include_once "./db.php";

// 將post方法傳入的table變數內容，首字轉大寫，用可變變數格式${}轉成變數名稱，assign成為變數$DB
$DB=${ucfirst($_POST['table'])};
// 將post方法傳入的table變數內容，存為變數$table，供 to() 使用
$table=$_POST['table'];

/* 以下為校園網站系統所需程式碼，用途為；DB寫入時可直接使用$_POST變數
// 若為admin在呼叫，則移除$_POST中資料表不存在的變數pw2
switch ($table) {
    case 'admin':
        unset($_POST['pw2']);
    break;
}
// 若有圖片暫存檔名(表為上傳圖片作業)，則設定正確的圖片存檔路徑與黨名並更新$_POST變數內圖檔檔名
if (isset($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}    
*/

// 非admin呼叫時，判斷除網站標題title外(校園網站系統所需)，預設sh欄位為1顯示(因admin資料表沒有sh欄位)
if ($table != 'admin') {
    $_POST['sh']=($table=='title')?0:1;
}

// 移除$_POST中資料表不存在的變數table
unset($_POST['table']);
// $_POST變數經調整後，DB寫入時直接使用$_POST變數
$DB->save($_POST);

to("../back.php?do=$table");

?>