<!-- 若點選"我要購買"，則重新導向到('?do=buycart')購物車功能 -->
<!-- <button onclick="location.href='?do=buycart'">我要購買</button> -->
<!-- 測試功能用 <?php //$_GET['type']; ?> -->

 <?php
/* 用三元運算式 $type=$_GET['type']??0; 取代下述程式碼
$type=0;
if (!isset($_GET['type'])) {
    $type=$_GET['type'];
}
*/
/* 因為main.php會被include到index.php中，為變數命名時要避免與index.php中的變數名稱相同，
   以免變數值互相覆蓋，造成難以預期及難以發現的錯誤 */
// 用$type接收get方法傳來的分類碼($_GET['type'])
$type=$_GET['type']??0;
// 設定$nav導航字串預設值空白
$nav='';
// 預設商品資料集變數$goods為空值
$goods=null;
if ($type==0) {
    // 若分類碼=0,則設定$nav導航字串為'全部商品'
    $nav='全部商品';
    // 讀取全部有上架(sh=1)的商品資料
    $goods=$Goods->all(['sh'=>1]);
} else {
    // 用傳來的分類碼$type讀取分類資料存放在當前分類資料$t變數
    $t=$Type->find($type);
    if ($t['big_id']==0) {
        // 若當前分類是大分類(big_id=0)，則導航字串為大分類名稱
        $nav=$t['name'];
        // 讀取全部有上架(sh=1)的大分類商品資料('big'=>$t['id'])
        $goods=$Goods->all(['sh'=>1,'big'=>$t['id']]);
    } else {
        // 若當前分類是中分類(big_id<>0)，用當前分類$t讀取分類資料存放在大分類資料$b變數
        $b=$Type->find($t['big_id']);
        // 設定導航字串為 '大分類名稱 > 中分類名稱'
        $nav=$b['name'] . " > " . $t['name'];
        // 讀取全部有上架(sh=1)的中分類商品資料('mid'=>$t['id'])
        $goods=$Goods->all(['sh'=>1,'mid'=>$t['id']]);
    }
}
?>

<h2><?=$nav;?></h2>

<?php
foreach ($goods as $good) {
    echo $good['name'];
    echo "<br>";
}
?>
