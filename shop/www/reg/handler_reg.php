<?php

    session_start();
    include ("../include/db_connect.php");
    include ("../functions/functions.php");

    $error = array();

    $login =  iconv("UTF-8", "cp1251", strtolower(clear_string($link, $_POST['reg_login'])));
    $pass =  iconv("UTF-8", "cp1251", strtolower(clear_string($link, $_POST['reg_pass'])));

    $name =  iconv("UTF-8", "cp1251", strtolower(clear_string($link, $_POST['reg_name'])));
    $email =  iconv("UTF-8", "cp1251", strtolower(clear_string($link, $_POST['reg_email'])));

    if (strlen($login) < 5 or strlen($login) > 15) {
        $error[] = "Логин должен быть от 5 до 15 символов";
    } else {
        $result = mysqli_query($link, "SELECT login FROM reg_user WHERE login = '$login'");                
        if (mysqli_num_rows($result) > 0)  {
            $error[] = "Логин занят!";
        }
    }
    if (strlen($pass) < 7  or strlen($pass) > 15) {
        $error[] = "Укажите пароль от 7 до 15!";
    }
    if (strlen($name) < 3  or strlen($name) > 15) {
        $error[] = "Укажите имя от 3 до 15!";
    }
    if (! preg_match('|^[-a-z0-9_\.]+\@[-a-z0-9_\.]+\.[a-z]{2,6}$|i', $email)) {
        $error[] = "Укажите корректный E-mail!";
    }

    if (count($error)) {        
        echo implode('<br>', $error);
    } else {
        $pass = md5($pass);
        $pass = strrev($pass);
        $pass = '9nm2rv8q'.$pass.'2yo6z';

        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:i:s', time());
        mysqli_query($link, "  INSERT INTO reg_user(login, pass, name, email, datetime, ip) 
                                VALUES(
                                    '$login',
                                    '$pass',
                                    '$name',
                                    '$email',
                                    '$date',
                                    '$ip'
                                                )");
        
    echo 'true';
    }