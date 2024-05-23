<?php
    
if (!empty($_GET)) {

    $year = (!empty($_GET['year'])) ? $_GET['year'] : "沒有西元年資料";
    $month = (!empty($_GET['month'])) ? $_GET['month'] : "沒有月份資料";
    
    $querydate = date("$year-$month-1");
    
    // echo "西元年:".$_GET['year'];
    // echo "月份:".$_GET['month'];   
    // echo "西元日期:".date('Y-m-d',strtotime($querydate));
    
    header("location:./index.php?year=$year&month=$month&querydate=$querydate");
} else {
    header("location:./index.php?m=請輸入必要資訊");
    // echo "請輸入必要資訊";
}
