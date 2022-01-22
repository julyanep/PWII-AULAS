<?php

$nome = $_GET['nome'];
$rm = $_GET['rm'];
$idade = $_GET['idade'];
$peso = $_GET['peso'];
$altura = $_GET['altura'];

echo $nome;
echo "<br>";
echo $rm;
echo "<br>";
echo $idade;
echo "<br>";
echo $peso;
echo "<br>";
echo $altura;
echo "<br>";

$calculo1 = $altura * $altura;
$calculo2 = $peso / $calculo1;
$imc = number_format($calculo2);

echo "Seu IMC é: $imc" ;
echo "<br>";

if ($imc < 18.5)
    echo "Você está abaixo do peso!";
elseif ($imc <= 24.9)
    echo "Peso normal.";
elseif ($imc <=29.9 )
    echo "Sobrepeso.";
elseif ($imc <=34.9)
    echo "Obesidade grau 1.";
elseif ($imc <= 39.9)
    echo "Obesidade grau 2.";
elseif ($imc >= 40)
    echo "Obesidade grau3.";

echo "<br>";

echo '<a href = "index.html">Voltar<a/>';