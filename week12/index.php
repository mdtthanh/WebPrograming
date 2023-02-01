<?php
$xml = simplexml_load_file("books.xml") or die("Error: Cannot create object");
foreach ($xml->book as $book) {
    if ($book->author == "O'Brien, Tim") {
        echo $book->title;
        echo "<br>";
    }
}
