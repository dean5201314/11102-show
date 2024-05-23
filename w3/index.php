<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
</head>

<body>
    <button class="root" style='margin-left:10px; background-color:greenyellow;'>
        <a href="../index.html" style='color:brown'>Root</a>
    </button>
    <?php
    //  設定時區
    date_default_timezone_set('Asia/Taipei');
    //  取得日期與時間（新時區）
    $today = date('Y-m-d'); //抓取系統日期
    $showDate = $today; //預設查詢日期為系統日期

    if (!isset($_GET['querydate'])) {
        if (isset($_GET['m'])) {  //如有錯誤訊息，則顯示錯誤訊息
            echo "<span style='color:red'>" . $_GET['m'] . "</span>";
        }
    } else {
        $showDate = $_GET['querydate']; //若有輸入日期，則以輸入日期為查詢日期
    }

    $thisYear = date("Y", strtotime($showDate));   //用 date("Y")抓取查詢日期的西元年份
    $thisMonth = date("m", strtotime($showDate));   //用 date("m")抓取查詢日期的西元月份
    $thisFirstDay = date("Y-m-1", strtotime($showDate));    //抓取該查詢日期的西元月份第1天(1號)
    $thisFirstDate = date('w', strtotime($thisFirstDay));  //抓取該查詢日期的西元月份第1天(1號)是星期幾(方便找出前面空幾天)  
    $thisMonthDays = date("t", strtotime($showDate));   //抓取該查詢日期的西元月份共有幾天(方便找出當月最後日期)
    $thisMonthEnd = date("Y-m-$thisMonthDays");    //抓取該查詢日期的西元月份最後1天的日期
    $thisYearHead = date("Y-1-1", strtotime($showDate));    //抓取該查詢日期的西元年份1月1號
    $thisYearEnd = date("Y-12-31", strtotime($showDate));    //抓取該查詢日期的西元年份12月31號

    ?>
    <div class="bg-contaier" <?php echo 'style="background-image: url(./img/' . $thisMonth . '.jpg)";' ?>>
        <header class="top">
            萬年曆
        </header>
        <div class="container">
            <aside class="aside">
                <section class="query">
                    <div class="search">
                        <form action="query_chk.php" method="get">
                            查詢 <br>
                            年:&nbsp;<input type="number" name="year" placeholder="輸入西元年"><br>
                            月:&nbsp;<input type="number" name="month" placeholder="輸入月份"><br><br>
                            <input type="submit" value="查詢" style="color:aliceblue;border-radius:10px;border:0;background-color:deeppink;width:60px;height:30px;cursor:pointer;">
                            <input type="reset" value="清除" style="color:aliceblue;border-radius:10px;border:0;background-color:deeppink;width:60px;height:30px;cursor:pointer;">
                        </form>
                        <button style='margin-left:25px'>
                            <!-- 產生系統日期的超連結，點擊時將傳遞year和month參數 -->
                            <a href="query_chk.php?year=<?php echo Date('Y'); ?>&month=<?php echo Date('m'); ?>">Today</a>
                        </button>
                    </div>
                </section>
                <section class="update">
                    最近更新日期：2023/11/11
                </section>
            </aside>
            <main class="main">
                <section class="marquee">
                    <marquee behavior="" direction="">

                    </marquee>
                </section>
                <section class="content">
                    <!-- 控制切換月份的按鈕 -->
                    <div class="nav">
                        <button>
                            <?php
                            $lastMonth = $thisMonth - 1;
                            $nextMonth = $thisMonth + 1;
                            $lastYear = $thisYear;
                            $nextYear = $thisYear;

                            if ($lastMonth == 0) {
                                $lastMonth = 12;
                                $lastYear = $lastYear - 1;
                            }

                            if ($nextMonth == 13) {
                                $nextMonth = 1;
                                $nextYear = $nextYear + 1;
                            }
                            ?>
                            <!-- 產生上一個月的超連結，點擊時將傳遞year和month參數 -->
                            <a href="query_chk.php?year=<?php echo $lastYear; ?>&month=<?php echo $lastMonth; ?>">前一月</a>
                        </button>
                        <button>
                            <!-- 產生上一年的超連結，點擊時將傳遞year和month參數 -->
                            <a href="query_chk.php?year=<?php echo ($lastYear - 1); ?>&month=<?php echo $thisMonth; ?>">前一年</a>
                        </button>

                        <!-- <span style="font-size:30px">2023年11月</span> -->
                        <?php
                        echo "<h3><span style='color:red; font-size: 36px;'>";
                        echo date("西元Y年m月", strtotime($showDate));    //依 Y-m 格式顯示西元年月
                        echo "</span></h3>";
                        ?>

                        <button>
                            <!-- 產生下一年的超連結，點擊時將傳遞year和month參數 -->
                            <a href="query_chk.php?year=<?php echo ($nextYear + 1); ?>&month=<?php echo $thisMonth; ?>">下一年</a>
                        </button>
                        <button>
                            <!-- 產生下一個月的超連結，點擊時將傳遞year和month參數 -->
                            <a href="query_chk.php?year=<?php echo $nextYear; ?>&month=<?php echo $nextMonth; ?>">下一月</a>
                        </button>

                    </div>


                    <!-- 放萬年曆php -->
                    <?php


                    $weeks = ceil(($thisMonthDays + $thisFirstDate) / 7); //抓取該西元月份共有幾周
                    $firstCell = date("Y-m-d", strtotime("-$thisFirstDate days", strtotime($thisFirstDay)));
                    //抓取該西元月份第1周第1格為幾月幾日
                    echo "<table>";
                    echo "<tr>";
                    echo "<td class='header'>日</td>";
                    echo "<td class='header'>一</td>";
                    echo "<td class='header'>二</td>";
                    echo "<td class='header'>三</td>";
                    echo "<td class='header'>四</td>";
                    echo "<td class='header'>五</td>";
                    echo "<td class='header'>六</td>";
                    echo "</tr>";
                    for ($i = 0; $i < $weeks; $i++) {   // i 表周次的變化
                        echo "<tr>";
                        for ($j = 0; $j < 7; $j++) {    // j 表當周星期幾的變化
                            $addDays = 7 * $i + $j;
                            // addDays 表第幾周星期幾(該西元月份第1周第1格算起共幾天)
                            $thisCellDate = strtotime("+$addDays days", strtotime($firstCell));
                            // thisCellDate 表當周當格是幾月幾日
                            if (date('w', $thisCellDate) == 0 || date('w', $thisCellDate) == 6) {
                                //判斷當天是星期天或星期六
                                echo "<td class='weekend' style='background:pink'>";    //顯示此格背景色為粉紅色

                            } else {
                                echo "<td class='workday' >";
                            }
                            if (date("m", $thisCellDate) == date("m", strtotime($thisFirstDay))) {
                                //判斷當周當格日期與當月第一天是否為同一月份
                                echo date("j", $thisCellDate);   //列印出當月第幾天(月份中的日期)
                            }
                            echo "</td>";
                        }
                        echo "</tr>";
                    }

                    echo "</table>";
                    ?>
                </section>
            </main>
            <footer class="footer">
                <?php
                echo "現在時間：" . date('Y/m/d H:i:s');
                ?>
            </footer>
        </div>
    </div>
</body>

</html>