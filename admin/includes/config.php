<?php

$db_username = "root";
$db_password = "";
$db_name = "forceofnature";
$db_host = "localhost";
$db = mysqli_connect($db_host, $db_username, $db_password,$db_name);
mysqli_set_charset($db, 'utf8');

setlocale(LC_TIME, "fr_FR");