<?php

//Recuperar os dados enviados pelo GET

$nome = $_GET['nome'];
$idade = "$_GET[idade]";
$sexo = $_GET['sexo'];

echo "<br>";
echo $nome;
echo "<br>";
echo $idade;
echo "<br>";
echo $sexo;
echo "<br>";

echo '<a href = "index.html">Voltar<a/>';
