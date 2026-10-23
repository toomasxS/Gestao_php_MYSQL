<?php
require 'protege.php';
require 'db.php';
$pagina_ativa = 'produtos';
$categorias = mysqli_query($ligacao, "SELECT * FROM categorias ORDER BY nome");
require 'cabecalho.php';
?>
<h1>Novo produto</h1>
<form method="post" action="produtos_inserir.php">
    <label>Nome</label>
    <input type="text" name="nome" required>

    <label>Preço (€)</label>
    <input type="number" step="0.01" min="0" name="preco" required>

    <label>Categoria</label>
    <select name="categoria_id">
        <option value="">-- sem categoria --</option>
        <?php while ($c = mysqli_fetch_assoc($categorias)): ?>
            <option value="<?php echo $c['id']; ?>">
                <?php echo htmlspecialchars($c['nome']); ?>
            </option>
        <?php endwhile; ?>
    </select>

    <button type="submit">Guardar</button>
</form>
<?php require 'rodape.php'; ?>