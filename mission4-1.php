<?php 

    // DB接続設定
    $dsn = 'mysql:dbname=tb230896db;host=localhost';
    $user = 'tb-230896';
    $password = 'UJX8ThVnUS';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
?>