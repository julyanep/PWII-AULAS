<?php

//Processo de exlcusão
include"../model/connect.php"; //Primeiro, para exibir, fazer um include da conxão.

//Recuperar dado por GET
$id= $_GET['id_usuario'];

//Deletar um usuário do banco de dados
$sql= "DELETE FROM usuario WHERE id='$id'";

if ($conn->query($sql)=== TRUE) {
    require_once "../view/exibirusuarios.php";
} else {
    echo "Erro ao deletar o usuário" . $conn->error;
}

$conn->close(); //Fecha a conexão


