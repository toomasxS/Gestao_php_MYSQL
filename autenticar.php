<?php
session_start();
require 'db.php';

$utilizador = $_POST['utilizador'] ?? '';
$password   = $_POST['password'] ?? '';

if ($utilizador === '' || $password === '') {
    header('Location: login.php?erro=1');
    exit;
}

$consulta = "SELECT * FROM administradores WHERE utilizador = ?";
$stmt = mysqli_prepare($ligacao, $consulta);
mysqli_stmt_bind_param($stmt, 's', $utilizador);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
$registo = mysqli_fetch_assoc($resultado);

// password_verify compara a password escrita com o hash guardado na BD
if ($registo && password_verify($password, $registo['password'])) {
    $_SESSION['utilizador'] = $registo['utilizador'];
    $_SESSION['nome']       = $registo['nome'];
    $_SESSION['admin_id']   = $registo['id'];
    header('Location: painel.php');
    exit;
} else {
    header('Location: login.php?erro=1');
    exit;
}