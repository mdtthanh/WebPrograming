<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" />
    <title>Date time</title>
</head>

<body>
    <div class="background"></div>
    <div class="container">
        <div class="wrap">
            <h2>Date time!</h2>
            <form action="" method="POST" id="select-form">
                <table>
                    <tr>
                        <td>
                            <span>Your Name</span>
                        </td>
                        <td>
                            <label>
                                <span class="form-input">
                                    <div class="style-icon">
                                        <i class="fa-solid fa-user group-icon"></i>
                                    </div>
                                    <input type="text" style="padding-left: 10px" name="name" placeholder="Name" value="<?= @$_POST['name'] ?>">
                                </span>
                            </label>
                        </td>
                    </tr>
                    <?php
                    $day = range(1, 31);
                    $month = range(1, 12);
                    $year = range(1900, 2022);

                    $second = range(00, 59);
                    $minutes = range(00, 59);
                    $hour = range(00, 23);
                    ?>
                    <tr>
                        <td>
                            <span>Date</span>
                        </td>
                        <td>
                            <label>
                                <span class="form-input">
                                    <div class="style-icon">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                    <select name="day" style="width: 40px;margin-right: 20px;">
                                        <?php
                                        foreach ($day as $key => $value) {
                                        ?>
                                            <option value="<?= $value ?>" <?= @$_POST['day'] == $value ? 'selected' : '' ?>>
                                                <?= $value ?></option>

                                        <?php
                                            var_dump($_POST['date']);
                                        }
                                        ?>
                                    </select>
                                    <select name="month" style="width: 40px;  margin-right: 20px">
                                        <?php
                                        foreach ($month as $key => $value) {
                                        ?>
                                            <option value="<?= $value ?>" <?= @$_POST['month'] == $value ? 'selected' : '' ?>><?= $value ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <select name="year" style="width: 60px; ">
                                        <?php
                                        foreach ($year as $key => $value) {
                                        ?>
                                            <option value="<?= $value ?>" <?= @$_POST['year'] == $value ? 'selected' : '' ?>><?= $value ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Time</span>
                        </td>
                        <td>
                            <label>
                                <span class="form-input" style="justify-content: space-between">
                                    <div class="style-icon">
                                        <i class="fa-solid fa-clock"></i>
                                    </div>
                                    <select name="hour" style="width: 40px; ">
                                        <?php
                                        foreach ($hour as $key => $value) {
                                        ?>
                                            <option value="<?= $value ?>" <?= @$_POST['hour'] == $value ? 'selected' : '' ?>>
                                                <?= $value ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                    <select name="minutes" style="width: 40px;  ">
                                        <?php
                                        foreach ($minutes as $key => $value) {
                                        ?>
                                            <option value="<?= $value ?>" <?= @$_POST['minutes'] == $value ? 'selected' : '' ?>>
                                                <?= $value ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <select name="second" style="width: 40px;  ">
                                        <?php
                                        foreach ($second as $key => $value) {
                                        ?>
                                            <option value="<?= $value ?>" <?= @$_POST['second'] == $value ? 'selected' : '' ?>>
                                                <?= $value ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </span>
                            </label>
                        </td>
                    </tr>
                </table>
                <?php
                function resetAll()
                {
                    reset($_POST);
                    echo "<script> function reloadPage() {location.reload(); } </script>";
                }
                ?>

                <input class="btn" type="reset" onclick="window.location.reload()">Reset</input>
                <button class="btn">Submit</button>
            </form>
        </div>
        <div class="show-info">
            <?php
            // $day = 1;
            // $month = 1;
            if (isset($_POST['name'])) {
                echo 'Hi ' . $_POST['name'] . '!' . '<br>';
            }
            if (isset($_POST['second']) && isset($_POST['minutes']) && isset($_POST['hour']) && isset($_POST['day']) && isset($_POST['month']) && isset($_POST['year'])) {
                echo '<br>';

                echo 'More information' . '<br>';
                echo '<br>';

                echo 'In 12 hour, the time and date is ';
            }

            $x = [4, 6, 9, 11];
            $y = [1, 3, 5, 7, 8, 10, 12];

            if (isset($_POST['second']) && isset($_POST['minutes']) && isset($_POST['hour'])) {
                if ($_POST['hour'] > 12) {
                    $conver_hour = $_POST['hour'] - 12;
                    echo $conver_hour . ':' . @$_POST['minutes'] . ':' . $_POST['second'] . ' PM';
                } else {
                    echo @$_POST['hour'] . ':' . @$_POST['minutes'] . ':' . @$_POST['second'] . ' AM';
                }
            }


            if (isset($_POST['day']) && isset($_POST['month']) && isset($_POST['year'])) {
                echo ', ';

                if (($_POST['year'] % 400 == 0) || ($_POST['year'] % 4 == 0 && $_POST['year'] % 100 != 0)) {
                    if (($_POST['day'] >= 30 && $_POST['month'] == 2)) {
                        echo '<p>Error: Datetime invalid!!!</p>' . '<br>';
                    } else {
                        if (in_array($_POST['month'], $x) && $_POST['day'] > 30) {
                            echo '<p>Error: Datetime invalid!!!</p>' . '<br>';
                        } else {
                            echo @$_POST['day'] . '/' . @$_POST['month'] . '/' . @$_POST['year'] . '<br>';
                            if ($_POST['month'] == 2) {
                                echo 'This month has 29 days!';
                            } elseif (in_array($_POST['month'], $x))  echo 'This month has 30 days!';
                            elseif (in_array($_POST['month'], $y))  echo 'This month has 31 days!';
                        }
                    }
                } else {
                    if (($_POST['day'] >= 29 && $_POST['month'] == 2)) {
                        echo '<p>Error: Datetime invalid!!!</p>' . '<br>';
                    } else {
                        if (in_array($_POST['month'], $x) && $_POST['day'] > 30) {
                            echo '<p>Error: Datetime invalid!!!</p>' . '<br>';
                        } else {
                            echo @$_POST['day'] . '/' . @$_POST['month'] . '/' . @$_POST['year'] . '<br>';

                            if ($_POST['month'] == 2) {
                                echo 'This month has 28 days!';
                            } elseif (in_array($_POST['month'], $x))  echo 'This month has 30 days!';
                            elseif (in_array($_POST['month'], $y))  echo 'This month has 31 days!';
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
</body>

</html>