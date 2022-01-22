<?php

include '../model/connect.php';

// recuperar dado por GET
$id = $_GET['id_usuario'];
$img = $_GET['img'];

$sql = "DELETE FROM usuario WHERE id= $id";

$dir = "../assets/avatar/"; 

if ($conn->query($sql) === TRUE) {
  if ($img !== "sem avatar") {
    $conn->close(); // fechar a conexão
    unlink($dir . $img); 
    require_once 'exibirUsuario.php';
  }
} else {
  echo "Error deleting record: " . $conn->error;
}






