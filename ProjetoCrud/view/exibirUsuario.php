<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Dados de Cadastro</title>
</head>


<body style="background-image:url('../assets/background.jpeg');">

    <div class="card" style="border: solid 1px #fff; background-color:#f55145;">
        <div class="card-header" style="background-color: #f55145; color:#fff; display:flex; justify-content:space-around; border: solid 1px #fff;">
            <h3>Usuários Cadastrados</h3>

            <form method="Post" action="#">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input class="form-control" type="search" name="name" id="nome" placeholder="Digite o nome..." value="<?= isset($_POST['name']) ? $_POST['name'] : "" ?>" required>
                </div>
                <div class="col-lg-12 pt-4" style="text-align: center;">
                    <button type="submit" class="btn btn-danger">Pesquisar</button>
                </div>
            </form>

        </div>
        <!--Table-->
        <table class="table table-bordered table-hover card-body" style="background-color: #f55145; color:#fff;">


            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Sexo</th>
                    <th>Telefone</th>
                    <th>Data de Nascimento</th>
                    <th>Tipo</th>
                    <th>Ação</th>
                </tr>
            </thead>

            <?php

            include "../model/connect.php";

            // receber o dado s do search do formulário
            // usar if ternário para garantir a pesquisa
            $nomePesq = isset($_POST['name']) ? $_POST['name'] : "";

            //query select
            $sql = "SELECT * FROM usuario WHERE nome LIKE '%$nomePesq%'";

            // buscar no banco de dados por meio da query select
            // para isso usamos o objeto de conexão e o método query()
            $result = $conn->query($sql); // orientado a objetos utilizando obj $result

            // montar a lista na tabela
            // enquanto o fetch array possui registros ele retorna TRUE e quando ele termina, retorna FALSE
            // while ($linha = mysqli_fetch_array($result)) { // mysqli_fetch_array() procedural}
            while ($linha = $result->fetch_array()) {
                $id = $linha['id'];
                $nome = $linha[1];
                $email = $linha[2];
                $sexo = $linha[3];
                $telefone = $linha[4];
                $date = date_create($linha['dtnasc']);
                $nascimento = date_format($date,"d/m/Y");
                $tipo = $linha[7];
                $img = $linha[8];

                // montar a tabela
                $html = <<<HTML
                                <tbody>
                                <tr>
                                    <td>$id</td>
                                    <td>$nome</td>
                                    <td>$email</td>
                                    <td>$sexo</td>
                                    <td>$telefone</td>
                                    <td>$nascimento</td>
                                    <td>$tipo</td>
                                    <td>
                                        <a href='formAlterarUsuario.php?id_usuario="$id"&img=$img' class='text-decoration-none'">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                                        width="16px" height="16px" viewBox="0 0 485.219 485.22" style="enable-background:new 0 0 485.219 485.22;" xml:space="preserve">
                                            <path d="M467.476,146.438l-21.445,21.455L317.35,39.23l21.445-21.457c23.689-23.692,62.104-23.692,85.795,0l42.886,42.897
                                            C491.133,84.349,491.133,122.748,467.476,146.438z M167.233,403.748c-5.922,5.922-5.922,15.513,0,21.436
                                            c5.925,5.955,15.521,5.955,21.443,0L424.59,189.335l-21.469-21.457L167.233,403.748z M60,296.54c-5.925,5.927-5.925,15.514,0,21.44 c5.922,5.923,15.518,5.923,21.443,0L317.35,82.113L295.914,60.67L60,296.54z M338.767,103.54L102.881,339.421 c-11.845,11.822-11.815,31.041,0,42.886c11.85,11.846,31.038,11.901,42.914-0.032l235.886-235.837L338.767,103.54z M145.734,446.572c-7.253-7.262-10.749-16.465-12.05-25.948c-3.083,0.476-6.188,0.919-9.36,0.919 c-16.202,0-31.419-6.333-42.881-17.795c-11.462-11.491-17.77-26.687-17.77-42.887c0-2.954,0.443-5.833,0.859-8.703 c-9.803-1.335-18.864-5.629-25.972-12.737c-0.682-0.677-0.917-1.596-1.538-2.338L0,485.216l147.748-36.986 C147.097,447.637,146.36,447.193,145.734,446.572z"/>
                                            </svg>
                                        </a>
                                        <a href='excluirUsuario.php?id_usuario="$id"&img=$img' class='text-decoration-none'>
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            width="16px" height="16px" viewBox="0 0 774.266 774.266" style="enable-background:new 0 0 774.266 774.266;"
                                            xml:space="preserve">
                                            <path d="M640.35,91.169H536.971V23.991C536.971,10.469,526.064,0,512.543,0c-1.312,0-2.187,0.438-2.614,0.875
                                            C509.491,0.438,508.616,0,508.179,0H265.212h-1.74h-1.75c-13.521,0-23.99,10.469-23.99,23.991v67.179H133.916 c-29.667,0-52.783,23.116-52.783,52.783v38.387v47.981h45.803v491.6c0,29.668,22.679,52.346,52.346,52.346h415.703 c29.667,0,52.782-22.678,52.782-52.346v-491.6h45.366v-47.981v-38.387C693.133,114.286,670.008,91.169,640.35,91.169z M285.713,47.981h202.84v43.188h-202.84V47.981z M599.349,721.922c0,3.061-1.312,4.363-4.364,4.363H179.282 c-3.052,0-4.364-1.303-4.364-4.363V230.32h424.431V721.922z M644.715,182.339H129.551v-38.387c0-3.053,1.312-4.802,4.364-4.802 H640.35c3.053,0,4.365,1.749,4.365,4.802V182.339z"/>
                                            </svg
                                         </a>
                                    </td>
                                </tr>
                           
HTML;
                echo $html;
            } // fim do while

            // apagar o obj
            $result->close();

            // encerrar a conexão
            $conn->close();
            ?>

        </table>
        <div class="col-lg-12 p-4" style="text-align: center;">
            <a href="formulario.php" class="btn btn-danger">Voltar</a>
        </div>
    </div>


</body>

</html>

<!--  
+----------+--------------+------+-----+-------------------+-------------------+
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
+----------+--------------+------+-----+-------------------+-------------------+-->