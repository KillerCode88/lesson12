<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=mybd1', 'root', '');
} catch (PDOException $x) {
    print "Error: " . $x->getMessage() . "<br/>";
    die();
}
