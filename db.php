<?php
/**
 * Ficheiro central de ligação à base de dados.
 * Todos os outros ficheiros PHP fazem: require 'db.php';
 */
$servidor   = 'localhost';   // nome do SERVIÇO no docker-compose.yml, não é "localhost"!
$utilizador = 'root';
$password   = 'root';     // sem password (MYSQL_ALLOW_EMPTY_PASSWORD) - só para aprendizagem!
$basedados  = 'a14816_bd_produtos';

$ligacao = mysqli_connect($servidor, $utilizador, $password, $basedados);

if (!$ligacao) {
    die('Erro de ligação à base de dados: ' . mysqli_connect_error());
}
mysqli_set_charset($ligacao, 'utf8mb4');
?>