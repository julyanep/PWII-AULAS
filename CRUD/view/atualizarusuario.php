<?php
session_start();

/*
+----------+--------------+------+-----+-------------------+----------------+
| Field    | Type         | Null | Key | Default           | Extra          |
+----------+--------------+------+-----+-------------------+----------------+
| id       | int(11)      | NO   | PRI | NULL              | auto_increment |
| nome     | varchar(255) | YES  |     | NULL              |                |
| email    | varchar(255) | YES  | UNI | NULL              |                |
| sexo     | varchar(10)  | YES  |     | NULL              |                |
| telefone | varchar(25)  | YES  |     | NULL              |                |
| senha    | varchar(255) | YES  |     | NULL              |                |
| dtnasc   | varchar(25)  | YES  |     | NULL              |                |
| tipo     | varchar(25)  | YES  |     | NULL              |                |
| avatar   | varchar(255) | YES  |     | NULL              |                |
| data     | timestamp    | YES  |     | CURRENT_TIMESTAMP |                |
+----------+--------------+------+-----+-------------------+----------------+
*/
include "../model/connect.php";

// inserir os dados do formulário na tabela usuario
$nome = $_POST['nome'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$dtnasc = $_POST['dtnasc'];
$tipo = $_POST['tipo'];
$dir = "../assets/avatar/";


// receber a imagem e salvar no deretório da aplicação
if ($_FILES['avatar']['name']) { // verifico se foi selecionado no arquivo
    if ($img !== "sem avatar") { // verifcar se existe imagem
        unlink($dirr . $img); // deletar imagem antiga
        $dir = "../assets/avatar/"; // dir onde será salvo o arquivo
        $arr_ext = $_FILES['avatar']['name']; //retorna array de string
        $separa = explode(".", $arr_ext);
        $ext = array_reverse($separa); //obtem a extensão do item zero do array
        $avatar = strtolower($email . "." . $ext[0]);
        //mover o arquivo para o diretorio 
        $from = $_FILES['avatar']['tmp_name']; // arquivo de memoria
        $to = $dir . $avatar; // caminho completo do arquivo
        move_uploaded_file($from, $to);
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    $avatar = null;
}

// include do script de conexão com o banco de dados
if ($senha !== '' && $avatar !== '') { // verificar se campo de senha é diferente de vazio
    //update / query sql
    $sql = "UPDATE usuario
        SET nome = '$nome', 
        email = '$email', 
        senha = '$senha',
        sexo = '$sexo', 
        telefone = '$telefone', 
        dtnasc = '$dtnas', 
        tipo = '$tipo',
        avatar = '$avatar'
        WHERE id = '$id'";
} else {
    // query sem update de senha & avatar
    $sql = "UPDATE usuario
        SET nome = '$nome', 
        email = '$email', 
        sexo = '$sexo', 
        telefone = '$telefone', 
        dtnasc = '$dtnas', 
        tipo = '$tipo'
        WHERE id = '$id'";
}


//update no banco de dados
$result = $conn->query($sql);

echo "<br>";

// testar se o update foi feito com sucesso
if ($result) {
    header('Location: exibirusuarios.php');
} else {
    echo "<div style='text-align:center'><h2>Erro ao inserir os dados</h2></div>" . $conn->error;
}

//encerrar conexão
$conn->close();






