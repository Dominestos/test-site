<?php

include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';

?>
<div class="content myred" width="100%" border="0" cellspacing="0" cellpadding="0">
    <h1><?=showTitle($main_menu, 'https://newsitephp' . $_SERVER['REQUEST_URI'])?></h1>
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item">ФИО:</li>
        <li class="list-group-item"><?=$_SESSION['auth']['full_name'] ?></li>
    </ul>
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item">Электронная почта:</li>
        <li class="list-group-item"><?=$_SESSION['auth']['email'] ?></li>
    </ul>
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item">Номер телефона:</li>
        <li class="list-group-item"><?=$_SESSION['auth']['phone_num'] ?></li>
    </ul>
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item">Группы, в которых состоит пользователь:</li>
        <li class="list-group-item"><?= showGroups($_SESSION['auth']['groups']) ?></li>
    </ul>

</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';?>