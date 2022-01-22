<?php

echo "QUALQUER COISA";

//Constantes
echo "<br>";
define("PI", 3.14159);     //forma antiga
echo  "O valor de PI é: ". PI;

echo "<br>";
const BARTH = 100;     //forma atual
echo "O valor da constante BARTH é: " . BARTH;

// Operadores Aritméticos
/*
+$a IDENTIDADE - Conversão de $a para int ou float confrome apropriado.
-$a NEGAÇÃO - Oposto de $a.
$a + $b ADIÇÃO - Soma de $a e $b.
$a - SUBTRAÇÃO - Diferença entre $a e $b.
$a * MULTIPLICAÇÃO - Produto de $a e $b.
$a / DIVISÃO - Quociente de $a e $b.
$a % $b MÓDULO - Resto de $a dividido por $b.
$a ** b EXPONENCIAL - Resultado de $a elevado a b.
*/
echo "<br>";
$a = 10;
echo 'var $a = '. $a . "<br>";
echo 'var -$a = '. -$a . "<br>";

// Operadores de Atribuição
/*
$a += $b     $a = $a + $b   Addition
$a -= $b     $a = $a - $b   Subtraction
$a *= $b     $a = $a * $b   Multiplication
$a /= $b     $a = $a / $b   Division
$a %= $b     $a = $a % $b   Modulus

$a .= $b     $a = $a . $b   Concatenate
*/

$a = 10;
$b = 5;

$a += $b;
echo $a;
echo "<br>";

//Concatenate
$a = "Julyane ";
$b = "Pereira ";
$c = "Hengler";

$a .= $b;
echo $a;
$a .= $c;
echo "<br>";
echo $a;

// Operadores Lógicos
/*
$a and $b E - Verdadeiro (TRUE) se tanto $a quanto $b são verdadeiros.
$a or $b OU - Verdadeiro se $a ou $b são verdadeiros.
$a xor $b XOR - Verdadeiro se $a ou $b são verdadeiros, mas não ambos.
! $a NÃO - Verdadeiro se $a não é verdadeiro.
$a && $b E - Verdadeiro se tanto $a quanto $b são verdadeiros.
$a || $b OU - Verdadeiro se $a ou $b são verdadeiros.
*/

