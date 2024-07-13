<?php
if (!empty($_POST)) {
    $Total->save(['total'=>$_POST['total'],'id'=>1]);
}
?>
<h2 class="ct">進站總人數管理</h2>
<form action="?do=total" method="post">
    <!-- table.all>tr>td.tt+td.pp>input:text -->
    <table class="all">
        <tr>
            <td class="tt">進站總人數</td>
            <td class="pp">
                <input type="number" name="total" value="<?= $Total->find(1)['total']; ?>">
            </td>
        </tr>
    </table>
    <!-- div.ct>input:submit+input:reset -->
    <div class="ct">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
    </div>
</form>