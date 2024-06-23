<h2 class="ct">新增商品</h2>
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
            <th class="tt ct">所屬大分類</th>
            <td class="pp">
                <select name="mid" id="mid"></select>
            </td>
        </tr>
        <tr>
            <th class="tt ct">商品編號</th>
            <td class="pp">完成分類後自動分配</td>
        </tr>
        <tr>
            <th class="tt ct">商品名稱</th>
            <td class="pp"><input type="text" name="name" value=""></td>
        </tr>
        <tr>
            <th class="tt ct">商品價格</th>
            <td class="pp"><input type="text" name="price" value=""></td>
        </tr>
        <tr>
            <th class="tt ct">規格</th>
            <td class="pp"><input type="text" name="spec" value=""></td>
        </tr>
        <tr>
            <th class="tt ct">庫存量</th>
            <td class="pp"><input type="text" name="stock" value=""></td>
        </tr>
        <tr>
            <th class="tt ct">商品圖片</th>
            <td class="pp"><input type="text" name="img" value=""></td>
        </tr>
        <tr>
            <th class="tt ct">商品介紹</th>
            <td class="pp"><textarea name="intro" style="width:80%; height:150px;"></textarea></td>
        </tr>
    </table>
    <!-- Emmet縮寫: .ct>input:submit+input:reset+input:btn -->
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
        <input type="button" value="返回">
    </div>
</form>