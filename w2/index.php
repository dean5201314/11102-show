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

        <h1>九九乘法表</h1>
        <br>
        <hr>
        <br>

        <?php
        for ($j = 1; $j <= 9; $j++) {
            for ($i = 1; $i <= 9; $i++) {
                echo $j . " x " . $i . " = " . ($j * $i) . " ,&nbsp;&nbsp;&nbsp;&nbsp; ";
            }
            echo "<br>";
        }
        ?>

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

    </div>
</body>

</html>