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
    <button>註冊</button>
    <button>重置</button>
</div>
<script>
function chkacc(){
    let acc=$("#acc").val()
    /* $.get()是系統函數，呼叫程式:"./api/chk_acc.php"，傳入參數:{acc}，
       程式回傳值:(res)，收到回傳值後要做的事(回應呼叫的函數): =>{} (簡寫表示法) */
    $.get("./api/chk_acc.php",{acc},(res)=>{
        /* parseInt(res):將回傳值(res)強制轉為數值的資料型態 */
        if (parseInt(res)==1) {
            alert(`此帳號${acc}已被使用`)
        } else {
            alert(`此帳號${acc}可以使用`)
        }
    })
}
</script>