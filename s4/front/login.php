<h2>第一次購買</h2>
<img src="./icon/0413.jpg" onclick="location.href='?do=reg'">

<h2>會員登入</h2>
<!-- table.all>tr*3>td.tt.ct+td.pp>input:text -->
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">驗證碼</td>
        <td class="pp">
            <!-- 如果用js做，前端user可以用F12看到答案，所以改成後端做 -->
            <?php
            /* 以下為使用加法的驗證程式 
            // $a = rand(10, 99);
            // $b = rand(10, 99);
            // // 用session變數存答案，讓前端看不到
            // $_SESSION['ans'] = $a + $b;
            // echo $a . " + " . $b . " = ";
            */

            /* 以下為使用圖形的驗證程式 
            $_SESSION['ans'] = code(5);
            $img=captcha($_SESSION['ans']);  
            */ 
            ?>
            <img src="" id="captcha"><button onclick="captcha()">重新產生</button><br>
            <input type="text" name="ans" id="ans">
        </td>
    </tr>
</table>

<!-- .ct>btn -->
<div class="ct">
    <!-- login()內要以傳入參數區分資料表來源，故用資料表名稱's4_mem' -->
    <button onclick="login('s4_mem')">確認</button>
</div>

<script>
/* 畫面載入時就先產生圖形驗證碼 */
captcha()
/* 在chrome測試，captcha元件src屬性已設定為img內容 */
// let gblimg;  //依 chatgpt建議設定global變數
function captcha(){  
    $.get("./api/captcha.php",(img)=>{
        // gblimg=img;  //將內部變數 img 傳給 global變數 gblimg
        // console.log(gblimg); // 打印 gblimg 的值
        // console.log(img);    // 打印 img 的值
        $("#captcha").attr("src",img)
    })
}

function login(table) {
    /* 測試ajax:顯示php程式執行前的參數值
    let ans=$("#ans").val();
    let acc=$("#acc").val();
    let pw=$("#pw").val();
    */
    $.get('./api/chk_ans.php',{ans:$("#ans").val()}, (chk) => {
        // 實務上若驗證碼錯誤，會重新產生驗證碼，再要求重新輸入
        if (parseInt(chk) == 0) {
            alert("驗證碼錯誤，請重新輸入")
        } else {
            // 若驗證碼正確，則檢查帳號與密碼是否正確
            $.post('./api/chk_pw.php',{table,acc:$("#acc").val(),pw:$("#pw").val()},(res)=>{
                /* 測試ajax:顯示php程式執行後的參數值與回傳值
                alert("table="+table)
                alert("acc="+$("#acc").val())
                alert("pw="+$("#pw").val())
                alert("res="+res)
                */
                if (parseInt(res)==0) {
                    alert("帳號或密碼錯誤，請重新輸入")
                } else {
                    // 若帳號密碼正確，就回到首頁
                    location.href='index.php'
                }
            })
        }
    })
}
</script>