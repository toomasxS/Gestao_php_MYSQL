<?php
require 'protege.php';
require 'db.php';
$id   = (int) ($_POST['id'] ?? 0);
$nome = trim($_POST['nome'] ?? '');
$preco        = (float) str_replace(',', '.', $_POST['preco'] ?? '0');
$categoria_id = $_POST['categoria_id'] !== '' ? (int) $_POST['categoria_id'] : null;
if ($nome === '') { header('Location: produtos_editar.php'); exit; }
if ($id > 0 && $nome !== '') {
    $consulta = "UPDATE produtos SET nome = ?, preco=?, categoria_id = ? WHERE id = ?";
    $stmt = mysqli_prepare($ligacao, $consulta);
    mysqli_stmt_bind_param($stmt, 'sdii', $nome, $preco, $categoria_id, $id);
    mysqli_stmt_execute($stmt);
}
header('Location: produtos_listar.php');
exit;
?>