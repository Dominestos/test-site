<?php
$logins = [];
$passwords = [];
require_once $_SERVER['DOCUMENT_ROOT'] . '/data/logins.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/data/passwords.php';

$success = false;
$error = false;

//проверяем данные


if (!empty($_POST['login']) && !empty($_POST['password'])) {
    if (array_search($_POST['password'], $passwords) === false || array_search($_POST['login'], $logins) === false && array_search($_POST['password'], $passwords) !== array_search($_POST['login'], $logins)) {
        $error = true;
    } else {
        $success = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Project - ведение списков</title>
</head>
<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'?>
    </header>
    <?php if (isset($_GET['login']) && $_GET['login'] === 'yes' && !$success):
        include $_SERVER['DOCUMENT_ROOT'] . '/templates/form.php';?>
    <?php else:?>
    <h1>Крутой проект</h1>
    <p>Вы можете насладиться управлением списками</p>
    <a type="button" class="btn btn-primary" href="?login=yes">Authorization</a>
    <?php endif;?>
    <?php if ($success):?>
        <div class="form-text"><?php include $_SERVER['DOCUMENT_ROOT'] . '/include/success.php';?></div>
    <?php endif;?>
    <?php if ($error):?>
        <div class="form-text"><?php include $_SERVER['DOCUMENT_ROOT'] . '/include/error.php';?></div>
    <?php endif;?>
    <div class="footer">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'?>
    </div>
</body>
</html>