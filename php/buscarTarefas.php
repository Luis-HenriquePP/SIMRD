<?php
require_once '../php/connect.php';

$idEscolas = $_GET['idEscolas'] ?? '';

if (!$idEscolas) {
    echo json_encode([]);
    exit;
}

// Buscar a tarefa vinculada à escola
$sql = $pdo->prepare("
    SELECT 
        T.idTarefa,
        T.nome,
        C.nome AS componente,
        S.nome AS serie,
        ST.nome AS status,
        T.data_inicial,
        T.data_final
    FROM Tarefa T
    JOIN Escolas E ON E.tarefa = T.idTarefa
    LEFT JOIN Componente C ON T.componente = C.idComponente
    LEFT JOIN Serie S ON T.serie = S.idSerie
    LEFT JOIN Status ST ON T.status = ST.idStatus
    WHERE E.idEscolas = :idEscolas
");

$sql->execute([':idEscolas' => $idEscolas]);
$tarefas = $sql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($tarefas);
