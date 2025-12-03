<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once '../php/connect.php';

$avaliacaoTopo = $_POST["AvaliaçãoFormativa"] ?? null;
$componente    = $_POST["Componente"] ?? null;
$ciclo         = $_POST["Ciclo"] ?? null;
$responsavel   = $_POST["Responsavel"] ?? null;

// Tabelas sincronizadas
$metricas = $_POST["metricas"];
$plano    = $_POST["plano"];

// Quantidade de linhas
$qtd = count($metricas["avaliacao"]);

try {

    // Iniciar transação
    $pdo->beginTransaction();

    // Prepare insert
    $stmt = $pdo->prepare("
        INSERT INTO Planos 
        (previstos, defasagem, avaliados, reducao, status, avaliacao, ciclo, componente, serie)
        VALUES (:previstos, :defasagem, :avaliados, :reducao, :status, :avaliacao, :ciclo, :componente, :serie)
    ");

    // Loop para cada linha preenchida
    for ($i = 0; $i < $qtd; $i++) {

        $stmt->execute([
            ':previstos'  => $metricas["previstos"][$i],
            ':defasagem'  => $metricas["qtd_defasagem"][$i],  // defasagem
            ':avaliados'  => $metricas["avaliados"][$i],
            ':reducao'    => $metricas["meta_reducao"][$i],   // meta de redução
            ':status'     => $plano["status"][$i],            // status vem da aba plano
            ':avaliacao'  => $metricas["avaliacao"][$i],
            ':ciclo'      => $ciclo,
            ':componente' => $componente,
            ':serie'      => $metricas["serie"][$i]
        ]);

    }

    // Finalizar
    $pdo->commit();

    echo "<script>
        alert('Planos cadastrados com sucesso!');
        window.location.href='../html/dashboard_escola.php';
    </script>";

} catch (Exception $e) {

    $pdo->rollBack();
    die("Erro ao cadastrar plano: " . $e->getMessage());
}