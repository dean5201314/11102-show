<?php
include_once 'db.php';

// 產生編號欄位'no'加入到$_POST，編號規則=日期(勿用"Y-m-d"格式化)+自定義編號(用rand()亂數產生)
$_POST['no']=date("Ymd").rand(100000,999999);
// 將$_SESSION['cart']欄位用serialize()序列化後，產生購物車欄位'cart'加入到$_POST
$_POST['cart']=serialize($_SESSION['cart']);
// 用$_SESSION['s4_mem']，產生帳號欄位'acc'加入到$_POST
$_POST['acc']=$_SESSION['s4_mem'];

$Order->save($_POST);

// 寫入資料庫後，立即清除購物車內容($_SESSION['cart'])，避免帶入到下筆訂單中，增加困擾讓使用者不滿
unset($_SESSION['cart']);
/* 為了在資料庫寫入後，立即顯示訂購成功訊息的pop視窗，在此才先用 ?> 標籤，結束 php 程式區段，
   實務上宜避免 前端(script)、後端(php) 區段混用，以防暴露出後端資料夾結構(有資安疑慮)，
   因此在 ./api 資料夾下新增 index.html 產生空白網頁或重新定向到前台 location.href="../index.php"; */
?>
<script>
// alert跳出pop視窗時，會中斷網頁執行(要注意前端使用者體驗的感受)，此處結束後返回首頁顯示商品待使用者選購
alert("訂購成功!\n感謝您的選購");
location.href="../index.php";
</script>
