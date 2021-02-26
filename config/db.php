<?php

$host = 'localhost';
$dbname = 'tz-alterra';
$user = 'root';
$pass = '';
$charset = 'utf8';

$pdo = new PDO(
    "mysql:host=$host;
        dbname=$dbname;
        charset=$charset",
    $user,
    $pass
);
