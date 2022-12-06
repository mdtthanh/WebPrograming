<?php

mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);
$conn = new mysqli;
@ $conn->connect('localhost', 'kien', 'kien', 'test');


?>