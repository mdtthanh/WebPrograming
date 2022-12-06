<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Business Registration page</title>

  <style>

    form {
      width: 840px;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 20px;
    }

    form, .input-box {
      display: grid;
      grid-template-columns: 40% 55%;
      column-gap: 5%;
      place-items: center;
    }

    .input-box {
      width: 100%;
      grid-template-columns: 25% 70%;
      place-items: start;
      align-items: center;
      margin-bottom: 10px;
    }

    .form-right {
      width: 100%;
    }

    input {
      width: 90%;
      padding: 5px;
    }

    select {
      width: 300px;
      margin-left: 20px;
      overflow-y: scroll;
      border: 2px solid #000;
      border-radius: 6px;
      padding: 4px;
    }

    option { padding: 4px; }

    button { padding: 10px; margin-left: 20px; }
  </style>
</head>
<body>
  <p><a href="index.php">Return Back</a></p>
  <h1>Business Registration</h1>

  <form class="form" action="" method="post">
    <div class="form-left">
      <h3>Click on one, or control-click on multiple categories</h3>

      <select name="Category_ID[]" multiple>
        <?php
          try {
            require_once('connectDB.php');


            $query = 'SELECT * FROM categories';
            $res = $conn->query($query);

            if ($res->num_rows > 0) {
              while ($row = $res->fetch_object()) {
                print("<option value='" . $row->Category_ID . "'>$row->Title</option>");
              }
            }

            $res->free_result();
          }
          catch (mysqli_sql_exception $e) {
            print("<p>Error with database: $e</p>");
          }
        ?>
      </select>

      <p><button type="submit">Add Business</button></p>
    </div>

    <div class="form-right">
      <input type="hidden" name="submitted" value="1">
      <div class="input-box">
        <label>Business Name</label>
        <input type="text" name="Name" placeholder="Ex: ABC Academy" value="<?= @ $_POST['Name'] ?>">
      </div>

      <div class="input-box">
        <label>Address</label>
        <input type="text" name="Address" placeholder="Ex: 123 Any Street" value="<?= @ $_POST['Address'] ?>">
      </div>

      <div class="input-box">
        <label>City</label>
        <input type="text" name="City" placeholder="Ex: New York" value="<?= @ $_POST['City'] ?>">
      </div>

      <div class="input-box">
        <label>Telephone</label>
        <input type="tel" name="Telephone" placeholder="Ex: (555) 123-4567" value="<?= @ $_POST['Telephone'] ?>">
      </div>

      <div class="input-box">
        <label>URL</label>
        <input type="url" name="URL" placeholder="Ex: https://www.google.com" value="<?= @ $_POST['URL'] ?>">
      </div>
    </div>
  </form>

  <?php
    $submitted = isset($_POST['submitted']) && $_POST['submitted'] == 1;

    if($submitted) {
      $errors = [];

      if (!isset($_POST['Name']) || $_POST['Name'] == null)
        $errors[] = 'Business Name is not specified';
      if (!isset($_POST['Address']) || $_POST['Address'] == null)
        $errors[] = 'Address is not specified';
      if (!isset($_POST['City']) || $_POST['City'] == null)
        $errors[] = 'City is not specified';
      if (!isset($_POST['Telephone']) || $_POST['Telephone'] == null)
        $errors[] = 'Telephone is not specified';

      if(count($errors) > 0) {
        print(
          '<p style="color: red; font-size:24px">Errors:</p>' .
          implode(array_map(
            static fn($e) => "<p style='color: red; margin-left: 10px;; font-size:20px'>- $e</p>",
            $errors
          ))
        );
      }

      else {
        try {
          $query = "
            INSERT INTO businesses(Name, Address, City, Telephone, URL)
            VALUE ( "
              . "'" . $_POST['Name'] . "', "
              . "'" . $_POST['Address'] . "', "
              . "'" . $_POST['City'] . "', "
              . "'" . $_POST['Telephone'] . "', "
              . "'" . ($_POST['URL'] ?? '') .
            "')
          ";

          $conn->query($query);

          if(isset($_POST['Category_ID'])) {
            $last_id = $conn->insert_id;
            $query = "
            INSERT INTO biz_categories(Business_ID, Category_ID)
            VALUES "
              . implode(
                ",",
                array_map(
                  fn($cat_id) => "('$last_id', '$cat_id')",
                  $_POST['Category_ID']
                )
              );

            $conn->query($query);
          }

          print("<p style='color: green;'>New business added successfully.</p>");
        }
        catch(mysqli_sql_exception $e) {
          switch ($e->getCode()) {
            case 1062:
              $errMsg = "Duplicate Business Name";
              break;
          }
          print("<p style='color: red'>Error: $errMsg</p>");
        }
      }
    }
  ?>

</body>
</html>