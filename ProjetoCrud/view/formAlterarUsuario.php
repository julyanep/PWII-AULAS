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
    // receber o id do usuário a ser alterado e montar o formulário
    $id = $_GET['id_usuario'];

    // procure os dados no banco
    // conectar ao banco
    include '../model/connect.php';

    // select no banco para recuperar os dados do usuário
    $sql = "SELECT * FROM usuario WHERE id=$id ";

    // executar a query
    $result = $conn->query($sql); // orientado a objetos utilizando obj $result

    // montar o formulário
    // enquanto o fetch array possui registros ele retorna TRUE e quando ele termina, retorna FALSE

    if ($linha = $result->fetch_array()) {
        $id = $linha['id'];
        $nome = $linha[1];
        $email = $linha[2];
        $sexo = $linha[3];
        $telefone = $linha[4];
        $nascimento = $linha[6];
        $tipo = $linha[7];
        $img = $linha[8];
    }

    ?>

    <!-- Formulario -->
    <div class="container">
        <div class="col-12">
            <div class="card bg-dark text-white" style="font-weight: bold">
                <div class="card-body">
                    <h1 style="text-align: center;">Alterar Usuários</h1>
                    <form method="Post" action="atualizarUsuario.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" type="text" name="img" id="nome" value="<?= isset($img) ? $img : '' ?>" style="display:none;">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="id" id="nome" value="<?= isset($id) ? $id : '' ?>" style="display:none;">
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input class="form-control" type="text" name="nome" id="nome" placeholder="Digite o seu nome..." value="<?= isset($nome) ? $nome : '' ?>">
                        </div>
                        <div class="pt-2">
                            <label for="email">E-mail:</label>
                            <input class="form-control" type="mail" name="email" id="email" placeholder="Digite o seu e-mail..." value="<?= isset($email) ? $email : '' ?>" required>
                        </div>
                        <div class="pt-3">
                            <label>Tipo:</label>
                            <select name="tipos" id="cDocente" required>
                                <option></option>
                                <option value="Masculino" <?= $sexo == 'masculino' ? 'selected' : '' ?>>Masculino</option>
                                <option value="Feminino" <?= $sexo == 'feminino' ? 'selected' : '' ?>>Feminino</option>
                            </select>
                        </div>
                        <div class="pt-2">
                            <label>Telefone:</label>
                            <input class="form-control" type="phone" name="telefone" id="telefone" placeholder="Digite o seu telefone..." value="<?= isset($telefone) ? $telefone : '' ?>" required>
                        </div>
                        <div class="pt-2">
                            <label>Senha:</label>
                            <input class="form-control" type="password" name="senha" id="senha" placeholder="Digite sua senha...">
                        </div>
                        <div class="pt-2">
                            <label>Data de Nascimento:</label>
                            <input class="form-control" type="date" name="dtnasc" id="dt" placeholder="Digite a sua cidade..." value="<?= isset($nascimento) ? $nascimento : '' ?>" required>
                        </div>
                        <div class="pt-3">
                            <label>Arquivos</label>
                            <input type="file" name="avatar">
                        </div>
                        <div class="pt-3">
                            <label>Tipo:</label>
                            <select name="tipo" id="cDocente" required>
                                <option></option>
                                <option value="Administrador" <?= $tipo == 'Administrador' ? 'selected' : '' ?>>Administrador</option>
                                <option value="Usuário" <?= $tipo == 'Usuário' ? 'selected' : '' ?>>Usuário</option>
                            </select>
                        </div>
                        <div class="col-lg-12 pt-4" style="text-align: center;">
                            <button type="submit" class="btn btn-secondary">Atualizar</button>
                        </div>

                        <div class="col-lg-12 p-4" style="text-align: center;">
                            <a href="exibirUsuario.php" class="btn btn-secondary">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>