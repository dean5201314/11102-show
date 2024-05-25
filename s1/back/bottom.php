<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">頁尾版權資料管理</p>
    <!-- 因為被include到back.php，所以action要以back.php位置找edit_bottom.php  -->
    <form method="post" action="./api/edit_info.php">
        <table style="width:80%; margin:auto;">
            <tbody>
                <tr class="yel">
                    <td width="50%">頁尾版權資料</td>
                    <td width="90%">
                        <input type="text" name="bottom" value="<?=$Bottom->find(1)['bottom'];?>" style='width:250px'>
                        <input type="hidden" name="table" value="<?=$do;?>">
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>