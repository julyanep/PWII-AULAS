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
                    <h1>Lista de Usuários</h1>
                </div>
                <table border="1" width="100%" class="table table-striped">
                    <tr class="table-info">
                        <th>ID</th>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th>SEXO</th>
                        <th>TELEFONE</th>
                        <th>NASCIMENTO</th>
                        <th>TIPO</th>
                        <th>AÇÃO</th>
                    </tr>

    <?php
    include "../model/connect.php";

    $sql = "SELECT * FROM usuario";
    // buscar no banco de dados por meio da query select
    // para isso usamos o objeto de conexão e o método query()
    $result = $conn->query($sql);

    // montar a lista na tabela
    // enquanto o fetch array possui registro ele retorna TRUE e quando ele termina FAALSE
    while ($linha = mysqli_fetch_array($result)) {
        $id = $linha['id'];
        $nome = $linha['nome'];
        $email = $linha['email'];
        $sexo = $linha['sexo'];
        $telefone = $linha['telefone'];
        // formartar a data que será apresentada
        // $nascimento = $linha['dtnasc'];
        $date = date_create($linha['dtnasc']);
        $nascimento = date_format($date, "d,m,Y");
        $tipo = $linha['tipo'];
        
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
            <td>
                <a href="formAlterarUsuario.php?id_usuario=$id">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    width="16px" height="16px" viewBox="0 0 31.614 31.614" style="enable-background:new 0 0 31.614 31.614;"
                    xml:space="preserve">
                    <path d="M4.372,21.711l6.548,5.871l13.889-15.479L18.26,6.229L4.372,21.711z M16.619,13.415l-7.798,8.693
                    c-0.098,0.108-0.234,0.175-0.38,0.183c-0.146,0.009-0.29-0.042-0.398-0.141l-0.387-0.348c-0.226-0.203-0.245-0.551-0.042-0.777
                    l7.798-8.693c0.098-0.109,0.234-0.175,0.38-0.183c0.146-0.008,0.29,0.043,0.398,0.14l0.387,0.347
                    C16.803,12.84,16.821,13.188,16.619,13.415z M18.887,9.282l0.386,0.346c0.228,0.203,0.246,0.552,0.043,0.778l-0.678,0.756
                    c-0.1,0.109-0.235,0.174-0.381,0.183c-0.146,0.008-0.289-0.042-0.398-0.14l-0.387-0.347c-0.108-0.098-0.174-0.234-0.184-0.381
                    c-0.008-0.146,0.043-0.29,0.142-0.398l0.678-0.756C18.312,9.097,18.661,9.078,18.887,9.282z M20.501,3.732l6.547,5.873
                    l-1.608,1.793l-6.546-5.873L20.501,3.732z M29.681,3.817l-3.711-3.33c-0.783-0.703-1.986-0.637-2.688,0.146l-2.188,2.44
                    l6.548,5.872l2.188-2.438c0.336-0.376,0.513-0.871,0.482-1.375C30.284,4.627,30.057,4.154,29.681,3.817z M27.507,6.498
                    l-3.969-3.559l1.146-1.276l3.968,3.558L27.507,6.498z M1.336,30.403c-0.101,0.35,0.007,0.727,0.277,0.968
                    c0.27,0.243,0.656,0.31,0.992,0.173l7.529-3.084l-6.546-5.873L1.336,30.403z M7.991,28.088l-2.958,1.211l-1.73-1.552l0.885-3.071
                    L7.991,28.088z"/>
                    </svg>
                </a>
                <a href='excluirUsuario.php?id_usuario=$id' class='text-decoration-none'>
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    width="16px" height="16px"
                    viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <path d="M432,96h-48V32c0-17.672-14.328-32-32-32H160c-17.672,0-32,14.328-32,32v64H80c-17.672,0-32,14.328-32,32v32h416v-32
                    C464,110.328,449.672,96,432,96z M192,96V64h128v32H192z"/>
                    <path d="M80,480.004C80,497.676,94.324,512,111.996,512h288.012C417.676,512,432,497.676,432,480.008v-0.004V192H80V480.004z
                    M320,272c0-8.836,7.164-16,16-16s16,7.164,16,16v160c0,8.836-7.164,16-16,16s-16-7.164-16-16V272z M240,272
                    c0-8.836,7.164-16,16-16s16,7.164,16,16v160c0,8.836-7.164,16-16,16s-16-7.164-16-16V272z M160,272c0-8.836,7.164-16,16-16
                    s16,7.164,16,16v160c0,8.836-7.164,16-16,16s-16-7.164-16-16V272z"/>
                    </svg>
                </a>
            </td>
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