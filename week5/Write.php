<!DOCTYPE html>
<html>

<head>
  <title>Convert degree and radian</title>
</head>

<body>
  <font style="margin: 20px" size="4" color="black">Enter a number to convert</font>

  <form style="margin: 20px" action="" method="GET">
    <input type="text" name="degree" placeholder="degree" />
    <input type="submit" value="Convert to radian" />
    <input type="reset" value="Reset" />
  </form>

  <form style="margin: 20px" action="" method="GET">
    <input type="text" name="radian" placeholder="radian" />
    <input type="submit" value="Convert to degree" />
    <input type="reset" value="Reset" />
  </form>

  <p>
    <?php
    function convert($number, $option)
    {
      if ($option == "to_radian") {
        return $converted = $number * 0.0174532925;
      } else {
        return $converted = $number * 57.2957795;
      }
    }
    if (isset($_GET)) {
      if (array_key_exists("degree", $_GET)) {
        $degree = $_GET["degree"];
        echo $degree . " degree = " . convert($degree, "to_radian") . " radian";
      }
      if (array_key_exists("radian", $_GET)) {
        $radian = $_GET["radian"];
        echo $radian . " radian = " . convert($radian, "to_option") . " degree";
      }
    } 

    ?>
  </p>

</body>

</html>