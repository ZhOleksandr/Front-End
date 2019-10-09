<?php
$db_host     = 'localhost';
$db_user     = 'admin';
$db_pass     = '12345';
$db_database = 'db_shop';

$link = mysqli_connect($db_host,$db_user,$db_pass,$db_database);

//mysqli_select_db($link, $db_database) or die ("Немає з'єднання з БД".mysqli_error());
//mysqli_query($link, "SET names cp-1251");
if (mysqli_connect_errno()) {
    printf("Немає з'єднання з БД: %s\n", mysqli_connect_error());
    exit();
}
mysqli_set_charset($link, "utf8"); 
$link->set_charset("utf8");
