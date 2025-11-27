<?php
$pdo = new PDO('mysql:host=127.0.0.1:3307;dbname=SIMRD', 'root', '');
// em casa o host=127.0.0.1:3307
try{
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo -> exec("SET NAMES utf8");
}catch(PDOException $e){
    echo 'Não foi possível se conectar ao banco de dados: ' . $e->getMessage();
    exit;
}