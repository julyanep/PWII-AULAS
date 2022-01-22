<?php

include "../config/config.php";

// criar um objeto de conexão (instância)
$conn = new mysqli($hostname, $username, $password, $database);

// testar a conexão 
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// exibir mensagem para debug
if ($flag_exibir) {
    echo "<br> Conexão bem sucedida!";
}
