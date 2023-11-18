<?php
include("constants.php");
try {
    $DbConn = new PDO("mysql:host=$servername;dbname=authordb", $username, $password);
    // set the PDO error mode to exception
    $DbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>