<?php

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

// inserir os dados do formulário na tabela usuario
$nome = $_POST['nome'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$dtnasc = $_POST['dtnasc'];
$tipo = $_POST['tipo'];

// receber a imagem e salvar no deretório da aplicação
if($_FILES['avatar']['name']) { // verifico se foi selecionado um arquivo
    $dir ="../assets/avatar/"; // dir onde será salva a imagem
    $array_ext = $_FILES['avatar']['name']; // retorna um array de strings
    $separa = explode(".", $array_ext);
    $ext = array_reverse($separa); // obtem a ext no indice 0 do array
    $avatar = strtolower($email . "." . $ext[0]);
    // mover o arquivo para o diretorio
    $from = $_FILES['avatar']['tmp_name']; // arquivo em memória
    $to = $dir . $avatar; // caminho completo do arquivo
    echo $to."<br>";
    if(move_uploaded_file($from, $to)) {
        echo "ok";
    } else {
        echo "ruim";
    }
} else {
    $avatar = null;
}

// include do script de conexão com o banco de dados
include "connect.php";

// variável da query
$sql = "INSERT INTO usuario (
        nome,
        email,
        sexo,
        telefone,
        senha,
        dtnasc,
        tipo,
        avatar
    ) VALUES (
        '$nome',
        '$email',
        '$sexo',
        '$telefone',
        '$senha',
        '$dtnasc',
        '$tipo',
        '$avatar'
    )";

    echo "<br>".$sql."<br>";

// realizar o insert de dados
$result = $conn->query($sql);

// testar se o Cadastro foi feit com sucesso
if($result) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Deu ruim no Cadastro...";
}

// encerra a conexão com banco de dados
$conn->close();