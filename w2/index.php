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
        echo "1 x 1 = 1 , ";
        echo "1 x 2 = 2 , ";
        echo "1 x 3 = 3 , ";
        echo "<br>";
        echo "2 x 1 = 2 , ";
        echo "2 x 2 = 4 , ";
        echo "2 x 3 = 6 , ";
        echo "<br>";
        echo "9 x 1 = 2 , ";
        echo "9 x 2 = 18 , ";
        echo "9 x 3 = 27 , ";
        ?>

    </div>
</body>

</html>