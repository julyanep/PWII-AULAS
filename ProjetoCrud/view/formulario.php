<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Formulario - CRUD</title>
</head>

<body>
    <?php
    session_start();
    ?>

    <?php
    //testar se o usuario está logado

    //verificar se existe uma sessão aberta no server
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    // testar se o usuario está logado ou não
    if (isset($_SESSION['email'])) {
    } else {
        // apagar a variavel de sessão
        unset($_SESSION['email']);
        header("Location: ../index.php");
    }

    ?>


    <?php
    if (isset($_SESSION['status'])) {
    ?>
        <div class='alert alert-success alerta'><strong>Sucesso !</strong> Cadastro realizado com sucesso</div>;

    <?php
        unset($_SESSION['status']);
    }
    ?>


    <!-- Formulario -->
    <div class="container">
        <div class="col-12">
            <div class="card bg-dark text-white" style="font-weight: bold">
                <div class="card-body">
                    <div class="col-lg-12 pt-4" style="text-align: right;">
                       <a href="sair.php"><button type="submit" class="btn btn-dark">Sair</button></a>
                    </div>
                    <h1 style="text-align: center;">Cadastro de Usuários</h1>
                    <form method="Post" action="../model/cadastrarUsuario.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input class="form-control" type="text" name="nome" id="nome" placeholder="Digite o seu nome..." required>
                        </div>
                        <div class="pt-2">
                            <label for="email">E-mail:</label>
                            <input class="form-control" type="mail" name="email" id="email" placeholder="Digite o seu e-mail..." required>
                        </div>
                        <div class="pt-3">
                            <label>Sexo:</label>
                            <br>
                            <input type="radio" name="csexo" id="csexo" value="masculino" required>
                            <label for="csexo">Masculino</label>
                            <input type="radio" name="csexo" id="csexo" value="feminino">
                            <label for="csexo">Feminino</label>
                        </div>
                        <div class="pt-2">
                            <label>Telefone:</label>
                            <input class="form-control" type="phone" name="telefone" id="telefone" placeholder="Digite o seu telefone..." required>
                        </div>
                        <div class="pt-2">
                            <label>Senha:</label>
                            <input class="form-control" type="password" name="senha" id="senha" placeholder="Digite sua senha..." required>
                        </div>
                        <div class="pt-2">
                            <label>Data de Nascimento:</label>
                            <input class="form-control" type="date" name="dtnasc" id="dt" placeholder="Digite a sua cidade..." required>
                        </div>
                        <div class="pt-3">
                            <label>Arquivos</label>
                            <input type="file" name="avatar" required>
                        </div>
                        <div class="pt-3">
                            <label>Tipo:</label>
                            <select name="tipo" id="cDocente" required>
                                <option></option>
                                <option value="Administrador">Administrador</option>
                                <option value="Usuário">Usuário</option>
                            </select>
                        </div>
                        <div class="col-lg-12 pt-4" style="text-align: center;">
                            <button type="submit" class="btn btn-secondary">Cadastrar</button>
                        </div>
                        <div class="col-lg-12 pt-4" style="text-align: center;">
                            <a href="exibirUsuario.php" class="btn btn-secondary">Verificar Usuários</a>
                        </div>
                        <div class="col-lg-12 pt-2" style="text-align: center; margin-top:15px;">
                            <button type="reset" class="btn btn-secondary">Limpar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>