<?php
session_start();
require_once 'conexao.php';

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';
$tipo = $_POST['tipo'] ?? '';

switch ($tipo) {
    case 'crede':
        $Tabela = 'Crede';
        $Campo_usuario = 'usuario';
        $Campo_senha = 'senha';
        $Redirect = '../html/dashboard_admin.php';
        break;
    case 'secretaria':
        $Tabela = 'Secretaria';
        $Campo_usuario = 'usuario';
        $Campo_senha = 'senha';
        $Redirect = '../html/dashboard_sec.php';
        break;
    case 'escola':
        $Tabela = 'Escola';
        $Campo_usuario = 'inep';
        $Campo_senha = 'senha';
        $Redirect = '../html/dashboard_escola.php';
        break;
    default:
        die('Tipo de usuário inválido.');
}

$sql = "SELECT * FROM $Tabela WHERE $Campo_usuario = :usuario LIMIT 1";
$stmt = $pdo -> prepare($sql);
$stmt -> bindValue(":usuario", $usuario, PDO::PARAM_STR);
$stmt -> execute();
$user = $stmt -> fetch(PDO::FETCH_ASSOC);

if ($user) {
     if ($senha === $user[$campo_senha]) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['tipo'] = $tipo;
        header("Location: $redirect");
        exit;
    } else {
        $_SESSION['login_error'] = 'Senha incorreta.';
        header("Location: ../html/login.php?tipo=$tipo");
        exit;
    }
} else {
    $_SESSION['login_error'] = 'Usuário não encontrado.';
    header("Location: ../html/login.php?tipo=$tipo");
    exit;
}