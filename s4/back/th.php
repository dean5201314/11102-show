<!-- 將商品分類與商品管理兩個頁面，合併寫在一支程式中，控制顯示時機 -->
<h2 class="ct">商品分類</h2>
<!-- .ct*2>input:text -->
<div class="ct">
    新增大分類 <input type="text" name="big" id="big"> 
              <button onclick="addType('big')">新增</button>
</div>
<div class="ct">
    新增中分類 
    <!-- 輸入框前有選項框，包含許多大分類，故id用"bigs"表示，再用ajax撈出所有分類來 -->
    <select name="big" id="bigs"></select>
    <input type="text" name="mid" id="mid"> 
    <button onclick="addType('mid')">新增</button>
</div>
<!-- table.all>(tr.tt>td+td.ct>btn*2)+tr.pp.ct>td*2 -->
<table class="all">
    <tr class="tt">
        <td>流行皮件</td>
        <td class="ct">
            <button>修改</button>
            <button>刪除</button>
        </td>
    </tr>
    <tr class="pp ct">
        <td>女用皮件</td>
        <td>
            <button>修改</button>
            <button>刪除</button>
        </td>
    </tr>
</table>
<script>
getTypes(0);
function getTypes(big_id){
    $.get("./api/get_types.php",{big_id},(types)=>{
        $("#bigs").html(types);
    })
}

function addType(type){
    let name;
    let big_id;

    switch (type) {
        case 'big':
            name=$("#big").val();
            big_id=0; 
        break; 
        case 'mid':
            name=$("#mid").val();
            big_id=$("#bigs").val();
        break;
    }

    $.post("./api/save_type.php",{name,big_id},()=>{
        location.reload();
    })
}
</script>

<h2 class="ct">商品管理</h2>
<!-- table.all>(tr.tt.ct>td*5)+(tr.pp>td*5) -->
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <tr class="pp">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>            
            <button>修改</button>
            <button>刪除</button>            
            <button>上架</button>
            <button>下架</button>
        </td>
    </tr>
</table>
