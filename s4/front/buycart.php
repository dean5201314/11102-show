<?php
/* 若點選"我要購買"，則到購物車功能，若尚未登入($_SESSION['mem']未定義)，
   則重新導向到登入頁面 */
if (!isset($_SESSION['mem'])) {
    to("?do=login");
}
?>