<?php
include_once "./db.php";
$table=$_POST['table'];
$DB=${ucfirst($table)};
unset($_POST['table']);

if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $id) {
        // 為考試合併功能程式用，減少代碼縮減打字時間
        // 如果有傳入id，就新增text欄位塞入空值，以利下方foreach運行
        $_POST['text'][$id]='';
    }
}

foreach ($_POST['text'] as $id => $text) {
    // 如果有刪除的多選項，判斷text中隱藏的id是否在刪除的多選項中
    if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
        $DB->del($id);
    } else {
        $row=$DB->find($id);
        if (isset($row['text'])) {
            $row['text']=$text;            
        }
        if ($table=='title') {
            $row['sh']=(isset($_POST['sh']) && $_POST['sh']==$id)?1:0;
        } else {
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        }
        
        $DB->save($row);
    }
}

to("../back.php?do=$table");
?>