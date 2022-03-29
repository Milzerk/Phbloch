<?php

use Phbloch\Blockchain\Block;
use Phbloch\Blockchain\Blockchain;

require_once './vendor/autoload.php';

$phbloch = new Blockchain;

$phbloch->addBlock(new Block(1, date('Y-m-d H:i:s'), 'Adriana paga miller - 50 R$'));
$phbloch->addBlock(new Block(2, date('Y-m-d H:i:s'), 'Adriana paga miller - 60 R$'));
$phbloch->addBlock(new Block(3, date('Y-m-d H:i:s'), 'Miller paga Adriana - 0,50 R$'));


if (!$phbloch->isChainValid()) {
    echo PHP_EOL;
    echo 'ERROR';
    echo PHP_EOL;
}

echo PHP_EOL;
echo json_encode($phbloch->chain, JSON_PRETTY_PRINT);
echo PHP_EOL;


