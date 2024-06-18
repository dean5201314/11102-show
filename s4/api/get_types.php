<?php
include_once "db.php";

// $types=$Type->all(['big_id'=>$_GET['big_id']]);
// 可將上述程式碼簡化成下一行，因$_GET陣列結構與all()內所需參數陣列結構相同，只有一個名稱為'big_id'的元素值
$types=$Type->all($_GET);
foreach ($types as $type) {
    echo "<option value='{$type['id']}'>{$type['name']}</option>";
}
?>