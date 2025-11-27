<?php
require_once '../php/connect.php';

$idTarefa = $_GET['id'] ?? '';

if (!$idTarefa) {
    echo json_encode([]);
    exit;
}

// Buscar detalhes completos da tarefa
$sql = $pdo->prepare("
    SELECT 
        T.nome AS plano,
        T.responsavel,
        C.nome AS componente,
        S.nome AS serie,
        ST.nome AS status,
        T.data_inicial,
        T.data_final
    FROM Tarefa T
    LEFT JOIN Componente C ON T.componente = C.idComponente
    LEFT JOIN Serie S ON T.serie = S.idSerie
    LEFT JOIN Status ST ON T.status = ST.idStatus
    WHERE T.idTarefa = :idTarefa
");

$sql->execute([':idTarefa' => $idTarefa]);
$tarefa = $sql->fetch(PDO::FETCH_ASSOC);

echo json_encode($tarefa);
