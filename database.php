<?php

$db_host = 'localhost';
$db_name = 'quizzer';
$db_user = 'root';
$db_pass = 'root';

//create mysqli object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//error handler
if($mysqli->connect_error){

    echo $mysqli->connect_error;
    exit;
}