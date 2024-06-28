<!-- 因畫面相似，直接借用add_goods.php程式修改相關功能 -->
<h2 class="ct">修改商品</h2>
<?php
// 用系統以get方法取得的參數$_GET['id']讀出資料表的資料
$goods=$Goods->find($_GET['id']);
?>
<!-- 下述Emmet縮寫只有form部分發生作用，之後的table部分不會作用 -->
<!-- form:post[enctype=multipart/form-data]>table.all>tr*9>th.tt.ct+td.pp>input:text -->
<!-- Emmet縮寫: form:post[enctype=multipart/form-data] -->
<form action="./api/save_goods.php" method="post" enctype="multipart/form-data">
<!-- Emmet縮寫: table.all>tr*9>th.tt.ct+td.pp>input:text -->
    <table class="all">
        <tr>
            <th class="tt ct">所屬大分類</th>
            <td class="pp">
                <select name="big" id="big"></select>
            </td>
        </tr>
        <tr>
            <th class="tt ct">所屬中分類</th>
            <td class="pp">
                <select name="mid" id="mid"></select>
            </td>
        </tr>
        <tr>
            <th class="tt ct">商品編號</th>
            <td class="pp"><?=$goods['no'];?></td>
        </tr>
        <tr>
            <th class="tt ct">商品名稱</th>
            <td class="pp"><input type="text" name="name" value="<?=$goods['name'];?>"></td>
        </tr>
        <tr>
            <th class="tt ct">商品價格</th>
            <td class="pp"><input type="text" name="price" value="<?=$goods['price'];?>"></td>
        </tr>
        <tr>
            <th class="tt ct">規格</th>
            <td class="pp"><input type="text" name="spec" value="<?=$goods['spec'];?>"></td>
        </tr>
        <tr>
            <th class="tt ct">庫存量</th>
            <td class="pp"><input type="text" name="stock" value="<?=$goods['stock'];?>"></td>
        </tr>
        <tr>
            <th class="tt ct">商品圖片</th>
            <td class="pp"><input type="file" name="img" value=""></td>
        </tr>
        <tr>
            <th class="tt ct">商品介紹</th>
            <td class="pp"><textarea name="intro" style="width:80%; height:150px;"><?=$goods['intro'];?></textarea></td>
        </tr>
    </table>
    <!-- Emmet縮寫: .ct>input:submit+input:reset+input:btn -->
    <div class="ct">
        <!-- 記得將商品編號存於隱藏欄位一併送到"./api/save_goods.php"程式，才不會有誤判 -->
        <input type="hidden" name="id" value="<?=$goods['id'];?>">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
        <!-- click時，本頁重整並多了do參數(用do=th呼叫th.php程式返回原畫面) -->
        <input type="button" value="返回" onclick="location.href='?do=th'">
    </div>
</form>
<script>
/* 以下的程式碼，因沒有結束條件，容易進入無限遞迴狀態
// 呼叫getTypes()，讀取大分類(big_id=0)讀取資料
getTypes(0);
// 呼叫getTypes()，依分類碼(big_id)讀取資料
function getTypes(big_id){
    // 呼叫"./api/get_types.php"程式，依分類碼(big_id)讀取資料並產生選項內容的HTML碼
    $.get("./api/get_types.php",{big_id},(types)=>{
        if (parseInt(big_id)==0) {
            // 用types回傳選項的HTML內容，放入id=big的HTML標籤容器內(bigs在此為select選項標籤)
            $("#big").html(types);            
        } else {
            // 用types回傳選項的HTML內容，放入id=mid的HTML標籤容器內(bigs在此為select選項標籤)
            $("#mid").html(types);
        }
        // 用大分類碼讀取中分類資料
        getTypes($("#big").val());
    })
}
*/

/* 以下的程式碼，使用type值區分結束條件，不會進入無限遞迴狀態 */
// 呼叫getTypes()，依type值('big'或'mid')讀取相應的分類碼資料
getTypes('big',0);
// 若大分類碼變動時，則以新的大分類碼{$("#big").val()}，重新讀取中分類碼的內容
$("#big").on("change",function(){
    getTypes('mid',$("#big").val());
})
// 呼叫getTypes()，依type值('big'或'mid')讀取相應的分類碼資料
function getTypes(type,big_id){
    // 呼叫"./api/get_types.php"程式，依分類碼(big_id)讀取資料並產生選項內容的HTML碼
    $.get("./api/get_types.php",{big_id},(types)=>{
        switch (type) {
            // 若type值為大分類('big')，則繼續讀取中分類的資料
            case 'big':
                // 用JQ方法將回傳的商品大分類碼的HTML程式碼放入網頁
                $("#big").html(types);
                // 將大分類選項值預設為商品資料的大分類值
                $("#big").val(<?=$goods['big'];?>);
                // 呼叫getTypes()，讀取中分類(type='mid')，$("#big").val()為剛讀出的大分類碼
                getTypes('mid',$("#big").val());
            break;
            // 若type值為中分類('mid')，結束資料讀取動作
            case 'mid':
                // 用JQ方法將回傳的商品中分類碼的HTML程式碼放入網頁
                $("#mid").html(types);
                // 將中分類選項值預設為商品資料的中分類值
                $("#mid").val(<?=$goods['mid'];?>);
            break;
        }
    })
}

/* 用JQ變更大分類選項值的方法，僅限於已被讀取放在選項中的值才有效果(如下3項指令可供參考):
   $("#big").val(3)
   $("#big option[value='3']").prop('selected',true)
   $("#big option").eq(2).prop('selected',true) */
/* 用JQ變更中分類選項值的方法，僅限於已被讀取放在選項中的值才有效果(如下指令可供參考): 
   $("#mid").val(6)
   $("#mid option[value='6']").prop('selected',true)
   $("#mid option").eq(1).prop('selected',true) */
</script>