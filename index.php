<?php
require __DIR__ . '/config/debug.php';
require __DIR__ . '/config/db.php';
$sql = "SELECT * FROM `contact` ORDER BY `id` DESC";
$query = $pdo->query($sql);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Книга контактов</title>
</head>

<body>
    <main>
        <div class="card">
            <div class="card-header">
                Добавить контакт
            </div>
            <div class="card-body">
                <form action="work.php" method="POST">
                    <input name="name" type="text" placeholder="Имя" maxlength="50" required>
                    <input name="phone" type="text" placeholder="Телефон" required class="input_tel">
                    <button type="submit">Добавить</button>
                </form>
            </div>

        </div>
        <div class="card">
            <div class="card-header">
                Список контактов
            </div>
            <?php while ($contact = $query->fetch(PDO::FETCH_OBJ)) : ?>
                <div class="card-contact">
                    <?= $contact->name ?> &nbsp;&nbsp;<a href="/work.php?del=<?= $contact->id ?>" title="Удалить контакт"><i class="fas fa-times delete"></i></a>
                    <br>
                    <span class="phone"><?= $contact->phone ?></span>
                </div>
            <?php endwhile ?>

        </div>

    </main>

    <script src="https://kit.fontawesome.com/779f09d132.js"></script>
    <script src="js/mask.js"></script>
    <script src="js/script.js"></script>

</body>

</html>