<?php include_once "db.php";

// 如果前端傳來的資料有id陣列，則foreach讀出前端id陣列的每一筆資料
if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $idx => $id) {
        // 前端資料有del陣列，且目前資料的id在del陣列中，則刪除資料表中該筆id的資料
        if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
            $Menu->del($id);
        } else {
            // 否則讀出資料表中該筆id的資料，用前端資料更新相關欄位，寫回資料表中
            $row=$Menu->find($id);
            $row['text']=$_POST['text'][$idx];
            $row['href']=$_POST['href'][$idx];
            $Menu->save($row);
        }
    }
}

if (isset($_POST['add_text'])) {
    foreach ($_POST['add_text'] as $idx => $text) {
        $data=[];
        $data['text']=$text;
        $data['href']=$_POST['add_href'][$idx];
        $data['sh']=1;
        $data['menu_id']=$_POST['menu_id'];
        
        $Menu->save($data);
    }
}

to("../back.php?do=menu");
?>