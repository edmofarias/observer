<?php

require __DIR__ . '/vendor/autoload.php';

use App\Edmo\Cliente;
use App\Edmo\Produto;

$cliente1 = new Cliente('EDMO');
$cliente2 = new Cliente('JOSE');
$cliente3 = new Cliente('SERGIO');

$produto1 = new Produto('Produto1', 100.00);
$produto2 = new Produto('Produto2', 200.00);

$produto1->attach($cliente1);
$produto1->attach($cliente2);

$produto2->attach($cliente3);

$produto1->mudarPreco(98.58);
$produto2->mudarPreco(110.00);

$produto2->mudarPreco(50.00);

