<h2 class="ct">會員註冊</h2>
<!-- table.all>tr*6>td.tt.ct+td.pp>input:text -->
<table class="all">
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp">
            <input type="text" name="acc" id="acc">
            <button onclick="chkacc()">檢測帳號</button>
        </td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>
<!-- .ct>btn*2 -->
<div class="ct">
    <button onclick="reg()">註冊</button>
    <button onclick="clean()">重置</button>
</div>
<script>

function chkacc(){
    let acc=$("#acc").val()
    /* $.get()是系統函數，呼叫程式:"./api/chk_acc.php"，傳入參數:{acc}，
       程式回傳值:(res)，收到回傳值後要做的事(回應呼叫的函數): =>{} (簡寫表示法) */
    $.get("./api/chk_acc.php",{acc},(res)=>{
        /* parseInt(res):將回傳值(res)強制轉為數值的資料型態 */
        if (parseInt(res)==1 || acc=='admin') {
            alert(`此帳號${acc}已被使用`)
        } else {
            alert(`此帳號${acc}可以使用`)
        }
    })
}

function reg(){
    /* 將所有input元件的值，組合成一個dataset集合，作為傳入的參數 */
    let user={
        name:$("#name").val(),
        acc:$("#acc").val(),
        pw:$("#pw").val(),
        tel:$("#tel").val(),
        addr:$("#addr").val(),
        email:$("#email").val()
    }

    /* 因為用ajax非同步驗證帳號，故不知程式回傳值(res)何時才收到(除非用 promise 架構)，
       故將帳號檢核功能，直接重做一次，但傳入參數需改格式為{acc:user.acc}(因改用dataset) */
    $.get("./api/chk_acc.php",{acc:user.acc},(res)=>{
        /* parseInt(res):將回傳值(res)強制轉為數值的資料型態 */
        if (parseInt(res)==1 || user.acc=='admin') {
            alert(`此帳號${user.acc}已被使用`)
        } else {
            // 因包含用戶帳密，故用$.post()方式傳值較安全
            $.post("./api/reg.php",user,(res)=>{
                // 註冊是為登入網站，故成功後重新導向到登入頁面
                location.href='?do=login'
            })
        }
    })
}

/* 因reset為系統功能，故用clean()為名稱，避免衝到reset造成問題 */
function clean(){
    $("#name,#acc,#pw,#tel,#addr,#email").val('')
}

</script>