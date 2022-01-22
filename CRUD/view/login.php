<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Página de Login</title>
</head>

<body>
    <div class="container">
        <div class="pt-2">
            <div class="card bg-ligth">
                <div class="card-header bg-warning text-white">
                    <h1>Login</h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="#" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md"></div>
                            <div class="col-md-5">
                                <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="email@example.com" required>
                            </div>
                            <div class="col-md"></div>
                        </div>
                        <div class="row">
                            <div class="col-md"></div>
                            <div class="col-md-5">
                                <label for="inputSenha" class="col-sm-4 col-form-label">Senha</label>
                                <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="col-md"></div>
                        </div>
                        <div class="row">
                            <div class="col-md"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn bg-warning text-white">Entrar</button>
                            </div>
                            <div class="col-md"></div>
                        </div>
                    </form>
                </div>

                <?php
                //Conectar ao banco de dados
                include "../model/connect.php";

                //Pesquisar usuário e senha no banco de dados
                //Para isso precisamos primeiro receber os dados do formulário
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

                //Query de busca no banco de dados
                if (isset($_POST['email']) && isset($_POST['senha'])) {
                    $sql = "SELECT senha, email FROM usuario WHERE email = '$email' AND senha = '$senha' ";

                    //Variável para receber a quantidade de registros
                    $result = $conn->query($sql);

                    //Testar se há resgistros
                    if ($result->num_rows === 1) {

                        //Iniciar uma sessão no servidor
                        session_start();

                        //Criar uma variável de sessão no server
                        $_SESSION['email'] = $email;

                        header("Location: formulario.php");
                    } else {
                        echo "Não foi possível realizar o login!";
                    }
                }

                ?>
            </div>
            <div class="card-footer  bg-warning text-white">
                Autora: Julyane Pereira Hengler
            </div>
        </div>
    </div>
</body>

</html>