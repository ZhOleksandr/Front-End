<?php

if ($_SESSION['auth'] != 'yes_auth' && $_COOKIE["remember"]) //авторизація відбуватиметься при умові що користувач не авторизований  файл кук існує
{
    $str = $_COOKIE["remember"];
    
    $all_len = strlen($str); //вся довжина рядка
    $login_len = stpos($str,'+');//довжина логіна
    $login = clear_string($link, substr($str,0,$login_len));//обрізаємо рядок до плюса і отримуємо логін
    $pass = clear_string($link, substr($str,$login_len+1,$all_len));// отримуємо пароль
    
    $result = mysqli_query($link, "SELECT * FROM reg_user WHERE login = '$login' AND pass = '$pass'");
    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION['auth'] = 'yes_auth';
        $_SESSION['auth-pass'] = $row['pass'];
        $_SESSION['auth-login'] = $row['login'];
        $_SESSION['auth-name'] = $row['name'];
        $_SESSION['auth-email'] = $row['email']; 
    }
}

