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
    <title>Cadrasto de Usuário</title>
</head>

<body>
    <div class="container">
        <div class="pt-2">
            <div class="card">
                <div class="card-header bg-info">
                    <h1>Login</h1>
                </div>
                <div class="card-body">
                    <div class="col-md">
                        <form method="post" action="#" enctype="multipart/form-data">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" name="email" id="inputEmail" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="inputSenha" class="form-label">Senha</label>
                            <input type="password" name="senha" id="inputSenha" class="form-control" required>
                        </div>
                    </div>
                </div>

                <?php
                // conectar ao banco
                include "../model/connect.php";

                // pesquisar usuario e senha no banco
                // receber od dados do formulário
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

                // query de busca no banco
                if (isset($_POST['email']) && isset($_POST['senha'])) {
                    $sql = "SELECT senha, email FROM usuario WHERE email='$email' AND senha'$senha'";

                    // receber a quantidade de registros
                    $result = $conn->query($sql);


                    // testar se tem registro
                    if ($result->num_rows === 1) {
                        // iniciar uma sessão no server
                        session_start();

                        // criar uma variável de sessão no server
                        $_SESSION['email'] = $email;

                        header("Location: formulario.php");
                    } else {
                        echo "Não foi possível logar, verifique o login";
                    }
                }
                ?>

                <div class="col-md">
                    <div class="col-md-2 py-3">
                        <button type="submit" value="Entrar">Entrar</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="card-footer bg-info">
                Autor: Vinícius Leandro Dos Santos
            </div>
        </div>
    </div>
</body>

</html>