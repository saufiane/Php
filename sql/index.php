<?php

require_once("inc_files.php");

$pdo = new PDO ('mysql:host=' .DB_SERVER . ';dbname=' .DB_NAME . ';charset=utf8', DB_USER, DB_PASS, array (PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8 COLLATE utf8_general_ci',PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION) );

$query = $pdo->query('SELECT * FROM client');

$result = $query ->fetchAll( PDO::FETCH_ASSOC );

var_dump ($result);
?>s