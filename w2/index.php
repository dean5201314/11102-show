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
        for($i = 1 ; $i <= 9 ; $i++){
            echo "1 x " . $i . " = " . (1*$i) . " ,&nbsp;&nbsp;&nbsp; ";
        }
        echo "<br>";
        for($i = 1 ; $i <= 9 ; $i++){
            echo "2 x " . $i . " = " . (2*$i) . " ,&nbsp;&nbsp;&nbsp; ";
        }
        echo "<br>";for($i = 1 ; $i <= 9 ; $i++){
            echo "3 x " . $i . " = " . (3*$i) . " ,&nbsp;&nbsp;&nbsp; ";
        }
        echo "<br>";for($i = 1 ; $i <= 9 ; $i++){
            echo "4 x " . $i . " = " . (4*$i) . " ,&nbsp;&nbsp;&nbsp; ";
        }
        echo "<br>";for($i = 1 ; $i <= 9 ; $i++){
            echo "2 x " . $i . " = " . (5*$i) . " ,&nbsp;&nbsp;&nbsp; ";
        }
        echo "<br>";for($i = 1 ; $i <= 9 ; $i++){
            echo "6 x " . $i . " = " . (6*$i) . " ,&nbsp;&nbsp;&nbsp; ";
        }
        echo "<br>";for($i = 1 ; $i <= 9 ; $i++){
            echo "7 x " . $i . " = " . (7*$i) . " ,&nbsp;&nbsp;&nbsp; ";
        }
        echo "<br>";for($i = 1 ; $i <= 9 ; $i++){
            echo "8 x " . $i . " = " . (8*$i) . " ,&nbsp;&nbsp;&nbsp; ";
        }
        echo "<br>";
        for($i = 1 ; $i <= 9 ; $i++){
            echo "9 x " . $i . " = " . (9*$i) . " ,&nbsp;&nbsp;&nbsp; ";
        }
        echo "<br>";
        ?>

    </div>
</body>

</html>