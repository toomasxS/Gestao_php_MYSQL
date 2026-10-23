<?php
require 'protege.php';
$pagina_ativa = 'categorias';
require 'cabecalho.php';
?>
<h1>Nova categoria</h1>
<form method="post" action="categorias_inserir.php">
    <label>Nome da categoria</label>
    <input type="text" name="nome" required>
    <button type="submit">Guardar</button>
</form>
<?php require 'rodape.php'; ?>