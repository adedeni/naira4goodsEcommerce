<?php
//connecting to db raolakadmin db
$dbusername = 'root';
$dbpassword = '';
$host = "localhost";
$dbname = 'raolakadmin';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbpassword, $dbusername);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
        echo "Connection failed". $e -> getMessage();
}

