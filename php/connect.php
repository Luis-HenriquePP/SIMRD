<?php
$pdo = new PDO('mysql:host=localhost;dbname=SIMRD', 'root', '');
try{
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo -> exec("SET NAMES utf8");
    echo('Banco conectado com sucesso!');
}catch(PDOException $e){
    echo 'Não foi possível se conectar ao banco de dados: ' . $e->getMessage();
    exit;
}