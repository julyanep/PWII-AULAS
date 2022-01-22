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

    <?php
    // verificar se existe uma sessão aberta no server
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();

        //testar se o usuario esta logado
        if (isset($_SESSION['email'])) {
            echo $_SESSION['email'];
        } else {
            // apagar a variável de sessão
            unset($_SESSION['email']);
            header("Location: ../index.php");
        }
    }

    ?>

    <div class="container">
        <div class="pt-2">
            <div class="card">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="coml-md-11">
                            <h1>Cadastro de Usuários</h1>
                        </div>
                        <div class="col-md"><a href="#" class="btn btn-light text-black fload-end">Sair</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="../model/cadastrarUsuario.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputNome" class="form-label">Nome</label>
                                <input type="text" name="nome" id="inputNome" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" name="email" id="inputEmail" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputTelefone" class="form-label">Telefone</label>
                                <input type="tel" name="telefone" id="inputTelefone" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputSenha" class="form-label">Senha</label>
                                <input type="password" name="senha" id="inputSenha" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputSexo" class="form-label">Sexo</label>
                                <select name="sexo" id="inputSexo" class="form-select" aria-label="Default select example" required>
                                    <option selected></option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputData" class="form-label">Data de Nascimento</label>
                                <input type="date" name="dtnasc" id="inputData" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputType" class="form-label">Tipo</label>
                                <select name="tipo" id="inputType" class="form-select" aria-label="Default select example" required>
                                    <option selected></option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Usuário</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="formFile" class="form-label">Avatar</label>
                                <input type="file" name="avatar" id="formFile" class="form-control">
                            </div>
                            <div class="col-md-2 py-3">
                                <button type="submit" value="Cadastrar">Cadastrar</button>
                            </div>
                            <div class="col-md-2 py-3">
                                <button type="reset" value="Limpar">Limpar</button>
                            </div>
                            <div class="col-md-2 py-3">
                                <a href="exibirUsuarios.php" class="btn btn-light text-black">Listar</a>
                            </div>
                            <div class="col-md-2 py-3">
                                <a href="pesquisarUsuarios.php" class="btn btn-light text-black">Pesquisar Usuário</a>
                            </div>
                    </form>
                </div>
                <div class="card-footer bg-info">
                    Autor: Vnícius Leandro Dos Santos
                </div>
            </div>
        </div>
    </div>
</body>

</html>