<?php
include_once "db.php";

// 因$_POST陣列結構與save()內所需參數陣列結構相同，故直接傳入$_POST當參數
$Type->save($_POST);
?>