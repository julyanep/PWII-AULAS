<?php
include "../config/config.php";

//realizar conexão (objeto)
$conn = new mysqli($hostname, $username, $password, $database);

//testar a conexão
if($conn->connect_error){
    die("Erro de conexão: " . $conn->connect_error);
}

//exibir mensagem para debug
if($flag_exibir){
    echo "";
}



