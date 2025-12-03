<?php
require_once '../php/connect.php'; // Conexão PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Valida dados principais
    $ciclo = $_POST['Ciclo'] ?? null;
    $componente = $_POST['Componente'] ?? null;
    $avaliacao = $_POST['AvaliaçãoFormativa'] ?? null;
    $responsavel = $_POST['Responsavel'] ?? null;

    if (!in_array($ciclo, [1,2,3])) die("Ciclo inválido");
    if (!in_array($componente, [1,2])) die("Componente inválido");
    if (!in_array($avaliacao, [1,2,3])) die("Avaliação inválida");

    $pdo->beginTransaction();

    try {
        // Inserir Planos
        $stmt = $pdo->prepare("INSERT INTO Planos (ciclo, componente, avaliacao, responsavel, status) VALUES (?, ?, ?, ?, ?)");
        foreach ($_POST['plano']['status'] as $i => $status) {
            if (!in_array($status, [1,2,3,4,5])) throw new Exception("Status inválido na linha ".($i+1));
            $stmt->execute([$ciclo, $componente, $avaliacao, $responsavel, $status]);
        }

        $pdo->commit();
        echo "Plano cadastrado com sucesso!";
        header("Location: ../html/dashboard_escola.php");
        exit;
    } catch (Exception $e) {
        $pdo->rollBack();
        die("Erro ao cadastrar plano: ".$e->getMessage());
    }
} else {
    die("Acesso inválido.");
}
?>