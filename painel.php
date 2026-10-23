<?php
require 'protege.php';
require 'db.php';
$pagina_ativa = 'painel';
require 'cabecalho.php';
?>
<h1>Olá, <?php echo htmlspecialchars($_SESSION['nome']); ?></h1>
<p>Este é o teu painel de gestão. Usa o menu à esquerda para navegar.</p>
<?php require 'rodape.php'; ?>