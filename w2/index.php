<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>九九乘法表</title>
    <style>
        .container {
            /* display: flex; */
            /* flex-direction: column; */
            /* flex-wrap: wrap; */
            width: 1024px;
            /* height: 768px; */
            margin: auto;
            /* background-color: lightcyan; */
            background-image: url('../img/bg-calendar-3.jpg');
        }

        table {
            border: 1px solid black;
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            padding: 3px 9px;
        }
    </style>
</head>

<body>
    <button class="root" style='border-radius: 50%;margin:10px;background-color:greenyellow;font-size:20px;padding:20px;'>
        <a href="../index.html" style='color:brown'>Root</a>
    </button>
    <div class="container">
        <br>
        <h1>九九乘法表</h1>
        <br>
        <?php
        // 在程式開頭插入表格起始標籤<table>
        echo "<table>";
        for ($j = 1; $j <= 9; $j++) {
            // 在每列開頭插入表格列的起始標籤<tr>
            echo "<tr>";
            for ($i = 1; $i <= 9; $i++) {
                // 在每欄開頭插入表格欄的起始標籤<td>
                echo "<td>";
                // 在每個欄位插入正確的資料內容
                echo $j . " x " . $i . " = " . ($j * $i);
                // 在每欄結尾插入表格欄的結束標籤</td>
                echo "</td>";
            }
            // 在每列結尾插入表格列的結束標籤</tr>
            echo "</tr>";
        }
        // 在程式結尾插入表格結束標籤</table>
        echo "</table>";
        ?>
        <br>
        <br>
        <hr>
        <h1>九九乘法表-有標頭</h1>
        <br>
        <?php
        // 在程式開頭插入表格起始標籤<table>
        echo "<table>";
        // 在第一列開頭插入標頭列的起始標籤<tr>
        echo "<tr style='background-color:#ccc'>";
        // 在標頭列插入每個欄位的正確資料內容
        echo "<td></td>";
        echo "<td>1</td>";
        echo "<td>2</td>";
        echo "<td>3</td>";
        echo "<td>4</td>";
        echo "<td>5</td>";
        echo "<td>6</td>";
        echo "<td>7</td>";
        echo "<td>8</td>";
        echo "<td>9</td>";
        echo "";
        // 在第一列結尾插入標頭列的結束標籤<tr>
        echo "</tr>";
        for ($j = 1; $j <= 9; $j++) {
            // 在每列開頭插入表格列的起始標籤<tr>
            echo "<tr>";
            // 在每列開頭插入標頭欄的起始標籤<td>
            echo "<td style='background-color:#ccc'>";
            // 在每列開頭插入標頭欄的正確資料內容
            echo $j;
            // 在每列開頭插入標頭欄的結束標籤<td>
            echo "</td>";
            for ($i = 1; $i <= 9; $i++) {
                // 在每欄開頭插入表格欄的起始標籤<td>
                echo "<td>";
                // 在每個欄位插入正確的資料內容
                echo ($j * $i);
                // 在每欄結尾插入表格欄的結束標籤</td>
                echo "</td>";
            }
            // 在每列結尾插入表格列的結束標籤</tr>
            echo "</tr>";
        }
        // 在程式結尾插入表格結束標籤</table>
        echo "</table>";
        ?>

        <!-- 模擬用表格相關標籤，將程式執行的內容框起來，做成表格樣式
        <table>
            <tr>
                <td>1x1=1</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2x1=2</td>
                <td>2x2=4</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3x1=3</td>
                <td>3x2=6</td>
                <td>3x3=9</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
 -->

    </div>
</body>

</html>