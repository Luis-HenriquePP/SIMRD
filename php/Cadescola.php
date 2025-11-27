<?php 
require_once '../php/connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nome = $_POST['nome'] ?? '';
    $inep = $_POST['inep'] ?? '';
    $municipio = ['1' => 'Canindé', '2' => 'Caridade', '3' => 'General Sampaio', '4' => 'Itatira', '5' => 'Paramoti', '6' => 'Santa Quitéria'];
    $idMunicipio = $_POST['municipio'] ?? null;
    $municipio = $municipio[$idMunicipio] ?? 'Desconhecido';
    $localidade = ['1' => 'Urbana', '2' => 'Rural'];
    $idLocalidade = $_POST['localidade'] ?? null;
    $localidade = $localidade[$idLocalidade] ?? 'Não informada';

    if(empty($nome) || empty($inep)){
        die('Existem campos obrigatórios não preenchidos.');
    }

    $stmt = $pdo -> prepare("INSERT INTO Escolas (nome, inep, municipio, localidade) VALUES (?, ?, ?, ?)");
    try{
        $stmt -> execute([$nome, $inep, $municipio, $localidade]);
        header('Location: ../html/dashboard_crede.php?sucesso=1');
        exit();
    }catch(PDOException $e){
        die('Erro ao cadastrar escola' . $e -> getMessage());
    }
}