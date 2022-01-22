<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Formulário</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

    <form class="box" method="POST" action="#">
        <h1>Login</h1>
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="senha" placeholder="Senha">
        <input type="submit" value="Login">
    </form>


    <?php

    //conectar ao banco
    include "../model/connect.php";

    //pesquisar usuario e senha do banco
    // receber os dados do formulario
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

    // query de busca do banco
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $sql = "SELECT senha, email from usuario where email='$email' AND senha ='$senha'";

        // recebe a quantidade de registro(0 = login errado & 1 = login certo)
        $result = $conn->query($sql);

        //testar se tem registro
        if ($result->num_rows === 1) {

            //iniciar uma sessão do servidor
            session_start();

            // criar uma variável de sessão no server
            $_SESSION['email'] = $email;

            header("Location: formulario.php");
        } else {
            echo "<div class='alert alert-danger alerta'><strong>Erro!</strong> Email/Senha Inválidos </div>";
        }
    }

    ?>
</body>

</html>