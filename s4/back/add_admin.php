<h2 class="ct">新增管理員帳號</h2>
<!-- form:post>table.all>tr*3>td.tt.ct+td.pp>input:text -->
<!-- 使用form表單接受輸入，並將輸入的值用post方式傳送到後端程式"./api/save_admin.php" -->
<form action="./api/save_admin.php" method="post">
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="text" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">權限</td>
        <!-- 使用陣列來儲存 checkbox多選項的答案 -->
        <td class="pp">
            <div>
                <input type="checkbox" name="pr[]" value="1">
                商品分類與管理
            </div>
            <div>
                <input type="checkbox" name="pr[]" value="2">
                訂單管理
            </div>
            <div>
                <input type="checkbox" name="pr[]" value="3">
                會員管理
            </div>
            <div>
                <input type="checkbox" name="pr[]" value="4">
                頁尾版權區與管理
            </div>
            <div>
                <input type="checkbox" name="pr[]" value="5">
                最新消息管理
            </div>
        </td>
    </tr>
</table>
<!-- .ct>input:submit+input:reset -->
<div class="ct">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>
</form>