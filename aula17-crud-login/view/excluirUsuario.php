<?php

// processo de exclusão
include "../model/connect.php";

// recuperar dado por get
$id = $_GET['id_usuario'];

// sql to delete a record
$sql = "DELETE FROM usuario WHERE id='$id'";

// echo $sql; // debug

if ($conn->query($sql) === TRUE) {
    $conn->close();
    require_once "exibirUsuarios.php";
} else {
    echo "Error deleting record: " . $conn->error;
}