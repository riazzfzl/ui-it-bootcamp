<?php

$db_host = 'localhost';
$db_name = 'bootcamp';
$db_username = 'root';
$db_password = '';

$dsn = "mysql:host=$db_host;dbname=$db_name;";

// to avoid showing the credentials when error occurs // PDO is PHP data object
try {
  $db_connection = new PDO($dsn, $db_username, $db_password);
} catch (Exception $e) {
  echo "An error occured: " . $e->getMessage();
}