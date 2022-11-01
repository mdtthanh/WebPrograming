<?php
if (!isset($_POST['img'])) {
    copy($_FILES['img']['tmp_name'], './assets/img/' . $_FILES['img']['name']);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My CV</title>
    <style>
        body {
            background: url("./assets/img/background.jpg");
            height: 100vh;
            color: #fff;
        }

        td th,
        td {
            padding: 10px;
            font-size: 1.5rem;
        }

        td:nth-child(1) {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="background"></div>
    <table style="opacity: 0.7; background-color: #010101;" align="center" border="5" width="75%" cellspacing="0">
        <caption><strong>INFORMATION</strong></caption>
        <tr height="200">
            <th align="left" valign="top" colspan="2">Personal Details
                <blockquote>
                    <p>
                        <?php
                        echo @$_POST['first_name'] . ' ' . @$_POST['last_name'] . ' - ' . @$_POST['work'];
                        ?>
                    </p>
                </blockquote>
            </th>
            <th valign="top">Image
                <p>
                    <img src="./assets/img/<?= $_FILES['img']['name'] ?>" alt="Ảnh đại diện" width="120" height="120">

                </p>
            </th>
        </tr>
        <tr>
            <td width="20%">Address</td>
            <td colspan="2"><?= @$_POST['address'] ?></td>
        </tr>
        <tr>
            <td>Working Process</td>
            <td colspan="2"><?= @$_POST['work'] ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td colspan="2"><?= @$_POST['email'] ?></td>
        </tr>
        <tr>
            <td>Sex</td>
            <td colspan="2"><?= @$_POST['gender'] ?></td>
        </tr>
        <tr>
            <td>Phone number</td>
            <td colspan="2"><?= @$_POST['phone'] ?></td>
        </tr>
        <tr>
            <td>City</td>
            <td colspan="2"><?= @$_POST['city'] ?></td>
        </tr>
        <tr>
            <td>Description</td>
            <td colspan="2"><?= htmlspecialchars(@$_POST['info'])  ?></td>
        </tr>
    </table>
</body>

</html>