<?php
    $login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']),
    FILTER_SANITIZE_STRING);

    if(mb_strlen($login) < 5 || mb_strlen($login) > 30) {
        exit();
    } else if(mb_strlen($name) < 2 || mb_strlen($name) > 15) {
        exit();
    } else if(mb_strlen($password) < 5 || mb_strlen($password) > 56) {
        exit();
    }

    $mysql = new mysql('', '', '', '')
?>