<?php include_once "db.php";

$_SESSION['ans']=code(5);
$img=captcha($_SESSION['ans']);
echo $img;
