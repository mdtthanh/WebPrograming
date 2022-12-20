<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Category Administration</title>

  <style>
    table {
      text-align: center;
    }

    table,
    th,
    td {
      border: 1px solid black;
    }

    th {
      padding: 10px 0;
      background-color: gainsboro;
    }

    td {
      padding: 5px 0;
    }

    input,
    button {
      padding: 10px;
      margin: 8px;
    }

    .cat-id {
      width: 120px;
    }

    .title {
      width: 350px;
    }

    .desc {
      width: 550px;
    }
  </style>

</head>

<body>
  <p><a href="index.php">Return Back</a></p>

  <h1>Category Administration</h1>

  <!-- LIST ALL CATEGORIES -->
  <?php
  try {
    require_once('connectDB.php');


    $query = 'SELECT * FROM categories';
    $res = $conn->query($query);

    print("<p>Number of categories: <span style=' font-size: 20px; font-weight: bold'>$res->num_rows</span></p>");

    if ($res->num_rows > 0) {
      print("
        <table>
          <tr>
            <th width='150px'>Cat ID</th>
            <th width='400px'>Title</th>
            <th width='600px'>Description</th>
          </tr>
      ");

      while ($row = $res->fetch_object()) {
        print("
            <tr>
              <td>$row->Category_ID</td>
              <td>$row->Title</td>
              <td>$row->Description</td>
            </tr>
          ");
      }

      print("</table>");
    }

    $res->free_result();
  } catch (mysqli_sql_exception $e) {
    print("<p>Error with database: $e</p>");
  }
  ?>

  <!-- ADD NEW CATEGORY -->
  <?php
  $submitted = isset($_POST['submitted']) && $_POST['submitted'] == 1;

  if ($submitted) {
    $errors = [];

    if (!isset($_POST['Category_ID']) || $_POST['Category_ID'] == null)
      $errors[] = 'Category ID is not specified';
    if (!isset($_POST['Title']) || $_POST['Title'] == null)
      $errors[] = 'Title is not specified';

    if (count($errors) > 0) {
      print('<p style="color: red; font-size:24px">Errors:</p>' . implode(array_map(fn ($e) => "<p style='color: red; font-size:20px'>- $e</p>", $errors)));
    } else {
      try {
        $query = "
            INSERT INTO categories(Category_ID, Title, Description)
            VALUE ( "
          . "'" . $_POST['Category_ID'] . "', "
          . "'" . $_POST['Title'] . "', "
          . "'" . ($_POST['Description'] ?? '') .
          "')
          ";


        $conn->query($query);

        // Clear input after add new item successfully
        $_POST['Category_ID'] = $_POST['Title'] = $_POST['Description'] = '';

        print("<p style='color: green;'>New category added successfully.</p>");
      } catch (mysqli_sql_exception $e) {
        switch ($e->getCode()) {
          case 1062:
            $errMsg = "Duplicate Cat ID";
            break;
        }
        print("<p style='color: red; font-size:24px' >Error: $errMsg</p>");
      }
    }
  }
  ?>

  <form action="" method="post">
    <input type="hidden" name="submitted" value="1">
    <input type="text" class="cat-id" name="Category_ID" placeholder="Category id" value="<?= @ htmlentities($_POST['Category_ID']) ?>">
    <input type="text" class="title" name="Title" placeholder="Title" value="<?= @htmlentities($_POST['Title']) ?>">
    <input type="text" class="desc" name="Description" placeholder="Description" value="<?= @htmlentities($_POST['Description']) ?>">
    <p><button type="submit">Add Category</button></p>
  </form>
</body>

</html>