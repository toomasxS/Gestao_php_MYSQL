<?php
require 'protege.php';
require 'db.php';
$pagina_ativa = 'categorias';

$consulta = "SELECT * FROM categorias ORDER BY nome";
$resultado = mysqli_query($ligacao, $consulta);

require 'cabecalho.php';
?>
<h1>Categorias</h1>
<p><a href="categorias_novo.php">+ Nova categoria</a></p>

<table>
<tr><th>ID</th><th>Nome</th><th>Ações</th></tr>
<?php while ($linha = mysqli_fetch_assoc($resultado)): ?>
<tr>
    <td><?php echo $linha['id']; ?></td>
    <td><?php echo htmlspecialchars($linha['nome']); ?></td>
    <td>
        <a href="categorias_editar.php?id=<?php echo $linha['id']; ?>">Editar</a>
        <a href="categorias_eliminar.php?id=<?php echo $linha['id']; ?>"
           onclick="return confirm('Eliminar esta categoria?');">Eliminar</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
<?php require 'rodape.php'; ?>