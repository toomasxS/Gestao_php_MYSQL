<?php
require 'protege.php';
require 'db.php';

$nome         = trim($_POST['nome'] ?? '');
$preco        = (float) str_replace(',', '.', $_POST['preco'] ?? '0');
$categoria_id = $_POST['categoria_id'] !== '' ? (int) $_POST['categoria_id'] : null;

if ($nome === '') { header('Location: produtos_novo.php'); exit; }

$consulta = "INSERT INTO produtos (nome, preco, categoria_id) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($ligacao, $consulta);
mysqli_stmt_bind_param($stmt, 'sdi', $nome, $preco, $categoria_id);
mysqli_stmt_execute($stmt);

header('Location: produtos_listar.php');
exit;