<!DOCTYPE>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Noticias Cidade - Pesquisa de usuário</title>
</head>

<body>

    <div class="container">
        <div class="pt-2">
            <div class="card bg-ligth">
                <div class="card-header bg-warning text-white">
                    <h1>Pesquisa de Usuários</h1>
                </div>
                <form method="post">

                    <div class="row">
                        <div class="col-md-12">
                            <label for="txtBusca" class="form-label, py-3">Digite o nome do usuário:</label>
                            <input type="text" name="txtBusca" id="txtBusca" required class="form-control">
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-2 py-3">
                            <input type="submit" value="Pesquisar" name="txtPesquisar" id="txtPesquisar" class="btn bg-light text-black">
                        </div>
                    </div>

                </form>

                <table border="1" class="table table-striped table-bordered table-condensed table-hover">

                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th>SEXO</th>
                        <th>TELEFONE</th>
                        <th>DATA DE NASCIMENTO</th>
                        <th>TIPO</th>
                    </tr>

                    <?php
                    include "../model/connect.php";

                    $pesUsuario = FILTER_INPUT(INPUT_POST, 'txtBusca', FILTER_SANITIZE_STRING);
                    $pesquisar = FILTER_INPUT(INPUT_POST, 'txtPesquisar', FILTER_SANITIZE_STRING);

                    $sql = "SELECT * FROM usuario WHERE nome LIKE '%$pesUsuario%'";

                    $result = $conn->query($sql);
                    if ($pesquisar) {

                        while ($row_usuario = mysqli_fetch_assoc($result)) {
                            $id = $row_usuario['id'];
                            $nome = $row_usuario['nome'];
                            $email = $row_usuario['email'];
                            $sexo = $row_usuario['sexo'];
                            $telefone = $row_usuario['telefone'];
                            $nascimento = $row_usuario['dtnasc'];
                            $tipo = $row_usuario['tipo'];

                            $html2 = <<<HTML
        
                                        <tr>
                                                <td>$id</td>
                                                <td>$nome</td>
                                                <td>$email</td>
                                                <td>$sexo</td>
                                                <td>$telefone</td>
                                                <td>$nascimento</td>
                                                <td>$tipo</td>
                                        </tr>                       
HTML;
                            echo $html2;
                        }
                    }
                    $result->close();

                    $conn->close();
                    ?>
                </table>
                <div class="col-md-2 py-3">
                    <a href="formulario.php" class="btn bg-warning text-white float-end">Voltar</a>
                </div>
                <div class="card-footer  bg-warning text-white">
                    Autor: Julyane Pereira Hengler
                </div>
            </div>
        </div>
        </main>
</body>

</html>