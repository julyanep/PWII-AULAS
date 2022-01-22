<?php

session_start();

//include do script de conexao do banco de dados
include "connect.php";

/*+----------+--------------+------+-----+-------------------+-------------------+
| Field    | Type         | Null | Key | Default           | Extra             |
+----------+--------------+------+-----+-------------------+-------------------+
| id       | int          | NO   | PRI | NULL              | auto_increment    |
| nome     | varchar(255) | YES  |     | NULL              |                   |
| email    | varchar(255) | YES  | UNI | NULL              |                   |
| sexo     | varchar(10)  | YES  |     | NULL              |                   |
| telefone | varchar(25)  | YES  |     | NULL              |                   |
| senha    | varchar(255) | YES  |     | NULL              |                   |
| dtnasc   | varchar(25)  | YES  |     | NULL              |                   |
| tipo     | varchar(25)  | YES  |     | NULL              |                   |
| avatar   | varchar(255) | YES  |     | NULL              |                   |
| data     | timestamp    | YES  |     | CURRENT_TIMESTAMP | DEFAULT_GENERATED |
+----------+--------------+------+-----+-------------------+-------------------+
*/

// resgatar as informacoes atraves do metodo Post, e salvar em variaveis
$nome = $_POST['nome'];
$email = $_POST['email'];
$sexo = $_POST['csexo'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$dtnasc = $_POST['dtnasc'];
$tipo = $_POST['tipo'];
//$avatar = $_POST['avatar'];

//receber a imagem e salvar no diretorio da aplicação 
if($_FILES['avatar']['name']){ //verifico se foi selecionado no arquivo
    $dir = "../assets/avatar/"; // dir onde será salvo o arquivo
    $arr_ext = $_FILES['avatar']['name']; //retorna array de string
    $separa = explode(".", $arr_ext);
    $ext = array_reverse($separa); //obtem a extensão do item zero do array
    $avatar = strtolower($email . "." . $ext[0]);
    //mover o arquivo para o diretorio 
    $from = $_FILES['avatar']['tmp_name']; // arquivo de memoria
    $to = $dir . $avatar; // caminho completo do arquivo
    move_uploaded_file($from, $to);
} else{
    $avatar = null;
}

//query sql
$sql = "INSERT INTO usuario(
    nome, 
    email, 
    sexo, 
    telefone, 
    senha, 
    dtnasc, 
    tipo, 
    avatar
    ) VALUES(
        '$nome',
        '$email',
        '$sexo', 
        '$telefone', 
        '$senha',
        '$dtnasc', 
        '$tipo', 
        '$avatar'
    )";

    echo $sql;


//insert no banco de dados
$result = $conn->query($sql);

echo"<br>";

// testar se o cadastro foi feito com sucesso
if($result){
    $_SESSION['status'] = "Data inserted succesfully";
    header('Location: ../view/formulario.php');
} else{
    echo "<div style='text-align:center'><h2>Erro ao inserir os dados</h2></div>";
}


//encerrar conexão
$conn->close();

