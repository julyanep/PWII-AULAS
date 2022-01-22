<?php

//Processo de exlcusão
include"../model/connect.php"; //Primeiro, para exibir, fazer um include da conxão.

//Recuperar dado por GET
$id= $_GET['id_usuario'];
$img=$_GET['img'];
$dir = "../assets/avatar/";

//Deletar um usuário do banco de dados
$sql= "DELETE FROM usuario WHERE id='$id'";

if ($conn->query($sql)=== TRUE) {
    if($img !== "não  há avatar"){
        unlink($dir. $img);
        require_once "../view/exibirusuarios.php";
    }
   
} else {
    echo "Erro ao deletar o usuário" . $conn->error;
}

$conn->close(); //Fecha a conexão


