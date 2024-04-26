<?php
include_once "./db.php";

$DB=${ucfirst($_POST['table'])};
$table=$_POST['table'];
// 若為admin在呼叫，則移除$_POST中資料表不存在的變數pw2
switch ($table) {
    case 'admin':
        unset($_POST['pw2']);
    break;
}
if (isset($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}
// 非admin呼叫時，判斷除網站標題title外，預設sh欄位為1顯示(因admin資料表沒有sh欄位)
if ($table != 'admin') {
    $_POST['sh']=($table=='title')?0:1;
}
// 移除$_POST中資料表不存在的變數table
unset($_POST['table']);
$DB->save($_POST);

to("../back.php?do=$table");

?>