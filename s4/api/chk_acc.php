<?php
include_once "db.php";

// 因reg.php用 $.get() 呼叫 chk_acc.php，所以接收的變數為$_GET['acc']
echo $Mem->count(['acc'=>$_GET['acc']]);

?>