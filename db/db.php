<?php
    $user = "root";
    $host = "localhost";
    $dbEngine =  "mysql";
    $dbName =  "devsnotes";
    $pdo = new PDO("$dbEngine:dbname=$dbName;host=$host", $user, '');

?>