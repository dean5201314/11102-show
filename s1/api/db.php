<?php
date_default_timezone_set("Asia/Taipei");
session_start();
class DB
{
    // protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db10";
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=s1120410";
    protected $pdo;
    protected $table;
    public function __construct($table)
    {
        $this->table = $table;
        // $this->pdo = new PDO($this->dsn, 'root', '');
        $this->pdo=new PDO($this->dsn,'s1120410','s1120410');
    }
    function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    private function a2s($array)
    {
        foreach ($array as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
        return $tmp;
    }
    private function sql_all($sql, $array, $other)
    {
        if (isset($this->table) && !empty($this->table)) {
            if (is_array($array)) {
                if (!empty($array)) {
                    $tmp = $this->a2s($array);
                    $sql .= " where " . join(" && ", $tmp);
                }
            } else {
                $sql .= " $array";
            }
            $sql .= $other;
            // echo 'sql=' . $sql;
            // $rows = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $sql;
        }
    }
    function save($array)
    {
        if (isset($array['id'])) {
            $sql = "UPDATE `$this->table` SET ";
            if (!empty($array)) {
                $tmp = $this->a2s($array);
            }
            $sql .= join(",", $tmp);
            $sql .= " where `id`='{$array['id']}'";
            // UPDATE `total` SET 
            // `id`='[value-1]',`total`='[value-2]',`date`='[value-3]' 
            // WHERE 
            // 1
        } else {
            $sql = "INSERT INTO `$this->table` ";
            $cols = "(`" . join("`, `", array_keys($array)) . "`)";
            $vals = "('" . join("','", $array) . "')";
            $sql = $sql . $cols . " VALUES " . $vals;
            // INSERT INTO `total`
            // (`id`, `total`, `date`) 
            // VALUES 
            // ('[value-1]','[value-2]','[value-3]')
        }
        // echo "sql=".$sql;
        return $this->pdo->exec($sql);
    }
    function del($id)
    {
        $sql = "DELETE FROM `$this->table` WHERE ";
        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= " `id`='$id'";
        }
        // echo "sql=".$sql;
        return $this->pdo->exec($sql);
        // DELETE FROM `total` WHERE 
        // 0
    }
    function all($where = '', $other = '')
    {
        $sql = "select * from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function count($where = '', $other = '')
    {
        $sql = "select count(*) from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function find($id)
    {
        $sql = "select * from `$this->table` ";
        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= " WHERE " . join(" && ", $tmp);
        } else if (is_numeric($id)) {
            $sql .= " WHERE `id`='$id'";
        }
        // echo "sql=".$sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    private function math($math, $col, $array = '', $other = '')
    {
        $sql = "select $math(`$col`) from `$this->table` ";
        $sql = $this->sql_all($sql, $array, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function sum($col = '', $where = '', $other = '')
    {
        return $this->math('sum', $col, $where, $other);
    }
    function max($col, $where = '', $other = '')
    {
        return $this->math('max', $col, $where, $other);
    }
    function min($col, $where = '', $other = '')
    {
        return $this->math('min', $col, $where, $other);
    }
}
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function to($url)
{
    header("location:$url");
}

$Total = new DB('s1_total');
$Bottom = new DB('s1_bottom');
$Title = new DB('s1_titles');
$Ad = new DB('s1_ad');
$Mvim = new DB('s1_mvim');
$Image = new DB('s1_image');
$News = new DB('s1_news');
$Admin = new DB('s1_admin');
$Menu = new DB('s1_menu');

/* 安全定義$DB三種彈性化的方法：
1.用陣列預定義$DB值域篩選(略) 
2.用get_defined_vars()的陣列key值篩選 
3.用${ucfirst($_GET['do'])}有否定義判斷 
*/
/* 
// 方法2：取出已定義變數的陣列key值，存入$lists$tKey中
$lists=array_keys(get_defined_vars());
// dd($lists);
*/
// 將$DB定義在db.php中，須注意事後$DB被覆蓋是否影響程式流程即可
if (isset($_GET['do'])) {
    // 方法3：判斷$_GET['do']變數內容首字大寫後的變數名稱是否存在?若存在則設定$DB變數
    if (isset(${ucfirst($_GET['do'])})) {
        $DB=${ucfirst($_GET['do'])};
    }
    /*
    // 方法2：若$_GET['do']變數存在，則變數內容首字大寫後存入$tKey
    $tKey=ucfirst($_GET['do']);
    // 方法2：若首字大寫後的$tKey存在於已定義變數的陣列key值$lists之中，則設定$DB變數
    if (in_array($tKey,$lists)) {
        $DB=$$tKey;
    }
    // 方法2：注意避免$tKey$lists與$tKey，在後續程式中被變更內容或重新定義
    */
} else {
    // 否則，將$DB變數設定為預設值$Title
    $DB=$Title;
}

// 利用session變數完成檢定要求，重整畫面不增加進站人數，僅瀏覽器關閉重開，才會累計進站人數
if (!isset($_SESSION['visited'])) {
    // 使用q方法直接下sql指令更新資料(因一個循環只使用一次故不另外寫函數或方法)
    $Total->q("update `s1_total` set `total` = `total` + 1 where `id`=1");
    // 若為循環中第一次連線，則設定session變數'visited'=1，瀏覽器未關閉前又再連線，不累計進站人數
    $_SESSION['visited']=1;
}
?>