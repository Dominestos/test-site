<?php
$sessionLifetime = 3600 * 24 * 30;
session_set_cookie_params($sessionLifetime);
session_start();


require_once $_SERVER['DOCUMENT_ROOT'] . '/src/core.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/data/logins.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/data/passwords.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/authLogic.php';


?>
<!DOCTYPE html>
<html lang="ru">
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
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/authButton.php'; ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?=showMenu($main_menu, 'headermenulink', 'sort', SORT_ASC)?>
                    </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
    </header>