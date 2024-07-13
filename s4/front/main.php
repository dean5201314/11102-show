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
<style>
.item{
    width: 80%;
    height: 160px;
    background-color: #F4C591;
    margin: 5px auto;
    /* 用 flex 將下層div改為並列 */
    display: flex;
}
.item .img{
    width: 33%;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid #999;
    /* border-right: 0px; */
}
/* 調整商品圖片因包入a標籤後，偏離正中央的問題 */
.item .img img{
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
}
.item .info{
    width: 67%;
    /* 加 display + flex-direction，使得下層 flex-grow 生效，將欄高自動填滿整個div */
    display: flex;
    flex-direction: column;
}
.info div{
    border: 1px solid #999;
    border-left: 0px;
    border-top: 0px;
    /* flex-grow 將欄高自動填滿整個div，但上層需有 display + flex-direction 才有用 */
    flex-grow: 1;
}
.info div:nth-child(1){
    border-top: 1px solid #999;
}
</style>
<?php
// $goods:商品資料集變數，$good:當前筆商品資料變數
foreach ($goods as $good) {
    // 以下2行為測試讀取的資料用
    // echo $good['name'];
    // echo "<br>";
?>
<!-- 用div仿table樣式製作，純table製作時，要處理的問題會比較多 -->
<div class="item">
  <div class="img">
    <a href="?do=detail&id=<?=$good['id'];?>">
        <img src="./img/<?=$good['img'];?>" style="width: 80%; height: 110px;">
    </a>
  </div>
  <div class="info">
    <div class="ct tt"><?=$good['name'];?></div>
    <div>
        價錢：<?=$good['price'];?>
        <!-- 用float靠右+padding微調，調整 "我要購買"圖片 位置 -->
        <!-- <img src="./icon/0402.jpg" style="float: right; padding: 3px;" onclick="location.href='?do=buycart&id=<?php //$good['id']; ?>&qt=1'"> -->
        <!-- 呼叫buy()函數，傳入id,qt，用ajax方式，計算並回傳購物車品項數 -->
        <img src="./icon/0402.jpg" style="float: right; padding: 3px;" onclick="buy(<?=$good['id'];?>,1)">
    </div>
    <div>規格：<?=$good['spec'];?></div>
    <div>簡介：<?=mb_substr($good['intro'],0,25);?>...</div>
  </div>
</div>
<?php
}
?>

<script>
// 呼叫"./api/buycart.php"，計算並回傳購物車品項數
function buy(id,qt){
    // 用ajax方式，計算並回傳購物車品項數
    $.post("./api/buycart.php",{id,qt},(amount)=>{
        // 更新 index.php中 購物車()內的 購物車品項數
        $("#amount").text(amount);
    })
}
</script>