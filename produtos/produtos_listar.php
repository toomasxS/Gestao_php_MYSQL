<?php
require 'protege.php';
require 'db.php';
$pagina_ativa = 'produtos';

// JOIN entre produtos e categorias, para mostrar o NOME da categoria
// em vez de apenas o categoria_id
$consulta = "SELECT p.id, p.nome, p.preco, c.nome AS categoria
             FROM produtos p
             LEFT JOIN categorias c ON p.categoria_id = c.id
             ORDER BY p.nome";
$resultado = mysqli_query($ligacao, $consulta);

require 'cabecalho.php';
?>
<h1>Produtos</h1>
<p><a href="produtos_novo.php">+ Novo produto</a></p>
<table>
<tr><th>Nome</th><th>Preço</th><th>Categoria</th><th>Ações</th></tr>
<?php while ($linha = mysqli_fetch_assoc($resultado)): ?>
<tr>
    <td><?php echo htmlspecialchars($linha['nome']); ?></td>
    <td><?php echo number_format($linha['preco'], 2, ',', ' '); ?> €</td>
    <td><?php echo htmlspecialchars($linha['categoria'] ?? '(sem categoria)'); ?></td>
    <td>
        <a href="produtos_editar.php?id=<?php echo $linha['id']; ?>">Editar</a>
        <a href="produtos_eliminar.php?id=<?php echo $linha['id']; ?>"
           onclick="return confirm('Eliminar?');">Eliminar</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
<?php require 'rodape.php'; ?>