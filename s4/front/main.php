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
// 用$type接收get方法傳來的分類碼($_GET['type'])
$type=$_GET['type']??0;
// 設定$nav導航字串預設值空白
$nav='';

if ($type==0) {
    // 若分類碼=0,則設定$nav導航字串為'全部商品'
    $nav='全部商品';
} else {
    // 用傳來的分類碼$type讀取分類資料存放在當前分類資料$t變數
    $t=$Type->find($type);
    if ($t['big_id']==0) {
        // 若當前分類是大分類(big_id=0)，則導航字串為大分類名稱
        $nav=$t['name'];
    } else {
        // 若當前分類是中分類(big_id<>0)，用當前分類$t讀取分類資料存放在大分類資料$b變數
        $b=$Type->find($t['big_id']);
        // 設定導航字串為 '大分類名稱 > 中分類名稱'
        $nav=$b['name'] . " > " . $t['name'];
    }
}
?>

<h2><?=$nav;?></h2>
