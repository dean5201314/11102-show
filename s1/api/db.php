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

// 將$DB定義在db.php中，須注意事後$DB被覆蓋是否影響程式流程即可
if (isset($_GET['do'])) {
    // 若存在$_GET['do']才設定，避免程式出錯
    $DB=${ucfirst($_GET['do'])};
} else {
    $DB=$Title;
}
?>