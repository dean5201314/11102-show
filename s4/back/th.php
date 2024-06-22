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
<?php
// 讀取大分類的內容
$bigs=$Type->all(['big_id'=>0]);
// 將每筆大分類資料放入每一列大分類的HTML內容中
foreach ($bigs as $big) {
?>
    <tr class="tt">
        <td><?=$big['name'];?></td>
        <td class="ct">
            <!-- 此處HTML的this(DOM物件)是指整行的buttom標籤內容，
             JQ的this(JQ物件)是指將HTML的DOM物件封裝成JQ格式後的物件 -->
            <button onclick="edit(this,<?=$big['id'];?>)">修改</button>
            <!-- 配合展示用的資料庫特性，資料表名稱改為's4_type' -->
            <button onclick="del('s4_type',<?=$big['id'];?>)">刪除</button>
        </td>
    </tr>
<?php
    // 讀取中分類的內容(big_id=大分類的代碼)
    $mids=$Type->all(['big_id'=>$big['id']]);
    // 將每筆中分類資料放入每一列中分類的HTML內容中
    foreach ($mids as $mid) {
?>
    <tr class="pp ct">
        <td><?=$mid['name'];?></td>
        <td>
            <!-- 此處HTML的this(DOM物件)是指整行的buttom標籤內容，
             JQ的this(JQ物件)是指將HTML的DOM物件封裝成JQ格式後的物件 -->
            <button onclick="edit(this,<?=$mid['id'];?>)">修改</button>
            <!-- 配合展示用的資料庫特性，資料表名稱改為's4_type' -->
            <button onclick="del('s4_type',<?=$mid['id'];?>)">刪除</button>
        </td>
    </tr>
<?php
    }
}
?>

</table>
<script>
// 呼叫getTypes()，讀取所有大分類(big_id=0)下一階的中分類
getTypes(0);
// 呼叫
function getTypes(big_id){
    // 呼叫"./api/get_types.php"程式，讀取中分類並產生選項內容的HTML碼
    $.get("./api/get_types.php",{big_id},(types)=>{
        // 用types回傳選項的HTML內容，放入id=bigs的HTML標籤容器內(bigs在此為select選項標籤)
        $("#bigs").html(types);
    })
}

// 依type內容新增大分類(big)或中分類(mid)的內容
function addType(type){
    let name;
    let big_id;

    switch (type) {
        // 設定大分類名稱及大分類碼(big_id=0)
        case 'big':
            name=$("#big").val();
            big_id=0; 
        break; 
        // 設定中分類名稱及中分類碼(big_id=大分類的代碼)
        case 'mid':
            name=$("#mid").val();
            big_id=$("#bigs").val();
        break;
    }

    // 用ajax方式呼叫"./api/save_type.php"程式，傳入{name,big_id}，寫入資料表
    $.post("./api/save_type.php",{name,big_id},()=>{
        // 重新載入頁面，以顯示新增的大分類或中分類內容
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
