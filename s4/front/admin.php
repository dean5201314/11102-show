<h2>管理員登入</h2>
<!-- table.all>tr*3>td.tt.ct+td.pp>input:text -->
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
        <td class="tt ct">驗證碼</td>
        <td class="pp">
            <!-- 如果用js做，前端user可以用F12看到答案，所以改成後端做 -->
            <?php
            $a=rand(10,99);
            $b=rand(10,99);
            // 用session變數存答案，讓前端看不到
            $_SESSION['ans']=$a+$b;
            echo $a ." + " . $b . " = ";
            ?>
            <input type="text" name="chk" id="chk"></td>
    </tr>
</table>
<!-- .ct>btn -->
<div class="ct"><button>確認</button></div>