<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table th {
        border: 2px solid red;
    }
    table td {
        border: 1px solid blue;
    }
    </style>
</head>
<body>

    <h1>List of Books</h1>
    
    <?php

    try {
        require_once('mysql.inc.php');

        $query = 'select * from book';
        $result = $conn->query($query);

        print('<p>Number of books: ' . $result->num_rows . '</p>');

        if ($result->num_rows > 0) {
            print('<table>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Year of pub</th>
                    <th>Action</th>
                </tr>');
        
            while ($row = $result->fetch_assoc()) {
                print('<tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['title'] . '</td>
                    <td>' . $row['author'] . '</td>
                    <td>' . $row['publisher'] . '</td>
                    <td>' . $row['yop'] . '</td>
                    <td>
                        <a href="delete-book.php?id=' . $row['id'] . '">Del</a>
                        <a href="edit-book.php?id=' . $row['id'] . '">Edit</a>
                    </td>
                </tr>');
            }

            print('</table>');
        }

        $result->free_result();

    } catch(mysqli_sql_exception $e) {
        print('<p>Error with database: ' . $e . '</p>');
    }

    ?>
    
</body>
</html>