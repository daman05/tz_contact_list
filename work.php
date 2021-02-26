<?php
error_reporting(E_ALL | E_WARNING | E_NOTICE | E_ERROR | E_STRICT | E_DEPRECATED);
require __DIR__ . '/config/debug.php';
require __DIR__ . '/config/db.php';

if (isset($_GET) && !empty($_GET['del'])) {

    $id = $_GET['del'];
    $sql = "DELETE FROM `contact` WHERE `contact`.`id` = ?;";
    $stmt = $pdo->prepare($sql);

    if (!$stmt->execute([$id])) {
        debug($stmt->errorInfo(), 1);
    }
} elseif (isset($_POST) && !empty($_POST['name']) && !empty($_POST['phone'])) {
    $_POST = array_map('trim', $_POST);
    $_POST = array_map('htmlentities', $_POST);

    $sql  = "INSERT INTO `contact` (`id`, `name`, `phone`) VALUES (NULL, ?, ?);";
    $stmt = $pdo->prepare($sql);

    if (!$stmt->execute([$_POST['name'], $_POST['phone']])) {
        debug($stmt->errorInfo(), 1);
    }
}

die(header('location: /'));
