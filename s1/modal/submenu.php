<!-- "../api/db.php"：從/modal目錄出發，要先到上一層目錄，才能看到/api目錄，再找到db.php -->
<?php include_once "../api/db.php";?>
<h3 class="cent">編輯次選單</h3>
<hr>
<form action="./api/submenu.php" method="post" enctype="multipart/form-data">
    <table class="cent" id="sub">
        <tr>
            <td>次選單名稱</td>
            <td>次選單連結網址</td>
            <td>刪除</td>
        </tr>
        <?php
        // 用傳入的id(GET變數)，讀出該主選單id下的所有次選單資料
        // 因是以AJAX方式單獨呼叫submenu.php，需include將db.php嵌入，才會有$Menu變數，否則會出錯
        $subs=$Menu->all(['menu_id'=>$_GET['id']]);
        foreach ($subs as $sub) {
        ?>
        <tr>
            <td><input type="text" name="text[]" value="<?=$sub['text'];?>"></td>
            <td><input type="text" name="href[]" value="<?=$sub['href'];?>"></td>
            <td><input type="checkbox" name="del[]" value="<?=$sub['id'];?>"></td>
            <input type="hidden" name="id[]" value="<?=$sub['id'];?>">
        </tr>
        <?php   
        }
        ?>
    </table>
    <div>
        <!-- 將主選單傳來的table、id，用隱藏欄位由form轉傳給api的submenu.php，進行資料表的新增或修改 -->
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="hidden" name="menu_id" value="<?= $_GET['id']; ?>">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">
    </div>
</form>
<script>
    function more() {
        let item = `<tr>
                        <td><input type="text" name="add_text[]" id=""></td>
                        <td><input type="text" name="add_href[]" id=""></td>
                    </tr>`

        $("#sub").append(item)

    }
</script>