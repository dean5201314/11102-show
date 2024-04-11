<?php
include_once "./db.php";

$total=$Total->find(1);
$total['total']=$_POST['total'];
$Total->save($total);
// header("location:../back.php?do=total");
// 因為是在back.php中被呼叫，所以要回到back.php，透過?do=total回到原來的頁面
to("../back.php?do=total");

?>