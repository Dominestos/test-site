<?php

$success = false;
$error = false;
$pdo = getConnect();



if (isset($_COOKIE['id'])) {
    setcookie('id', $_COOKIE['id'], time() + (3600 * 24 * 30), '/');
}


// if (!empty($_POST['login']) && !empty($_POST['password'])) {
//     $loginId = array_search($_POST['login'], $logins);
//     if (array_search($_POST['password'], $passwords) === false || array_search($_POST['login'], $logins) === false && array_search($_POST['password'], $passwords) !== array_search($_POST['login'], $logins)) {
//         $error = true;
//     } else {
//         $loginID = array_search($_POST['login'], $logins);
//         $success = true;
//         $_SESSION['auth'] = true;
//         setcookie('id', $loginID, time() + (60 * 60 * 24 * 30), '/');
//     }
// }



if (isset($_POST['login']) && isset($_POST['password'])) {
    $userID = '';
    $stmt_user = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $stmt_user->bindParam(1, $_POST['login'], PDO::PARAM_STR);
    $stmt_user->execute();
    $result = $stmt_user->fetch();
    $passwordPass = password_verify($_POST['password'], $result['hash_password']);
    if ($_POST['login'] === $result['login'] && $passwordPass) {
        $userID = $result['id'];
        $success = true;
        $_SESSION['auth'] = [
            'id' => $result['id'],
            'full_name' => $result['full_name'],
            'phone_num' => $result['phone_number'],
            'email' => $result['email'],
            'groups' => ''
        ];
        $stmt_groups = $pdo->prepare("SELECT user_groups.name FROM group_user LEFT JOIN user_groups ON group_id = user_groups.id WHERE user_id = ?");
        $stmt_groups->bindParam(1, $userID, PDO::PARAM_STR);
        $stmt_groups->execute();
        $_SESSION['auth']['groups'] = [];
        $i = 0;
        while ($row = $stmt_groups->fetch()) {
            $_SESSION['auth']['groups'][$i] = $row['name'];
            $i++;
        };
        setcookie('id', $userID, time() + (60 * 60 * 24 * 30), '/');
    } else {
        $error = true;
    }
}


