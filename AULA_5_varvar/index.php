<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variável-Variável</title>
</head>
<body>
    <h1>Conteúdo html</h1>

    <?php
        $a = "nome"; // echo $a => nome
        $$a = "Julyane"; //$ criar uma variável com o conteúdo da variável a = $nome
        echo "<br>";
        echo $nome;
        echo "<br>";

        //tabela no banco de dados - retornar somente os campos
        $res = array("nome"=> "Julyane", "idade" => "18", "sexo" => "F");
        foreach($res as $key => $value){
            echo $key ."=>" . $value . "<br>";

        }
    ?>
    
</body>
</html>