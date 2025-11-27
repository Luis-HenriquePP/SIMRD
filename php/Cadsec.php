<?php
require_once '../php/connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = $_POST['usuario'] ?? '';
    $municipio = ['1' => 'Canindé', '2' => 'Caridade', '3' => 'General Sampaio', '4' => 'Itatira', '5' => 'Paramoti', '6' => 'Santa Quitéria'];
    $idMunicipio = $_POST['municipio'] ?? null;
    $municipio = $municipio[$idMunicipio] ?? 'Desconhecido';

    if(empty($usuario) || empty($municipio)){
        die('Existem campos obrigatórios não preenchidos.');
    }
$stmt = $pdo-> prepare("INSERT INTO Secretarias (usuario, municipio) VALUES (?, ?)");
    try{
        $stmt -> execute([$usuario, $municipio ]);
        header('Location: ../html/dashboard_crede.php?sucesso=1');
        exit();
    }catch(PDOException $e){
        die('Erro ao cadastrar escola' . $e -> getMessage());
    }
}