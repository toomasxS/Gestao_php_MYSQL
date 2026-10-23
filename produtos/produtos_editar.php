<?php
require 'protege.php';
require 'db.php';
$pagina_ativa = 'produtos';
$categorias = mysqli_query($ligacao, "SELECT * FROM categorias ORDER BY nome");

$id = (int) ($_GET['id'] ?? 0);
$stmt = mysqli_prepare($ligacao, "SELECT * FROM produtos WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$produtos = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$produtos) { header('Location: produtos_listar.php'); exit; }

require 'cabecalho.php';
?>
<h1>Editar produto</h1>
<form method="post" action="produtos_actualizar.php">
    <input type="hidden" name="id" value="<?php echo $produtos['id']; ?>">
    <label>Nome do produto</label>
    <input type="text" name="nome"
           value="<?php echo htmlspecialchars($produtos['nome']); ?>" required>

    <label>Preço do produto</label>
    <input type="text" name="preco"
           value="<?php echo htmlspecialchars($produtos['preco']); ?>" required>
    

    <label>Categoria</label>
    <select name="categoria_id">
        <option value="">-- sem categoria --</option>
        <?php while ($c = mysqli_fetch_assoc($categorias)):

            $sel = '' ;
            if($c['id'] == $produtos['categoria_id']) {
                $sel = "selected='selected'";
            }
            ?>
            <option  <?=$sel?>  value="<?php echo $c['id']; ?>">
                <?php echo htmlspecialchars($c['nome']); ?>
            </option>
        <?php endwhile; ?>
    </select>
    <button type="submit">Guardar</button>

</form>
<?php require 'rodape.php'; ?>