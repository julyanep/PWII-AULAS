<?php

include "../config/config.php";

// Criar um objeto de conexão (instância)
$conn = new mysqli($hostname, $username, $password, $database);

// Testar a conexão 
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Exibir mensagem para debug
if ($flag_exibir) {
    echo "<br> Conexão bem sucedida!";
}
