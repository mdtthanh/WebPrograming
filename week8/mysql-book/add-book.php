<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add a book</h1>

    <?php

    $submitted = isset($_POST['submitted']) && $_POST['submitted'] == 1;
    if ($submitted) {
        $errors = [];

        if (!isset($_POST['title']) || $_POST['title'] == null)
            $errors[] = 'Title is not specified';
        if (!isset($_POST['author']) || $_POST['author'] == null)
            $errors[] = 'Author is not specified';

        if (count($errors) > 0) {
            print('<p>Errors:</p>' .
                implode(array_map(fn($e) => "<p>- $e</p>", $errors)));
        } else {


            try {
                require_once('mysql.inc.php');

                $query = 'insert into book set ' .
                    ' title = "' . $_POST['title'] . '"' .
                    ', author = "' . $_POST['author'] . '"' .
                    (isset($_POST['publisher']) ? ', publisher = "' . $_POST['publisher'] . '"' : '') .
                    (isset($_POST['yop']) ? ', yop = ' . $_POST['yop'] : '');
                $conn->query($query);

                print('<p>Book was added successfully.</p>');

            } catch(mysqli_sql_exception $e) {
                print('<p>Error with database: ' . $e . '</p>');
            }

        }
    }

    ?>
    
    
    <form action="" method="post">
        <input type="hidden" name="submitted" value="1">

        <p>Title:</p>
        <input type="text" name="title" value="<?= @ $_POST['title'] ?>">

        <p>Author:</p>
        <input type="text" name="author" value="<?= @ $_POST['author'] ?>">

        <p>Publisher:</p>
        <input type="text" name="publisher" value="<?= @ $_POST['publisher'] ?>">

        <p>Year of publication:</p>
        <input type="number" name="yop" value="<?= @ $_POST['yop'] ?>">

        <p><button type="submit">Submit</button></p>
    </form>

</body>
</html>