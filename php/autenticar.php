<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once '../php/connect.php';

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';
$tipo = $_POST['tipo'] ?? '';

switch ($tipo) {
    case 'crede':
        $Tabela = 'Credes';
        $Campo_usuario = 'usuario';
        $Campo_senha = 'senha';
        $Redirect = '../html/dashboard_admin.php';
        break;
    case 'secretaria':
        $Tabela = 'Secretarias';
        $Campo_usuario = 'usuario';
        $Campo_senha = 'senha';
        $Redirect = '../html/dashboard_sec.php';
        break;
    case 'escola':
        $Tabela = 'Escolas';
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
     if ($senha === $user[$Campo_senha]) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['tipo'] = $tipo;
        header("Location: $Redirect");
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