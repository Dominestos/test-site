<?php

function getConnect($user = 'root', $password = '123', $dsn = 'mysql:host=localhost;dbname=mydb')
{
    static $connection = null;

    if ($connection === null) {
       

        $connection = new PDO($dsn, $user, $password) or die('не удалось подключиться к базе данных');
    }
    
    return $connection;
}

function cutString($line, $length = 13, $appends = '...')
{
    if (mb_strlen($line) > $length) {
        return mb_substr($line, 0, $length) . $appends;
    }

    return $line;
}

//возвращает значение пароля с ключом, являющимся значением $_COOKIE['id'];
function cookieLogin($logArr)       // $logArr === $logins[]
{
    return ((isset($logArr[$_COOKIE['id']])) ? $logArr[$_COOKIE['id']] : '');
}


function authRedirect($url)     //функция, заменяющая ссылки при отсутствии авторизации
{
    $main = '/';

    if ($url !== $main) {
        return (!empty($_SESSION['auth'])) ? $url : '/?login=yes';
    } else {
        return (!empty($_SESSION['auth'])) ? '/gallery/' : $url;
    }
}

function arraySort(array $array, $key = 'sort', $sort = SORT_ASC): array
{
    $secondArr = [];

    foreach ($array as $num => $value) {
        $secondArr[$num] = $value[$key];
    }
    array_multisort($secondArr, $sort, $array);

    return $array;

}

function showMenu(array $unsortedMenu, $class = 'default', $sortKey = 'sort', $sortMethod = SORT_ASC)
{
    $sortedMenu = arraySort($unsortedMenu, $sortKey, $sortMethod);
    $x = '';
    $style = '';
    $rtitle = '';

        foreach ($sortedMenu as $key => $value) {
            
            $style = ($_SERVER['REQUEST_URI'] === $value['path']) ? 'text-decoration: underline' : 'text-decoration: none';
            $rtitle = (mb_strlen($value['title']) >= 15) ? cutString($value['title'], 12) : $value['title'];
            
             $x .= '<li class="nav-item ' . $class . '"><a class="nav-link" href="' . authRedirect($value['path']) . '" style="' . $style . '">' . $rtitle . '</a></li>';
        }
        return $x;
}

function showTitle(array $arrayMenu, $url, $component = PHP_URL_PATH): string
{
    foreach ($arrayMenu as $value) {
        if ($value['path'] === parse_url($url, $component)) {
            return $value['title'];
        }
    }
}

function showGroups(array $array): string
{
    $groups = "";
    foreach ($array as $key => $value) {
        $groups ="'{$value}' {$groups}";
    }
     return $groups;
}
