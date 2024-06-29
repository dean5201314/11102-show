<?php include_once './api/db.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>┌精品電子商務網站」</title>
        <link href="./css/css.css" rel="stylesheet" type="text/css">
        <!-- 因下一行中js.js已用到jq程式碼，故需在js.js之前先引入"jquery-3.4.1.min.js" -->
        <script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/js.js"></script>
</head>

<body>
        <iframe name="back" style="display:none;"></iframe>
        <div id="main">
                <div id="top">
                        <a href="?">
                                <img src="./icon/0416.jpg">
                        </a>
                        <div style="padding:10px;">
                                <a href="?">回首頁</a> |
                                <a href="?do=news">最新消息</a> |
                                <a href="?do=look">購物流程</a> |
                                <a href="?do=buycart">購物車</a> |
                                <?php
                                if (isset($_SESSION['s4_mem'])) {
                                ?>
                                        <a href="./api/logout.php">登出</a> |
                                <?php
                                } else {
                                ?>
                                        <a href="?do=login">會員登入</a> |
                                <?php
                                }
                                ?>                                
                                <?php
                                if (isset($_SESSION['s4_admin'])) {
                                ?>
                                        <a href="back.php">返回管理</a> |
                                <?php
                                } else {
                                ?>
                                        <a href="?do=admin">管理登入</a>
                                <?php
                                }
                                ?>
                        </div>
                        <marquee behavior="" direction="">
                            年終特賣會開跑了 &nbsp; 情人節特惠活動 &nbsp;
                        </marquee>
                </div>
                <div id="left" class="ct">
                        <div style="min-height:400px;">
                        <!-- 配合CSS中left a設定，採用a標籤 -->
                        <a>全部商品</a>
                        <?php
                        $bigs=$Type->all(['big_id'=>0]);
                        foreach ($bigs as $big) {
                        ?>
                        <!-- 配合div.ww:hover > div.s設定，用div.ww包住最外層 -->
                        <div class="ww">
                            <a href=""><?=$big['name'];?></a>
                            <div class="s">
                                <?php
                                // 若有中分類資料時(筆數>0)才顯示資料
                                if ($Type->count(['big_id'=>$big['id']])>0) {
                                    $mids=$Type->all(['big_id'=>$big['id']]);
                                    foreach ($mids as $mid) {
                                ?>
                                    <!-- 為區分子選單，用CSS變更背景色 -->
                                    <a href=""><?=$mid['name'];?></a>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        </div>
                        <span>
                                <div>進站總人數</div>
                                <div style="color:#f00; font-size:28px;">
                                        00005 </div>
                        </span>
                </div>
                <div id="right">
                    
                <?php
                    $do=$_GET['do']??'main';
                    $file="./front/{$do}.php";
                    if (isset($file)) {
                            include $file;
                    } else {
                            include "./front/main.php";
                    }
                ?>
                </div>
                <div id="bottom" style="line-height:70px;background:url(./icon/bot.png); color:#FFF;" class="ct">
                    <?=$Bottom->find(1)['bottom'];?>
                </div>
        </div>
        <!-- 原先因bootstrap建議而放最後面，但因先前已用到js或jq程式碼，最後才引入會有問題，故需向上移 -->
        <!-- <script src="./js/jquery-3.4.1.min.js"></script> -->
</body>

</html>