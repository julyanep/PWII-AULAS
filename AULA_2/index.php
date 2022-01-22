<?php

echo "Aula PHP";

// Criar variáveis 

   // Variáveis no PHP são "fracamente tipadas"
$nome = "Julyane";
$idade = 18;

// camelCase
$nomeCompleto = "Julyane Pereira Hengler";

/*
Comentários em blcos
*/

// Aspas simples e duplas

/*
Aspas simples não permitem que o conteúdo seja alterado.
*/
echo "<br>";
echo 'Meu nome é: $nome';
/*
Aspas duplas permitem conteúdo dinâmico.
*/
echo "<br>";
echo "Meu nome é: $nome";
//Imprimir o conteúdo de uma var
echo "<br>";
echo $nomeCompleto;

//Concatenação "." ponto
echo "<br>";
echo 'Meu nome é: '.$nome;
