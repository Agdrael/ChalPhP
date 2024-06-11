<?php
require_once 'config.php';

try
{
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;";
    $pdo = new PDO($dsn,$user,$password,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
   
}
catch(PDOException $e)
{
    die($e->getMessage());
}

