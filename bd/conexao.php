<?php

$dsn = 'mysql:dbname=oat_web_luiz;host=localhost;charset=utf8';
$user = 'root';
$password = '';

try{
  $conn = new PDO($dsn, $user, $password);
}catch (PDOException $e){
  die('DB Error: ' . $e->getMessage());
}

?>