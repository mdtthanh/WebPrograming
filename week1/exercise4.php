<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giải phương trình bậc 2</title>
</head>

<body>
    <?php
    $a = "";
    $b = "";
    $c = "";
    if (isset($_POST['a'])) {
        $a = $_POST['a'];
    }
    if (isset($_POST['b'])) {
        $b = $_POST['b'];
    }
    if (isset($_POST['c'])) {
        $c = $_POST['c'];
    }
    function giaiPTB2($a, $b, $c)
    {
        // kiểm tra biến đầu vào
        if ($a == "")
            $a = 0;
        if ($b == "")
            $b = 0;
        if ($c == "")
            $c = 0;
        // in phương trình ra màn hình
        echo "Phương trình: " . $a . "x^2 + " . $b . "x + " . $c . " = 0";
        echo "<br>";
        // kiểm tra các hệ số
        if ($a == 0) {
            if ($b == 0) {
                echo ("Phương trình vô nghiệm!");
            } else {
                echo ("Phương trình có một nghiệm: " . "x = " . (-$c / $b));
            }
            return;
        }
        // tính delta
        $delta = $b * $b - 4 * $a * $c;
        $x1 = "";
        $x2 = "";
        // tính nghiệm
        if ($delta > 0) {
            $x1 = (-$b + sqrt($delta)) / (2 * $a);
            $x2 = (-$b - sqrt($delta)) / (2 * $a);
            echo ("Phương trình có 2 nghiệm là: " . "x1 = " . $x1 . " và x2 = " . $x2);
        } else if ($delta == 0) {
            $x1 = (-$b / (2 * $a));
            echo ("Phương trình có nghiệm kép: x1 = x2 = " . $x1);
        } else {
            echo ("Phương trình vô nghiệm!");
        }
    }
    ?>
    <h2>Chương trình giải phương trình bậc 2</h2>
    <p>Ax^2 + Bx + C = 0</p>
    <form action="#" method="POST">
        <span>Nhập A: </span>
        <input type="text" name="a" value="<?= $a ?>" style="width: 100px">
        <br>
        <span>Nhập B: </span>
        <input type="text" name="b" value="<?= $b ?>" style="width: 100px">
        <br>
        <span>Nhập C: </span>
        <input type="text" name="c" value="<?= $c ?>" style="width: 100px">
        <br>
        <button>Giải</button>
    </form>
    <?php

    if (
        is_numeric($GLOBALS['a']) && is_numeric($GLOBALS['b'])
        && is_numeric($GLOBALS['c'])
    ) {
        giaiPTB2($GLOBALS['a'], $GLOBALS['b'], $GLOBALS['c']);
    } 
    elseif (is_numeric($GLOBALS['a']) == "" && is_numeric($GLOBALS['b']) == ""
    && is_numeric($GLOBALS['c'] ) == ""){

    }
    else 
    {
        echo ("Giá trị input không hợp lệ!");
    }
    ?>
</body>

</html>