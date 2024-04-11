<?php
include_once "./db.php";

$bottom=$Bottom->find(1);
$bottom['bottom']=$_POST['bottom'];
$Bottom->save($bottom);
// header("location:../back.php?do=total");
// 因為是在back.php中被呼叫，所以要回到back.php，透過?do=total回到原來的頁面
to("../back.php?do=bottom");

?>