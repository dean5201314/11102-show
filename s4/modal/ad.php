<h3>動態消息</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>動態消息內容</td>
        <td><input type="text" name="text" id=""></td>
    </tr>
</table>
<div>
    <input type="hidden" name="table" value="<?=$_GET['table'];?>">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>
</form>