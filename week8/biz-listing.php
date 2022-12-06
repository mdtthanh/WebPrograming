<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Business Listings</title>

  <style>
    form {
      display: grid;
      grid-template-columns: 30% 68%;
      column-gap: 2%;
      place-items: center;
    }

    .form-left {
      border: 4px inset #000;
    }

    select {
      width: 100%;
      overflow-y: scroll;
      border: none;
      padding: 4px;
    }

    h3 {
      padding: 5px;
      font-size: 16px;
      margin-bottom: 10px;
    }

    option {
      padding: 4px;
      border-top: 1px dashed #000;
    }

    table {
      text-align: center;
    }

    table, th, td {
      border: 1px solid black;
    }

    th {
      padding: 10px 0;
      background-color: #f3f3f3;
    }

    td {
      padding: 5px 0;
    }
  </style>
</head>
<body>
  <p><a href="index.php">Return Back</a></p>
  <h1>Business Listings</h1>

  <form action="" method="get">
    <div class="form-left">
      <h3>Click on a category to find business listings: </h3>

      <select name="Category_ID" multiple onchange="this.form.submit()">
        <?php
          try {
            require_once('connectDB.php');

            $query = 'select * from Categories';
            $res = $conn->query($query);

            if ($res->num_rows > 0) {
              print($_GET['Category_ID']);
              while ($row = $res->fetch_object()) {
                print("
                  <option value='$row->Category_ID' " . ($_GET['Category_ID'] == $row->Category_ID ? 'selected' : '') . ">
                    $row->Title
                  </option>
                ");
              }
            }

            $res->free_result();
          }
          catch (mysqli_sql_exception $e) {
            print("<p>Error with database: $e</p>");
          }
        ?>
      </select>
      <noscript><input type="submit" value="Submit"></noscript>
    </div>

    <div class="form-right">
      <?php
        try {
          $query = "
            SELECT businesses.Business_ID, Name, Address, City, Telephone, URL, biz_categories.Category_ID 
            FROM categories, businesses, biz_categories 
            WHERE 
              businesses.Business_ID = biz_categories.Business_ID AND
              categories.Category_ID = biz_categories.Category_ID AND
              categories.Category_ID = '" . @$_GET['Category_ID'] . "'";
          $res = $conn->query($query);

          print("
            <p style='margin-top: 0;'>
              Number of Businesses: 
              <span style='
                font-size: 20px; 
                font-weight: bold
              '>
                $res->num_rows
              </span>
            </p>
          ");

          if ($res->num_rows > 0) {
            print("
              <table>
                <tr>
                  <th width='80px'>ID</th>
                  <th width='400px'>Name</th>
                  <th width='200px'>Address</th>
                  <th width='100px'>City</th>
                  <th width='150px'>Telephone</th>
                  <th width='200px'>URL</th>
                  <th width='80px'>Cat ID</th>
                </tr>
            ");

            while ($row = $res->fetch_object()) {
              print("
              <tr>
                <td>$row->Business_ID</td>
                <td>$row->Name</td>
                <td>$row->Address</td>
                <td>$row->City</td>
                <td>$row->Telephone</td>
                <td>$row->URL</td>
                <td>$row->Category_ID</td>
              </tr>
            ");
            }

            print("</table>");
          }

          $res->free_result();
        }
        catch (mysqli_sql_exception $e) {
          print("<p>Error with database: $e</p>");
        }
      ?>
    </div>
  </form>
</body>
</html>