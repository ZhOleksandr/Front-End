<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include("db_connect.php");
    include("../functions/functions.php");
    
    $login = clear_string($link, $_POST["login"]);
    
    $pass = md5(clear_string($link, $_POST["pass"]));
    $pass = strrev($pass);
    $pass = strtolower('9nm2rv8q'.$pass.'2yo6z');
    
    if ($_POST["rememberme"] == "yes")
    {
        setcookie('rememberme',$login.'+'.$pass, time()+3600*24*31, "/");
    }
    
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
        echo 'yes_auth';
    } else 
    {
        echo 'no_auth';
    }
    
}