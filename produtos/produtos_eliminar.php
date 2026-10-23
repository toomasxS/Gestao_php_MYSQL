<?php
require 'protege.php';
require 'db.php';

$id = (int) ($_GET['id'] ?? 0);
if ($id > 0) {
    $consulta = "DELETE FROM produtos WHERE id = ?";
    $stmt = mysqli_prepare($ligacao, $consulta);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
}
header('Location: produtos_listar.php');
exit;
?>