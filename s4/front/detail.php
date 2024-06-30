<?php
// 用get方法傳入的id讀取商品資料放入DataSet變數$goods
$goods=$Goods->find($_GET['id']);
?>
<!-- 複製main.php畫面及CSS來修改，快速完成程式 -->
<style>
.item{
    width: 80%;
    /* height: 160px; */
    background-color: #F4C591;
    margin: 5px auto;
    /* 用 flex 將下層div改為並列 */
    display: flex;
}
.item .img{
    width: 60%;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid #FFF;
    /* border-right: 0px; */
    padding: 5px;
    text-align: center;
}
.item .info{
    width: 40%;
    /* 加 display + flex-direction，使得下層 flex-grow 生效，將欄高自動填滿整個div */
    display: flex;
    flex-direction: column;
}
.info div{
    border: 1px solid #FFF;
    border-left: 0px;
    border-top: 0px;
    /* flex-grow 將欄高自動填滿整個div，但上層需有 display + flex-direction 才有用 */
    flex-grow: 1;
}
.info div:nth-child(1){
    border-top: 1px solid #FFF;
}
</style>
<h2 class="ct"><?=$goods['name'];?></h2>

<!-- 複製main.php畫面及CSS來修改，快速完成程式 -->
<!-- 用div仿table樣式製作，純table製作時，要處理的問題會比較多 -->
<div class="item">
  <div class="img">
    <a href="?do=detail&id=<?=$goods['id'];?>">
        <img src="./img/<?=$goods['img'];?>" style="width: 90%; height: 200px;">
    </a>
  </div>
  <div class="info">
    <!-- 用商品的big讀出大分類名稱，用商品的mid讀出中分類名稱 -->
    <div>分類：<?=$Type->find($goods['big'])['name'];?> > <?=$Type->find($goods['mid'])['name'];?></div>
    <div>編號：<?=$goods['no'];?></div>
    <div>價錢：<?=$goods['price'];?></div>
    <div>詳細說明：<?=$goods['intro'];?>...</div>
    <div>庫存量：<?=$goods['stock'];?></div>
  </div>
</div>
<div class="tt ct" style="width: 80%;margin: 5px auto;">
    購買數量
    <input type="number" value="1">
    <!-- 用padding微調，調整 "我要購買"圖片 位置 -->
    <img src="./icon/0402.jpg" style="padding-top: 3px;">
</div>