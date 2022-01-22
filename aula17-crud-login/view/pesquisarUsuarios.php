<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Exibir</title>
</head>

<body>

    <!--
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
-->

    <div class="container">
        <div class="pt-2">
            <div class="card">
                <div class="card-header bg-info">
                    <h1>Pesquisar Usuário</h1>
                </div>
                <form class="col-md-12" method="post">
                    <label for="txtBusca" class="form-label, py-3">Nome:</label>
                    <input type="text" name="txtBusca" id="txtBusca" required class="form-control">
                    <input type="submit" value="Pesquisar" name="txtPesquisar" id="txtPesquisar" class="btn bg-light text-black">
                </form>
                <table border="1" width="100%" class="table table-striped">
                    <tr class="table-info">
                        <th>ID</th>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th>SEXO</th>
                        <th>TELEFONE</th>
                        <th>NASCIMENTO</th>
                        <th>TIPO</th>
                    </tr>
            </div>
        </div>
    </div>

    <?php
    include "../model/connect.php";

    $pesUsuario = FILTER_INPUT(INPUT_POST, 'txtBusca', FILTER_SANITIZE_STRING);

    $pesquisar = FILTER_INPUT(INPUT_POST, 'txtPesquisar', FILTER_SANITIZE_STRING);
                            
    $sql = "SELECT * FROM usuario WHERE nome LIKE '%$pesUsuario%'";

    $result = $conn->query($sql);
        if($pesquisar){
                                
        while($row_usuario = mysqli_fetch_assoc($result)){
        $id = $row_usuario['id'];
        $nome = $row_usuario['nome'];
        $email = $row_usuario['email'];
        $sexo = $row_usuario['sexo'];
        $telefone = $row_usuario['telefone'];
        $nascimento = $row_usuario['dtnasc'];
        $tipo = $row_usuario['tipo'];
        }

    /*$sql = "SELECT * FROM usuario WHERE nome LIKE '%su%'";
    // buscar no banco de dados por meio da query select
    // para isso usamos o objeto de conexão e o método query()
    $result = $conn->query($sql);

    // montar a lista na tabela
    // enquanto o fetch array possui registro ele retorna TRUE e quando ele termina FAALSE
    while ($linha = mysqli_fetch_array($result)) {*/

        // montar a tabela
        $html = <<<HTML

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

        echo $html;
    }
    $result->close();

    $conn->close();
    ?>
    </table>

    <div class="col-md-2 py-2">
        <a href="formulario.php" class="btn bg-light text-black">Voltar</a>
    </div>

    <div class="card-footer bg-info">
        Autor: Vnícius Leandro Dos Santos
    </div>

</body>

</html>