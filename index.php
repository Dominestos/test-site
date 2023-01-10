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

include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'?>

    <?php if (isset($_GET['login']) && $_GET['login'] === 'yes'):
        if (!$success):
        include $_SERVER['DOCUMENT_ROOT'] . '/templates/form.php';
        endif;?>
    <?php else:?>
    <h1>Крутой проект</h1>
    <p>Вы можете насладиться управлением списками</p>
    <a type="button" class="btn btn-primary" href="?login=yes">Авторизация</a>
    <?php endif;?>
    <?php if ($success):?>
        <div class="p-3 mb-2 bg-body text-body">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/success.php';?><br>
            <a href="/gallery/" style="text-decoration: none">Перейти в Галерею</a>
        </div>
    <?php endif;?>
    <?php if ($error):?>
        <div class="form-text"><?php include $_SERVER['DOCUMENT_ROOT'] . '/include/error.php';?></div>
    <?php endif;

include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'?>
    