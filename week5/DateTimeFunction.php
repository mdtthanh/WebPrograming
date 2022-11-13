<!DOCTYPE html>
<html>
    <style>
        .box {
            margin: 50px;
            border: 2px solid #3c3838;
            text-align: center;
            padding: 40px;
        }
        .btn {
            margin: auto;
            display: block;
            font-size: 20px;
            border-radius: 4px;
        }
        .btn:hover {
            background-color: #c9c9c9;
        }
    </style>
<form action="" method="post" style="margin-bottom: 20px;">
    <div class="box">
        <label>Your Name: </label>
        <input type="text" name="name1" value="<?php if (isset($_POST['name1'])) echo ($_POST['name1']) ?>">
        <label>Your birthday: </label>
        <input type="text" name="birthdays1" value="<?php if (isset($_POST['birthdays1'])) echo ($_POST['birthdays1']) ?>" placeholder="ex:'mm/dd/YYYY'">
    </div>

    <div class="box">
        <label>Other Name: </label>
        <input type="text" name="name2" value="<?php if (isset($_POST['name2'])) echo ($_POST['name2']) ?>">
        <label>Other Birthday: </label>
        <input type="text" name="birthdays2" value="<?php if (isset($_POST['birthdays2'])) echo ($_POST['birthdays2']) ?>" placeholder="ex:'mm/dd/YYYY'">
    </div>

    <input type="submit" class="btn" name="submit" value="Submit">
</form>
<?php

function processDateTime(){
    $now = time();
    $name1 = $_POST['name1'];
    $name2 = $_POST['name2'];
    $time_birthday1 = date('l - F d, Y' ,strtotime($_POST['birthdays1'])) ;
    $time_birthday2 = date('l - F d, Y' ,strtotime($_POST['birthdays2'])) ;
    $birthdays1 = strtotime($_POST['birthdays1']);
    $birthdays2 = strtotime($_POST['birthdays2']);
    print($name1 . "&nbsp----- Birthday: " . $time_birthday1 . "<br>");
    print($name2 . "&nbsp----- Birthday: " . $time_birthday2 . "<br>");
    $day_diff = abs($birthdays1 - $birthdays2);
    $countsday = floor($day_diff / (60 * 60 * 24));
    print("Difference in days between two dates: " . $countsday . " days <br>");
    $years = floor($day_diff / (365 * 60 * 60 * 24));
    $my_age = floor(abs($now - $birthdays1) / (365 * 60 * 60 * 24));
    $other_age = floor(abs($now - $birthdays2) / (365 * 60 * 60 * 24));
    print("Difference years: " . $years . "<br>");
    print($name1 . "-" . $my_age . " years old<br>");
    print($name2 . "-" . $other_age . " years old");
}

if (isset($_POST['name1']) && $_POST['name2'] && $_POST['birthdays1'] && $_POST['birthdays2']) {
    processDateTime();
} else {
    echo "Please enter all data!!!";
}
?>
</html>
