<?php
require 'protege.php';
require 'db.php';
$pagina_ativa = 'categorias';

$id = (int) ($_GET['id'] ?? 0);
$stmt = mysqli_prepare($ligacao, "SELECT * FROM categorias WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$categoria = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$categoria) { header('Location: categorias_listar.php'); exit; }

require 'cabecalho.php';
?>
<h1>Editar categoria</h1>
<form method="post" action="categorias_actualizar.php">
    <input type="hidden" name="id" value="<?php echo $categoria['id']; ?>">
    <label>Nome da categoria</label>
    <input type="text" name="nome"
           value="<?php echo htmlspecialchars($categoria['nome']); ?>" required>
    <button type="submit">Atualizar</button>
</form>
<?php require 'rodape.php'; ?>