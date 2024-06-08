<h2 class="ct">編輯會員資料</h2>
<?php
$row=$Mem->find($_GET['id']);
?>

<!-- 因為要精簡程式碼，故在此設計為使用form表單並共用"./api/reg.php"程式 -->
<form action="./api/reg.php" method="post">
<!-- 若不想共用"./api/reg.php"程式，form表單action可改用"./api/save_mem.php"
<form action="./api/save_mem.php" method="post"> -->

<!-- 因畫面內容與"/front/reg.php相似，故複製畫面來修改，但改用form表單功能進行編輯，縮短時間" -->
<!-- table.all>tr*6>td.tt.ct+td.pp>input:text -->
<table class="all">
    <tr>

        <td class="tt ct">帳號</td>
        <td class="pp">
            <?=$row['acc'];?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><?=str_repeat("*",strlen($row['pw']));?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" value="<?=$row['name'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" value="<?=$row['email'];?>"></td>
    </tr>
    <tr>
        <td class="tt ct">地址</td>
        <td class="pp"><input type="text" name="addr" value="<?=$row['addr'];?>"></td>
    </tr>   
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><input type="text" name="tel" value="<?=$row['tel'];?>"></td>
    </tr>
</table>
<!-- .ct>btn*2 -->
<div class="ct">
    <!-- 因是編輯功能，需要資料表Pkey，故用隱藏欄位帶'id'給後端 -->
    <input type="hidden" name="id" value="<?=$row['id'];?>">
    <!-- 因此處用表單編輯，故改用 input type="submit"/"reset" 方式執行 -->
    <input type="submit" value="編輯">
    <input type="reset" value="重置">
    <!-- 取消是放棄本次編輯，故重新導向回到原功能頁面 -->
    <input type="button" value="取消" onclick="location.href='?do=mem'">

    <!-- 因此處用表單編輯，故不用 button onclick=""方式 -->
    <!-- <button onclick="reg()">註冊</button>
    <button onclick="clean()">重置</button> -->
</div>
</form>