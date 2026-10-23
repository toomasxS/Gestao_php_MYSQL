<?php
session_start();
if (isset($_SESSION['utilizador'])) {
    header('Location: painel.php');
    exit;
}
$erro = isset($_GET['erro']) ? $_GET['erro'] : '';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
    <script>
        function validar(frm) {
            if (frm.utilizador.value === '') {
                alert('Tens de escrever o utilizador.');
                return false;
            }
            if (frm.password.value === '') {
                alert('Tens de escrever a password.');
                return false;
            }
            return true;
        }
    </script>

<head>
  <title>Painel Gestao - Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<div class="container mt-3">
<h2>Painel gestao - Login </h2>
<form method="post" action="autenticar.php" onsubmit="return validar(this);">
    <?php if ($erro === '1'): ?>
            <p class="mensagem erro">Utilizador ou password incorretos.</p>
        <?php endif; ?>
 

  <div class="mb-3 mt-3">
    <label for="utilizador" class="form-label">Utilizador:</label>
    <input type="text" class="form-control" id="utilizador" placeholder="Escreva o utilizador" name="utilizador">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password:</label>
    <input type="password" class="form-control" id="password" placeholder="Escreva a password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Entrar</button>
</form>
</div>

</head>

</html>