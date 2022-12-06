<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Delete a Book</h1>

    <?php

    if (! @ $_GET['id']) {
        print('Book id not specified.');

    } else {
        try {
            require_once('mysql.inc.php');

            $query = "delete from book where id = " . $_GET['id'];
            $conn->query($query);

            print('<p>Book was deleted.<p>');

        } catch(mysqli_sql_exception $e) {
            print('<p>Error with database: ' . $e . '</p>');
        }

    }

    ?>
    
</body>
</html>