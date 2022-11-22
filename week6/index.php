<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>User Sorting</title>
    <style>
        .body {
            background-image: url('./background.jpg');
        }

        .box {
            background-color: white;
            padding: 10px;
            margin: auto;
            margin-top: 50px;
            width: 70%;
            box-shadow: 0px 5px 5px grey;
        }

        .center {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 30px;
        }

        span {
            padding: 14px 16px;
            margin: 20px;
        }

        .button {
            padding: 10px 30px;
            background-color: #0079BC;
            border: 0px;
            border-radius: 5px;
            color: white;
            font-size: 10px;
        }

        .button:hover {
            background-color: #006989;
            cursor: pointer;
        }
    </style>
</head>

<body style="background-color: #ebebeb; font-family: arial; background-image: url('./background.jpg');">
    <div class="box">
        <?php
        function user_sort($a, $b)
        {
            if ($b == 'smarts') {
                return 1;
            } else if ($a == 'smarts') {
                return -1;
            }

            return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
        }
        $submited = array_key_exists("submited", $_GET);

        $values = array(
            'name' => 'Mai Dao Tuan Thanh',
            'email_address' => 'thanh.mdt194675@sis.hust.edu.vn',
            'age' => 21,
            'smarts' => 'some'
        );
        if ($submited) {
            $sort_type = $_GET["sort_type"];
            if ($sort_type == 'usort' || $sort_type == 'uksort' || $sort_type == 'uasort') {
                $sort_type($values, 'user_sort');
            } else {
                $sort_type($values);
            }
        }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
            <h3 class="center">Select type sorting</h3>
            <div class="center" stype="background-color: #333">
                <span>
                    <div>
                        <input type="radio" name="sort_type" id="sort" value="sort" />
                        <label for="sort">Standard sort</label>
                    </div>
                    <div>
                        <input type="radio" name="sort_type" id="rsort" value="rsort" />
                        <label for="rsort">Reverse sort</label>
                    </div>
                    <div>
                        <input type="radio" name="sort_type" id="usort" value="usort" />
                        <label for="usort">User-defined sort</label>
                    </div>
                </span>
                <span>
                    <div>
                        <input type="radio" name="sort_type" id="ksort" value="ksort" />
                        <label for="ksort">Key sort</label>
                    </div>
                    <div>
                        <input type="radio" name="sort_type" id="krsort" value="krsort" />
                        <label for="krsort">Reverse key sort</label>
                    </div>
                    <div>
                        <input type="radio" name="sort_type" id="uksort" value="uksort" />
                        <label for="uksort">User-defined key sort</label>
                    </div>
                </span>
                <span>
                    <div>
                        <input type="radio" name="sort_type" id="asort" value="asort" />
                        <label for="asort">Value sort</label>
                    </div>
                    <div>
                        <input type="radio" name="sort_type" id="arsort" value="arsort" />
                        <label for="arsort">Reverse value sort</label>
                    </div>
                    <div>
                        <input type="radio" name="sort_type" id="uasort" value="uasort" />
                        <label for="uasort">User-defined value sort</label>
                    </div>
                </span>


                <input class="button" type="submit" value="Sort" name="submited" />
            </div>
            <? if ($submited) { ?>
                <script>
                    let btn = document.getElementById(<?php echo json_encode($sort_type); ?>).checked = true;
                </script>
            <? } else { ?>
                <script>
                    let btn = document.getElementById('sort').checked = true;
                </script>
            <? } ?>

            <div class="center">
                <div style="width: 200px">
                    Values <?= $submited ? "sorted by $sort_type" : "unsorted" ?>:
                </div>
                <ul style="width: 320px">
                    <?php
                    foreach ($values as $key => $value) {
                        echo "<li><b>$key</b>: $value</li>";
                    }
                    ?>
                </ul>
            </div>
        </form>
    </div>
</body>

</html>