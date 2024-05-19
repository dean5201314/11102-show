<?php include_once "./db.php";

/* 1.要先確定前端form方式是post，才能用$_POST變數。 2.DB存取使用count而非find:
   是避免增加網路流量或是被攔截，此時只想確認登入是否成功，暫時不須要user的DB資料*/
if ($Admin->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']])>0) {
    // 若登入成功，則記住帳號並重新導向後臺back.php程式
    $_SESSION['login']=$_POST['acc'];
    to("../back.php");
}else {
    /* 若登入失敗，則回前臺index.php程式並傳入錯誤訊息，error變數內容為字串，
       可以不用加(前後)引號，否則(含引號)會被視為變數，造成錯誤(console可見錯誤訊息) */
    to("../index.php?do=login&error=帳號或密碼錯誤");
}

?>