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
    <title>Exibir Usuários</title>
</head>

<body>

    <!---
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
--->
    <div class="container">
        <div class="pt-2">
            <div class="card bg-ligth">
                <div class="card-header bg-warning text-white">
                    <h1>Lista de Usuários</h1>
                </div>
                <table border="1" class="table table-striped table-bordered table-condensed table-hover">
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th>SEXO</th>
                        <th>TELEFONE</th>
                        <th>NASCIMENTO</th>
                        <th>TIPO</th>
                    </tr>


                    <?php
                    include "../model/connect.php";

                    $sql = "SELECT * FROM usuario";

                    // buscar no banco de dados por meio da query select, 
                    //para isso usamos o objeto de conexão e o método query

                    $dados = $conn->query($sql);

                    //Montar a lista na tabela
                    //enquanto o fetch array possui registros ele retorna TRUE e quando ele termina FALSE
                    while ($linha = mysqli_fetch_array($dados)) {
                        $id = $linha['id'];
                        $nome = $linha['nome'];
                        $email = $linha['email'];
                        $sexo = $linha['sexo'];
                        $telefone = $linha['telefone'];
                        $dtnasc = $linha['dtnasc'];
                        $tipo = $linha['tipo'];

                        //Montar a tabela
                        $html = <<<HTML
            
            <tr>
                <td>$id</td>
                <td>$nome</td>
                <td>$email</td>
                <td>$sexo</td>
                <td>$telefone</td>
                <td>$dtnasc</td>
                <td>$tipo</td>
            </tr>
HTML;

                        echo $html;
                    }
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
    </div>
</body>

</html>