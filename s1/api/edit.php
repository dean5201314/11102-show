<?php
include_once "./db.php";
$table=$_POST['table'];
$DB=${ucfirst($table)};
unset($_POST['table']);

/* 原先在text名稱欄位矩陣key值存入id，才需做下述處理，後來配合多資料表改用隱藏欄位傳id即可捨棄
if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $id) {
        // 為考試合併功能程式用，減少代碼縮減打字時間
        // 如果有傳入id，就新增text欄位塞入空值，以利下方foreach運行
        $_POST['text'][$id]='';
    }
}
*/

// 原先在text名稱欄位矩陣key值存入id，才用$_POST['text']做foreach
// foreach ($_POST['text'] as $id => $text) {

// 改用隱藏欄位傳id，需用$_POST['id']做foreach
foreach ($_POST['id'] as $key => $id) {    
    // 如果有刪除的多選項，判斷text中隱藏的id是否在刪除的多選項中
    if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
        $DB->del($id);
    } else {
        $row=$DB->find($id);
        if (isset($row['text'])) {
            // 原先$text從foreach中取得，才需做下述處理
            // $row['text']=$text;
            // 改用$_POST['id']做foreach，需變更為下述處理
            $row['text']=$_POST['text'][$key];
        }
        switch ($table) {
            case 'title':                                
                $row['sh']=(isset($_POST['sh']) && $_POST['sh']==$id)?1:0;
            break;
            case 'admin':
                $row['acc']=$_POST['acc'][$key];
                $row['pw']=$_POST['pw'][$key];
            break;
            case 'menu':                                
            break;            
            default:
                $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            break;
        }       
        /* 因應多資料表各有不同處理規則，將判斷式if..else..改用上述switch..case..來執行不同處理規則
        if ($table=='title') {
            $row['sh']=(isset($_POST['sh']) && $_POST['sh']==$id)?1:0;
        } else {
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        }
        */
        $DB->save($row);
    }
}

to("../back.php?do=$table");
?>